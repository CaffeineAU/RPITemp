<?php

/*
http://api.openweathermap.org/data/2.5/history/city?id=2885679&type=hour
http://api.openweathermap.org/data/2.5/weather?q=toongabbie,nsw,au
*/
$json = file_get_contents('http://api.openweathermap.org/data/2.5/weather?q=toongabbie,nsw,au'); 
$data = json_decode($json,true);

$sunrise = date("H:i:s", $data["sys"]["sunrise"]-3600);
$sunset = date("H:i:s", $data["sys"]["sunset"]-3600);
$currenttemp = $data["main"]["temp"]-272.15;
$maxtemp = $data["main"]["temp_max"]-272.15;
$mintemp = $data["main"]["temp_min"]-272.15;
$humidity = $data["main"]["humidity"];
$pressure = $data["main"]["pressure"];
$windspeed = $data["wind"]["speed"]*3.6; // comes in m/s, wank in km/hr
$rain = null;
if(isset($data["rain"]["1h"]))
{
	$rain = $data["rain"]["1h"];
}
echo "<h2> Weather for ".$data["name"]." as of ".date("H:i:s", $data["dt"]-3600)."</h2>";

echo "<div class='weather'>Sunrise is " .$sunrise."<br>
Sunset is " .$sunset."<br>
Current Temperature ".$currenttemp ."°C with ".$data["weather"]["0"]["description"]."<br>
Maximum Temperature ".$maxtemp ."°C<br>
Minimum Temperature ".$mintemp ."°C<br>
Humidity ".$humidity."%<br>
Atmospheric Pressure ".$pressure."hPa<br>
Wind ".degToCompass($data["wind"]["deg"]) ." (".$data["wind"]["deg"]."°) at " .$windspeed."km/hr<br>";
if($rain != null) echo "Rain in the last hour ".$rain."mm<br>";
echo "</div>";

function degToCompass($num)
{
    $val=($num/22.5)+.5;
    $arr=["North","North North East","North East","East North East","East","East South East", "South East", "South South East","South","South South West","South West","West South West","West","West North West","North West","North North West"];
    return $arr[floor($val)];
}

//var_dump($data);

switch (json_last_error()) {
        case JSON_ERROR_NONE:
        break;
        case JSON_ERROR_DEPTH:
            echo ' - Maximum stack depth exceeded';
        break;
        case JSON_ERROR_STATE_MISMATCH:
            echo ' - Underflow or the modes mismatch';
        break;
        case JSON_ERROR_CTRL_CHAR:
            echo ' - Unexpected control character found';
        break;
        case JSON_ERROR_SYNTAX:
            echo ' - Syntax error, malformed JSON';
        break;
        case JSON_ERROR_UTF8:
            echo ' - Malformed UTF-8 characters, possibly incorrectly encoded';
        break;
        default:
            echo ' - Unknown error';
        break;
}

?>

<html>
<head>
<title>Open Weather Map</title>
    <style type="text/css">
        #basicMap {
            width: 50%;
            height: 50%;
            border: 1px solid black;
        }
    </style>

</head>
<body  onload="init()">
<div id="basicMap"></div>
</body>

<script src="http://openlayers.org/api/OpenLayers.js"></script>
<script src="http://openweathermap.org/js/OWM.OpenLayers.1.3.4.js" ></script>

<script type="text/javascript">
var map;
function init() {

	//Center  ( mercator coordinates )
	var lat = <?php echo $data["coord"]["lat"]; ?>;
	var lon = <?php echo $data["coord"]["lon"]; ?>;


	var lonlat = new OpenLayers.LonLat(lon, lat);
// if  you use WGS 1984 coordinate you should  convert to mercator
	lonlat.transform(
		new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
		new OpenLayers.Projection("EPSG:900913") // to Spherical Mercator Projection
	);

        map = new OpenLayers.Map("basicMap");

	// Create overlays
	// map layer OSM
        var mapnik = new OpenLayers.Layer.OSM();
	// Create station layer
	var stations = new OpenLayers.Layer.Vector.OWMStations("Stations");
	// Create weather layer 
	var city = new OpenLayers.Layer.Vector.OWMWeather("Weather");

	//connect layers to map
	//map.addLayers([mapnik, stations, city]);

 var layer_cloud = new OpenLayers.Layer.XYZ(
        "clouds",
        "http://${s}.tile.openweathermap.org/map/clouds/${z}/${x}/${y}.png",
        {
            isBaseLayer: false,
            opacity: 0.7,
            sphericalMercator: true
        }
    );

    var layer_precipitation = new OpenLayers.Layer.XYZ(
        "precipitation",
        "http://${s}.tile.openweathermap.org/map/precipitation_cls/${z}/${x}/${y}.png",
        {
            isBaseLayer: false,
            opacity: 0.7,
            sphericalMercator: true
        }
    );


    map.addLayers([mapnik, layer_precipitation]);//, layer_cloud]);
	// Add Layer switcher
	map.addControl(new OpenLayers.Control.LayerSwitcher());       	

	map.setCenter( lonlat, 10 );
}
</script>
</html>
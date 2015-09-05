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
echo "<h2> Weather for ".$data["name"]." as of ".date("H:i:s", $data["dt"]-3600)."</h2>";

echo "<div class='weather'>Sunrise is " .$sunrise."<br>
Sunset is " .$sunset."<br>
Current Temperature ".$currenttemp ."°C with ".$data["weather"]["0"]["description"]."<br>
Maximum Temperature ".$maxtemp ."°C<br>
Minimum Temperature ".$mintemp ."°C<br>
Humidity ".$humidity."%<br>
Atmospheric Pressure ".$pressure."hPa<br>
Wind ".degToCompass($data["wind"]["deg"]) ." at " .$data["wind"]["speed"]."km/hr<br>


</div>";

function degToCompass($num)
{
    $val=($num/22.5)+.5;
    $arr=["N","NNE","NE","ENE","E","ESE", "SE", "SSE","S","SSW","SW","WSW","W","WNW","NW","NNW"];
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
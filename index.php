<html><head><?phpini_set('display_startup_errors',1);ini_set('display_errors',1);error_reporting(-1);$time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$start = $time;$selecttime = $time;$charttime = $time;$interval = 24;if (isset($_POST['timeinterval'])){	$interval =  $_POST['timeinterval'];}  if( is_null($interval)){	$interval = 24;}$minimumTime = new DateTime('NOW');$maximumTime = new DateTime('NOW');$maxTemp = 0;$minTemp = 100;$avgTemp = 1;$count = 0;function GetStats($arr, &$maxTemp, &$minTemp, &$avgTemp, &$maximumTime, &$minimumTime){	        if ($arr['temp'] >= $maxTemp)        {            $maxTemp = $arr['temp'];			$maximumTime = $arr['timestamp'];        }        if ($arr['temp'] <= $minTemp)        {            $minTemp = $arr['temp'];     		$minimumTime = $arr['timestamp'];		}        $avgTemp += $arr['temp'];}function StartTimer(){$time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$start = $time;return $start;}function StopTimer($startTime){$time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$finish = $time;return round(($finish - $startTime), 4);}			$database = new sqlite3('database/templogreg.db');			if (!$database) {				$error = (file_exists($yourfile)) ? "Impossible to open, check permissions" : "Impossible to create, check permissions";				die($error);			}						/*$structure = $database->query('PRAGMA table_info(temps);');			while ($row = $structure->fetchArray()) {			print_r($row);			}			*/			// 2015-09-01 22:20:09 because that's the last timestamp in the database			$statement = $database->prepare("SELECT ID, timestamp, temp FROM temps WHERE timestamp > datetime('2015-09-01 22:20:09', :time)");			$statement->bindValue(':time', '-' .$interval. ' hours');//$now->ToString());$starttime = StartTimer();			$result = $statement->execute();$selecttime = StopTimer($starttime);			if (!$result)				die("Impossible to execute query."); #As reported above, this means that the db owner is different from the web server's one, but we did not commit any syntax mistake.?>    <link href="css/styles.css" rel="stylesheet" type="text/css"/>    <title>Raspberry Pi Temperature Logger    </title></head>    <script type="text/javascript" src="https://www.google.com/jsapi"></script>    <script type="text/javascript">      google.load("visualization", "1", {packages:["corechart"]});      google.setOnLoadCallback(drawChart);      function drawChart() {        var data = google.visualization.arrayToDataTable([ ['Time', 'Temperature S1', 'Temperature S2', 'Minimum', 'Maximum', 'Average'],		<?php$starttime = StartTimer();			while ($row = $result->fetchArray()) {			GetStats($row, $maxTemp, $minTemp, $avgTemp, $maximumTime, $minimumTime);//				echo "['" . $row['timestamp']."',". ($row['ID'] == "/sys/bus/w1/devices/28-00000432acc3" ? $row['temp'].",," : ",". $row['temp']."," ) .$minTemp.",".$maxTemp.",".number_format($avgTemp, 3) .",0],				echo "['" . $row['timestamp']."',". ($row['ID'] == "/sys/bus/w1/devices/28-00000432acc3" ? $row['temp'].",," : ",". $row['temp'].",")."10,10,10],";			$count++;		}				$avgTemp /= $count;		?>]);				for (i = 0; i < <?php echo $count;?>; i++) { 			data.setValue(i,3,<?php echo $minTemp;?>);			data.setValue(i,4,<?php echo $maxTemp;?>);			data.setValue(i,5,<?php echo number_format($avgTemp, 3);?>);		}	  var formatter = new google.visualization.PatternFormat('{0}�C');// Apply formatter and set the formatted value of the first column.formatter.format(data, [1]);formatter.format(data, [2]);formatter.format(data, [3]);formatter.format(data, [4]);formatter.format(data, [5]);    var options = { title: 'Temperature',		titleTextStyle : {color: '#555753', fontName: "Segoe UI", fontSize:18},		vAxis: {title: "Temp (�C)"},		interpolateNulls: 'true',		hAxis: {slantedText : true, slantedTextAngle: 90,showTextEvery:10, textStyle : {color: '#555753', fontName: "Segoe UI", fontSize:10}},		series: [{color: 'blue', visibleInLegend: true}, 		{color: 'green', visibleInLegend: true}, 		{color: 'purple', visibleInLegend: true, areaOpacity:0, lineWidth:0.75}, 		{color: 'orange', visibleInLegend: true, areaOpacity:0, lineWidth:0.75}, 		{color: 'red', visibleInLegend: true, areaOpacity:0, lineWidth:0.75}, 		{color: 'green', visibleInLegend: false, areaOpacity:0, lineWidth:0}] };        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));        chart.draw(data, options);		<?php $charttime = StopTimer($starttime);?>      }    </script></head><body><div class="header"><h1>Raspberry Pi Temperature Logger for the last <?php echo $interval;?> hours</h1>10:45`PM AEST on Aug 31, 2015</div><div class="main"><?php include('weather.php');?><hr><form action="." method="POST">        Show the temperature logs for          <select name="timeinterval">			<option value="6" <?php if($interval == 6) echo "selected='selected'";?>>the last 6 hours</option>			<option value="12" <?php if($interval == 12) echo "selected='selected'";?>>the last 12 hours</option>			<option value="24"  <?php if($interval == 24) echo "selected='selected'";?>>the last 24 hours</option>			<option value="72" <?php if($interval == 72) echo "selected='selected'";?>>the last 72 hours</option>			<option value="120" <?php if($interval == 120) echo "selected='selected'";?>>the last 120 hours</option>        </select>        <input type="submit" value="Display">    </form><h2>Temperature Chart</h2><div id="chart_div" style="width: 100%; height: 500px;"></div><div class="footer"><table class="detail"><tr><td></td><td><strong>Temp</strong></td><td><strong>Time</strong></td></tr><tr><td>Min: </td><td><?php echo $minTemp;?>�C </td><td><?php echo $minimumTime;?></td></tr><tr><td>Max: </td><td><?php echo $maxTemp;?>�C </td><td><?php echo $maximumTime;?></td></tr><tr><td>Average: </td><td><?php echo number_format($avgTemp, 3);?>�C</td><td></td></tr></table><h2>In the last hour:</h2><table class="detail"><tr><td><strong>Date/Time</strong></td><td><strong>Temperature</strong></td></tr><tr><td>Mon 22:45 on 31/08/2015&emsp;&emsp;</td><td>18.62�C</td></tr><tr><td>Mon 22:40 on 31/08/2015&emsp;&emsp;</td><td>18.75�C</td></tr><tr><td>Mon 22:35 on 31/08/2015&emsp;&emsp;</td><td>18.81�C</td></tr><tr><td>Mon 22:30 on 31/08/2015&emsp;&emsp;</td><td>18.81�C</td></tr><tr><td>Mon 22:25 on 31/08/2015&emsp;&emsp;</td><td>18.94�C</td></tr><tr><td>Mon 22:20 on 31/08/2015&emsp;&emsp;</td><td>19.00�C</td></tr><tr><td>Mon 22:15 on 31/08/2015&emsp;&emsp;</td><td>19.00�C</td></tr><tr><td>Mon 22:10 on 31/08/2015&emsp;&emsp;</td><td>19.06�C</td></tr><tr><td>Mon 22:05 on 31/08/2015&emsp;&emsp;</td><td>19.19�C</td></tr><tr><td>Mon 22:00 on 31/08/2015&emsp;&emsp;</td><td>19.19�C</td></tr><tr><td>Mon 21:55 on 31/08/2015&emsp;&emsp;</td><td>19.25�C</td></tr><tr><td>Mon 21:50 on 31/08/2015&emsp;&emsp;</td><td>19.31�C</td></tr></table></div><hr><?php$time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$finish = $time;$total_time = round(($finish - $start), 4);echo '<div class="stats">Page generated in '.$total_time.' seconds. Select executed in '.$selecttime.' seconds. Chart generated in '.$charttime.' seconds.</div>';?></div></body></html>
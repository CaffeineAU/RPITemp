<html><head><?php$time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$start = $time;?>    <link href="css/styles.css" rel="stylesheet" type="text/css"/>    <title>Raspberry Pi Temperature Logger    </title></head>    <script type="text/javascript" src="https://www.google.com/jsapi"></script>    <script type="text/javascript">      google.load("visualization", "1", {packages:["corechart"]});      google.setOnLoadCallback(drawChart);      function drawChart() {        var data = google.visualization.arrayToDataTable([ ['Time', 'Temperature', 'Min', 'Max', 'Ave', 'dummy'],['Sun 22:50', 19.875, 15, 21.62, 18.35, 0],['Sun 22:55', 19.812,,,,0],['Sun 23:00', 19.687,,,,0],['Sun 23:05', 19.625,,,,0],['Sun 23:10', 19.5,,,,0],['Sun 23:15', 19.5,,,,0],['Sun 23:20', 19.375,,,,0],['Sun 23:25', 19.312,,,,0],['Sun 23:30', 19.187,,,,0],['Sun 23:35', 19.187,,,,0],['Sun 23:40', 19.125,,,,0],['Sun 23:45', 19.062,,,,0],['Sun 23:50', 19,,,,0],['Sun 23:55', 18.937,,,,0],['Mon 00:00', 18.937,,,,0],['Mon 00:05', 18.812,,,,0],['Mon 00:10', 18.75,,,,0],['Mon 00:15', 18.687,,,,0],['Mon 00:20', 18.687,,,,0],['Mon 00:25', 18.562,,,,0],['Mon 00:30', 18.5,,,,0],['Mon 00:35', 18.437,,,,0],['Mon 00:40', 18.312,,,,0],['Mon 00:45', 18.312,,,,0],['Mon 00:50', 18.25,,,,0],['Mon 00:55', 18.125,,,,0],['Mon 01:00', 18.125,,,,0],['Mon 01:05', 18.062,,,,0],['Mon 01:10', 18,,,,0],['Mon 01:15', 17.937,,,,0],['Mon 01:20', 17.875,,,,0],['Mon 01:25', 17.812,,,,0],['Mon 01:30', 17.75,,,,0],['Mon 01:35', 17.75,,,,0],['Mon 01:40', 17.687,,,,0],['Mon 01:45', 17.625,,,,0],['Mon 01:50', 17.562,,,,0],['Mon 01:55', 17.5,,,,0],['Mon 02:00', 17.5,,,,0],['Mon 02:05', 17.437,,,,0],['Mon 02:10', 17.375,,,,0],['Mon 02:15', 17.375,,,,0],['Mon 02:20', 17.312,,,,0],['Mon 02:25', 17.25,,,,0],['Mon 02:30', 17.187,,,,0],['Mon 02:35', 17.187,,,,0],['Mon 02:40', 17.125,,,,0],['Mon 02:45', 17.062,,,,0],['Mon 02:50', 17.062,,,,0],['Mon 02:55', 17,,,,0],['Mon 03:00', 16.937,,,,0],['Mon 03:05', 16.937,,,,0],['Mon 03:10', 16.875,,,,0],['Mon 03:15', 16.812,,,,0],['Mon 03:20', 16.75,,,,0],['Mon 03:25', 16.75,,,,0],['Mon 03:30', 16.687,,,,0],['Mon 03:35', 16.687,,,,0],['Mon 03:40', 16.625,,,,0],['Mon 03:45', 16.562,,,,0],['Mon 03:50', 16.562,,,,0],['Mon 03:55', 16.5,,,,0],['Mon 04:00', 16.437,,,,0],['Mon 04:05', 16.437,,,,0],['Mon 04:10', 16.375,,,,0],['Mon 04:15', 16.312,,,,0],['Mon 04:20', 16.25,,,,0],['Mon 04:25', 16.187,,,,0],['Mon 04:30', 16.187,,,,0],['Mon 04:35', 16.187,,,,0],['Mon 04:40', 16.062,,,,0],['Mon 04:45', 16,,,,0],['Mon 04:50', 16,,,,0],['Mon 04:55', 15.937,,,,0],['Mon 05:00', 15.875,,,,0],['Mon 05:05', 15.812,,,,0],['Mon 05:10', 15.75,,,,0],['Mon 05:15', 15.75,,,,0],['Mon 05:20', 15.687,,,,0],['Mon 05:25', 15.625,,,,0],['Mon 05:30', 15.562,,,,0],['Mon 05:35', 15.5,,,,0],['Mon 05:40', 15.5,,,,0],['Mon 05:45', 15.437,,,,0],['Mon 05:50', 15.375,,,,0],['Mon 05:55', 15.312,,,,0],['Mon 06:00', 15.25,,,,0],['Mon 06:05', 15.25,,,,0],['Mon 06:10', 15.187,,,,0],['Mon 06:15', 15.125,,,,0],['Mon 06:20', 15.062,,,,0],['Mon 06:25', 15,,,,0],['Mon 06:30', 15.187,,,,0],['Mon 06:35', 15.562,,,,0],['Mon 06:40', 15.75,,,,0],['Mon 06:45', 16,,,,0],['Mon 06:50', 16.25,,,,0],['Mon 06:55', 16.437,,,,0],['Mon 07:00', 16.562,,,,0],['Mon 07:05', 17.187,,,,0],['Mon 07:10', 18.062,,,,0],['Mon 07:15', 19.125,,,,0],['Mon 07:20', 19.5,,,,0],['Mon 07:25', 20.312,,,,0],['Mon 07:30', 19.75,,,,0],['Mon 07:35', 19.5,,,,0],['Mon 07:40', 19.562,,,,0],['Mon 07:45', 19.687,,,,0],['Mon 07:50', 19.75,,,,0],['Mon 07:55', 19.625,,,,0],['Mon 08:00', 19.312,,,,0],['Mon 08:05', 19.125,,,,0],['Mon 08:10', 19,,,,0],['Mon 08:15', 18.937,,,,0],['Mon 08:20', 18.812,,,,0],['Mon 08:25', 18.687,,,,0],['Mon 08:30', 18.625,,,,0],['Mon 08:35', 18.437,,,,0],['Mon 08:40', 18.312,,,,0],['Mon 08:45', 18.312,,,,0],['Mon 08:50', 18.25,,,,0],['Mon 08:55', 18.125,,,,0],['Mon 09:00', 18,,,,0],['Mon 09:05', 18,,,,0],['Mon 09:10', 17.937,,,,0],['Mon 09:15', 17.875,,,,0],['Mon 09:20', 17.875,,,,0],['Mon 09:25', 17.75,,,,0],['Mon 09:30', 17.687,,,,0],['Mon 09:35', 17.625,,,,0],['Mon 09:40', 17.562,,,,0],['Mon 09:45', 17.562,,,,0],['Mon 09:50', 17.5,,,,0],['Mon 09:55', 17.5,,,,0],['Mon 10:00', 17.437,,,,0],['Mon 10:05', 17.437,,,,0],['Mon 10:10', 17.375,,,,0],['Mon 10:15', 17.375,,,,0],['Mon 10:20', 17.375,,,,0],['Mon 10:25', 17.375,,,,0],['Mon 10:30', 17.312,,,,0],['Mon 10:35', 17.312,,,,0],['Mon 10:40', 17.312,,,,0],['Mon 10:45', 17.312,,,,0],['Mon 10:50', 17.312,,,,0],['Mon 10:55', 17.25,,,,0],['Mon 11:00', 17.312,,,,0],['Mon 11:05', 17.312,,,,0],['Mon 11:10', 17.312,,,,0],['Mon 11:15', 17.312,,,,0],['Mon 11:20', 17.312,,,,0],['Mon 11:25', 17.312,,,,0],['Mon 11:30', 17.312,,,,0],['Mon 11:35', 17.375,,,,0],['Mon 11:40', 17.375,,,,0],['Mon 11:45', 17.375,,,,0],['Mon 11:50', 17.375,,,,0],['Mon 11:55', 17.437,,,,0],['Mon 12:00', 17.437,,,,0],['Mon 12:05', 17.437,,,,0],['Mon 12:10', 17.5,,,,0],['Mon 12:15', 17.5,,,,0],['Mon 12:20', 17.5,,,,0],['Mon 12:25', 17.5,,,,0],['Mon 12:30', 17.562,,,,0],['Mon 12:35', 17.562,,,,0],['Mon 12:40', 17.625,,,,0],['Mon 12:45', 17.625,,,,0],['Mon 12:50', 17.687,,,,0],['Mon 12:55', 17.687,,,,0],['Mon 13:00', 17.687,,,,0],['Mon 13:05', 17.75,,,,0],['Mon 13:10', 17.812,,,,0],['Mon 13:15', 17.812,,,,0],['Mon 13:20', 17.875,,,,0],['Mon 13:25', 17.937,,,,0],['Mon 13:30', 17.937,,,,0],['Mon 13:35', 18,,,,0],['Mon 13:40', 18.062,,,,0],['Mon 13:45', 18.125,,,,0],['Mon 13:50', 18.125,,,,0],['Mon 13:55', 18.187,,,,0],['Mon 14:00', 18.25,,,,0],['Mon 14:05', 18.312,,,,0],['Mon 14:10', 18.312,,,,0],['Mon 14:15', 18.375,,,,0],['Mon 14:20', 18.437,,,,0],['Mon 14:25', 18.437,,,,0],['Mon 14:30', 18.5,,,,0],['Mon 14:35', 18.562,,,,0],['Mon 14:40', 18.625,,,,0],['Mon 14:45', 18.625,,,,0],['Mon 14:50', 18.687,,,,0],['Mon 14:55', 18.75,,,,0],['Mon 15:00', 18.812,,,,0],['Mon 15:05', 18.812,,,,0],['Mon 15:10', 18.875,,,,0],['Mon 15:15', 18.937,,,,0],['Mon 15:20', 18.937,,,,0],['Mon 15:25', 19,,,,0],['Mon 15:30', 19,,,,0],['Mon 15:35', 19.062,,,,0],['Mon 15:40', 19.125,,,,0],['Mon 15:45', 19.125,,,,0],['Mon 15:50', 19.125,,,,0],['Mon 15:55', 19.187,,,,0],['Mon 16:00', 19.187,,,,0],['Mon 16:05', 19.187,,,,0],['Mon 16:10', 19.25,,,,0],['Mon 16:15', 19.187,,,,0],['Mon 16:20', 19.187,,,,0],['Mon 16:25', 19.187,,,,0],['Mon 16:30', 19.187,,,,0],['Mon 16:35', 19.187,,,,0],['Mon 16:40', 19.187,,,,0],['Mon 16:45', 19.187,,,,0],['Mon 16:50', 19.187,,,,0],['Mon 16:55', 19.187,,,,0],['Mon 17:00', 19.187,,,,0],['Mon 17:05', 19.125,,,,0],['Mon 17:10', 19.312,,,,0],['Mon 17:15', 19.625,,,,0],['Mon 17:20', 19.875,,,,0],['Mon 17:25', 20.062,,,,0],['Mon 17:30', 20.25,,,,0],['Mon 17:35', 20.5,,,,0],['Mon 17:40', 20.687,,,,0],['Mon 17:45', 20.875,,,,0],['Mon 17:50', 21.062,,,,0],['Mon 17:55', 21.25,,,,0],['Mon 18:00', 21.375,,,,0],['Mon 18:05', 21.625,,,,0],['Mon 18:10', 21.562,,,,0],['Mon 18:15', 21.437,,,,0],['Mon 18:20', 21.312,,,,0],['Mon 18:25', 21.25,,,,0],['Mon 18:30', 21.5,,,,0],['Mon 18:35', 21.562,,,,0],['Mon 18:40', 21.375,,,,0],['Mon 18:45', 21.375,,,,0],['Mon 18:50', 21.312,,,,0],['Mon 18:55', 21.25,,,,0],['Mon 19:00', 21.187,,,,0],['Mon 19:05', 21.125,,,,0],['Mon 19:10', 21.062,,,,0],['Mon 19:15', 21,,,,0],['Mon 19:20', 20.937,,,,0],['Mon 19:25', 20.875,,,,0],['Mon 19:30', 20.812,,,,0],['Mon 19:35', 20.75,,,,0],['Mon 19:40', 20.687,,,,0],['Mon 19:45', 20.625,,,,0],['Mon 19:50', 20.625,,,,0],['Mon 19:55', 20.5,,,,0],['Mon 20:00', 20.437,,,,0],['Mon 20:05', 20.437,,,,0],['Mon 20:10', 20.375,,,,0],['Mon 20:15', 20.25,,,,0],['Mon 20:20', 20.25,,,,0],['Mon 20:25', 20.187,,,,0],['Mon 20:30', 20.125,,,,0],['Mon 20:35', 20.062,,,,0],['Mon 20:40', 20,,,,0],['Mon 20:45', 20,,,,0],['Mon 20:50', 20,,,,0],['Mon 20:55', 19.875,,,,0],['Mon 21:00', 19.812,,,,0],['Mon 21:05', 19.812,,,,0],['Mon 21:10', 19.75,,,,0],['Mon 21:15', 19.687,,,,0],['Mon 21:20', 19.625,,,,0],['Mon 21:25', 19.562,,,,0],['Mon 21:30', 19.562,,,,0],['Mon 21:35', 19.5,,,,0],['Mon 21:40', 19.375,,,,0],['Mon 21:45', 19.375,,,,0],['Mon 21:50', 19.312,,,,0],['Mon 21:55', 19.25,,,,0],['Mon 22:00', 19.187,,,,0],['Mon 22:05', 19.187,,,,0],['Mon 22:10', 19.062,,,,0],['Mon 22:15', 19,,,,0],['Mon 22:20', 19,,,,0],['Mon 22:25', 18.937,,,,0],['Mon 22:30', 18.812,,,,0],['Mon 22:35', 18.812,,,,0],['Mon 22:40', 18.75,,,,0],['Mon 22:45', 18.625, 15, 21.62, 18.35, 0]]);    var options = { title: 'Temperature',		titleTextStyle : {color: '#555753', fontName: "Segoe UI", fontSize:18},		vAxis: {title: "Temp (�C)", gridlines: {count:5}, maxValue:25},		interpolateNulls: 'true',		hAxis: {slantedText : true, slantedTextAngle: 90,showTextEvery:10, textStyle : {color: '#555753', fontName: "Segoe UI", fontSize:10}},		series: [{color: 'blue', visibleInLegend: true}, {color: 'green', visibleInLegend: true, areaOpacity:0, lineWidth:0.5}, {color: 'orange', visibleInLegend: true, areaOpacity:0, lineWidth:0.5}, {color: 'red', visibleInLegend: true, areaOpacity:0, lineWidth:0.5}, {color: 'green', visibleInLegend: false, areaOpacity:0, lineWidth:0}] };        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));        chart.draw(data, options);      }    </script></head><body><div class="header"><h1>Raspberry Pi Temperature Logger</h1>10:45`PM AEST on Aug 31, 2015</div><div class="main"><form action="/cgi-bin/webgui.py" method="POST">        Show the temperature logs for          <select name="timeinterval">			<option value="6">the last 6 hours</option>			<option value="12">the last 12 hours</option>			<option value="24" selected="selected">the last 24 hours</option>			<option value="72">the last 72 hours</option>			<option value="120">the last 120 hours</option>        </select>        <input type="submit" value="Display">    </form><h2>Temperature Chart</h2><div id="chart_div" style="width: 100%; height: 500px;"></div><div class="footer"><table class="detail"><tr><td></td><td><strong>Temp</strong></td><td><strong>Time</strong></td></tr><tr><td>Min: </td><td>15.00�C </td><td>Mon 06:25 on 31/08/2015</td></tr><tr><td>Max: </td><td>21.62�C </td><td>Mon 18:05 on 31/08/2015</td></tr><tr><td>Average: </td><td>18.35�C</td><td></td></tr></table><h2>In the last hour:</h2><table class="detail"><tr><td><strong>Date/Time</strong></td><td><strong>Temperature</strong></td></tr><tr><td>Mon 22:45 on 31/08/2015&emsp;&emsp;</td><td>18.62�C</td></tr><tr><td>Mon 22:40 on 31/08/2015&emsp;&emsp;</td><td>18.75�C</td></tr><tr><td>Mon 22:35 on 31/08/2015&emsp;&emsp;</td><td>18.81�C</td></tr><tr><td>Mon 22:30 on 31/08/2015&emsp;&emsp;</td><td>18.81�C</td></tr><tr><td>Mon 22:25 on 31/08/2015&emsp;&emsp;</td><td>18.94�C</td></tr><tr><td>Mon 22:20 on 31/08/2015&emsp;&emsp;</td><td>19.00�C</td></tr><tr><td>Mon 22:15 on 31/08/2015&emsp;&emsp;</td><td>19.00�C</td></tr><tr><td>Mon 22:10 on 31/08/2015&emsp;&emsp;</td><td>19.06�C</td></tr><tr><td>Mon 22:05 on 31/08/2015&emsp;&emsp;</td><td>19.19�C</td></tr><tr><td>Mon 22:00 on 31/08/2015&emsp;&emsp;</td><td>19.19�C</td></tr><tr><td>Mon 21:55 on 31/08/2015&emsp;&emsp;</td><td>19.25�C</td></tr><tr><td>Mon 21:50 on 31/08/2015&emsp;&emsp;</td><td>19.31�C</td></tr></table></div><hr><?php$time = microtime();$time = explode(' ', $time);$time = $time[1] + $time[0];$finish = $time;$total_time = round(($finish - $start), 4);echo '<div class="stats">Page generated in '.$total_time.' seconds.</div>';?></div></body></html>
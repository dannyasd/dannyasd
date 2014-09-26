<?php 

$mysqli = new mysqli("localhost", "root", "", "conta");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

$fecha1= '2013/01/01';
$fecha2= '2014/05/08';
$consulta="SELECT empresa.nombre as ejercicio, count(*) as cuentas from empresa,cuenta where empresa.`id_ejercicio` = cuenta.id_ejercicio group by ejercicio";



    $qdp = $mysqli->query($consulta);
   



?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
    
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>amCharts examples</title>
        <link rel="stylesheet" href="style.css" type="text/css">
        <script src="../amcharts/amcharts.js" type="text/javascript"></script>
        <script src="../amcharts/pie.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            var chart;
            var legend;

            var chartData = [ 
            <?php
            while($rdp = $qdp->fetch_assoc()){
            echo "{ country:\"".$rdp['ejercicio']."\", litres:".$rdp['cuentas']."}";
             echo ",";
         }
             
             ?>

                ];

            AmCharts.ready(function () {
                // PIE CHART
                chart = new AmCharts.AmPieChart();
                chart.dataProvider = chartData;
                chart.titleField = "country";
                chart.valueField = "litres";
                chart.outlineColor = "#00F";
                chart.outlineAlpha = .9;
                chart.outlineThickness = 2;

                // WRITE
                chart.write("chartdiv");
            });
        </script>
    </head>
    
    <body>
        <div id="chartdiv" style="width: 100%; height: 400px;"></div>
    </body>

</html>
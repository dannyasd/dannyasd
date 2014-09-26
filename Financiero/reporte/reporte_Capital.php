<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("conta2",$conexion);

$codigoHTML='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lista</title>
</head>

<body>

<img  width="200px" src="../imagenes/logo.png">  <h1><b>Reporte de Cuentas de Capital</b></h1>
<br>
<div align="center">
    <table width="95%" border="1">
      <tr>
        <td bgcolor="#0099FF"><strong>Nit</strong></td>
        <td bgcolor="#0099FF"><strong>tipo_cuenta</strong></td>
        <td bgcolor="#0099FF"><strong>nombre_cuenta</strong></td>
        <td bgcolor="#0099FF"><strong>descripcion</strong></td>
 
      </tr>';

        $consulta=mysql_query("SELECT * FROM  `cuenta` WHERE cuenta.tipo_cuenta =  'Capital' ");
        while($dato=mysql_fetch_array($consulta)){
$codigoHTML.='
      <tr>
        <td>'.$dato['id_cuenta'].'</td>
        <td>'.$dato['tipo_cuenta'].'</td>
        <td>'.$dato['nombre_cuenta'].'</td>
        <td>'.$dato['descripcion'].'</td>
        
      </tr>';
      } 
$codigoHTML.='
    </table>
</div>
</body>
</html>';

$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_Capital.pdf");
?>
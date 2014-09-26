




<img  width="200px" src="../imagenes/logo.png">  <h1><b>Reporte de Ejercicios</b></h1>
<br>


<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("conta2",$conexion);





$query = "SELECT t_cuenta, nombre_cuenta
FROM  `movimiento` ,  `cuenta` 
WHERE  `cuenta`.`id_cuenta` =  `movimiento`.`t_cuenta` 
GROUP BY t_cuenta";

$result = mysql_query($query) or die(mysql_error());

while($cuentas = mysql_fetch_array($result)) {


$id = $cuentas['t_cuenta'];
$nombre_cuenta=$cuentas['nombre_cuenta'];
$query2 = "SELECT * FROM  `movimiento` WHERE  `t_cuenta` =$id";
$result2 = mysql_query($query2) or die(mysql_error());






//Table header
echo "<center><h1>".$nombre_cuenta."</h1></center>";
echo "<center><table class=\"list\"id='pattern-style-a' summary='Meeting Results'>\n";
echo "<tr class=\"table-header\" bgcolor='#FFFFFF'>\n";

echo "<th class=\"\">Id</th>\n";
echo "<th class=\"\">Concepto</th>\n";
echo "<th class=\"\">Debe</th>\n";
echo "<th class=\"\">Haber</th>\n";
echo "</tr>";

$debesum=0;
$habersum=0;
while($row = mysql_fetch_array($result2)) {
$id_movimiento=$row['id_movimiento'];
$concepto=htmlentities($row['concepto']);
$debe=htmlentities($row['debe']);
$haber=htmlentities($row['haber']);

$debesum=$debesum+$debe;
$habersum=$habersum+$haber;



        echo "<tr>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $id_movimiento ."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $concepto."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $debe."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $haber."</a></td>";


        }
echo "</tr>";
echo "<tr>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\"></a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">TOTAL</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $debesum."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $habersum."</a></td>";


echo "</tr>";
    echo "</table><br />\n";
  }

       
$codigoHTML.='
    </table>
</div>
</body>
</html>';
$codigoHTML.='
$codigoHTML.=';
$codigoHTML=utf8_decode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_LibroM.pdf");
?>
<?php 
	require_once("dompdf/dompdf_config.inc.php");
	$conexion = mysql_connect("localhost","root","");
	mysql_select_db("conta2",$conexion);



for($a=0;$a<3;$a++){ 

if($a==0){
$tipo="Activo";
}
if($a==1){
$tipo="Pasivo";
}
if($a==2){
$tipo="Capital";    
}

$query2 = "SELECT t_cuenta, nombre_cuenta,debe,haber FROM `movimiento` , `cuenta` WHERE `cuenta`.`id_cuenta` = `movimiento`.`t_cuenta` AND `cuenta`.`tipo_cuenta` = '$tipo' GROUP BY t_cuenta";
//echo $query2;
$result2 = mysql_query($query2) or die(mysql_error());






//Table header
echo "<h1><center>".$tipo."</h1>";
echo "<center><table class=\"list\"id='pattern-style-a' summary='Meeting Results'>\n";
echo "<tr class=\"table-header\" bgcolor='#FFFFFF'>\n";

echo "<th class=\"\">Cuenta</th>\n";
echo "<th class=\"\">Debe</th>\n";
echo "<th class=\"\">Haber</th>\n";
echo "</tr>";
$debesum=0;
$habersum=0;
while($row = mysql_fetch_array($result2)) {
$ncuenta=htmlentities($row['nombre_cuenta']);
$debe=htmlentities($row['debe']);
$haber=htmlentities($row['haber']);


                echo "<tr>";
                echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $ncuenta ."</a></td>";
                echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $debe."</a></td>";
                echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $haber."</a></td>";


                }
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
$dompdf->stream("ListadoEmpleado.pdf");
?>
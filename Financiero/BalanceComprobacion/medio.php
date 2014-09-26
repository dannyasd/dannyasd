 <?php
session_start();


if(isset($_SESSION['login'])){




  ?>
<!DOCTYPE html>  
<html>  
    <head>  
       <meta charset="utf-8" />
       <link rel="stylesheet" type="text/css" href="/Financiero/estilos/style.css">
     
       <link rel="stylesheet" media="screen" href="/Financiero/estilos/stilo.css" >

        

    </head>
    <body



<!--   -en esta seccion estoy creando mi menu-->
     <center>  <nav>
  <ul>
    <li><a href="/Financiero/index.php">Sistema contable</a></li>




<!--   Creacion de Menu principal-->
    <li><a href="/Financiero/ejercicio/medio.php">Ejercisio</a>
       
       </li><!--  Termina Menu principal-->
    


<!--   Creacion de Menu principal-->
    <li><a href="/Financiero/cuentas/medio.php" >Catalogo de cuentas</a>
      <!--   Creacion de subMenu -->
      <ul> 
        <li><a href="/Financiero/cuentas/agregar_med.php">Agregar Cuenta</a></li>
        
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->




<!--   Creacion de Menu principal-->
    <li><a href="/Financiero/movimiento/medio.php">Movimientos</a>
        <!--   Creacion de subMenu -->
        <ul>
        <li><a href="/Financiero/movimiento/agregar_med.php">Nuevo Movimiento</a></li>
        
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->

<!--   Creacion de Menu principal-->
    <li><a href="/Financiero/libroMayor/medio.php">Libro Mayor</a>
        <!--   Creacion de subMenu -->
        
    </li><!--  Termina Menu principal-->

<!- <li><a href="#">Resultados</a>
        <!--   Creacion de subMenu -->
        <ul>
        <li><a href="/Financiero/BalanceComprobacion/medio.php">Balance de Comprobacion</a></li>
        <li><a href="/Financiero/EdoResultado/medio.php">Estado de Resultado</a></li>
        <li><a href="/Financiero/balanceGeneral/medio2.php">Balance General</a></li>
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->


    <!--   Creacion de Menu principal-->
    <li><a href="#"><img width='50px' height='50px' style='border-radius: 50%' src="/Financiero/imagenes/<?php echo $nombre;?>.jpg"></a>
<!--   Creacion de subMenu -->
        <ul><li><a href="/Financiero/login/perfil.php">Perfil</a></li>
        <li><a href="/Financiero/medios/medio.php">Usuarios</a></li>
        <li><a href="/Financiero/login/salir.php">Salir</a></li>
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->




  </ul>
</nav>
<!--   Termino de crear mi menu-->
</center>






<?php $nivel_dir="../"; 


//obtener configuracion de la base de datos

require ($nivel_dir.'include/config.php');
//variables necesarias



 
 ?>
<br />
 
<!-- Seccion del formulario ------  hidden inline form -->



<!-- Fin del bloque de formulario   -->

<?PHP

	 
//mandar query con la seleccion

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
$total=$debesum-$habersum;



				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $id_movimiento ."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $concepto."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $debe."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $haber."</a></td>";


				}
echo "</tr>";
echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\"></a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">TOTAL</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $debesum."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $habersum."</a></td>";
          echo "  <td class=\"\"><a class=\"cell-link\" href=\"#\">". $total."</a></td>";


echo "</tr>";
		echo "</table><br />\n";
	}


?>

<br><br>
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>

<?php
}
else {
  header("location: /Financiero/login/login.php?error=verdadero1");}
?>


  <?php
session_start();

$nombre=$_SESSION['login'];



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

<!--   Creacion de Menu principal-->
    <li><a href="#">Resultados</a>
        <!--   Creacion de subMenu -->
        <ul>
        <li><a href="#">Balance de Comprobacion</a></li>
        <li><a href="#">Estado de Resultado</a></li>
        <li><a href="/Financiero/balanceGeneral/medio2.php">Balance General</a></li>
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->


    <!--   Creacion de Menu principal-->
    <li><a href="#"><img width='50px' height='50px' style='border-radius: 50%' src="/Financiero/imagenes/<?php echo $nombre;?>.jpg"></a>
<!--   Creacion de subMenu -->
        <ul>
        <li><a href="/Financiero/login/perfil.php">Perfil</a></li>
        <li><a href="/Financiero/medios/medio.php">Usuarios</a></li>
        <li><a href="/Financiero/login/salir.php">Salir</a></li>
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->




  </ul>
</nav>
<!--   Termino de crear mi menu-->
</center>
<section id="contenedor">
 



 <?php
session_start();
  ?>


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

$query = "SELECT * FROM movimiento,cuenta WHERE movimiento.t_cuenta=cuenta.id_cuenta;";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);



//Table header
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\" bgcolor='#FFFFFF'>\n";

echo "<th class=\"\">Id</th>\n";
echo "<th class=\"\">Concepto</th>\n";
echo "<th class=\"\">Tipo cuenta</th>\n";
echo "<th class=\"\">Debe</th>\n";
echo "<th class=\"\">Haber</th>\n";
echo "<th class=\"\">id_ejercicio</th>\n";
echo "<th class=\"\">Fecha de Movimiento</th>\n";



echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";


echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id_movimiento=$row['id_movimiento'];
$concepto=htmlentities($row['concepto']);
$t_cuenta=htmlentities($row['tipo_cuenta']);
$debe=htmlentities($row['debe']);
$haber=htmlentities($row['haber']);
$id_ejercicio=htmlentities($row['id_ejercicio']);
$f_movimiento=htmlentities($row['f_movimiento']);


				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $id_movimiento ."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $concepto."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $t_cuenta."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $debe."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $haber."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $id_ejercicio."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" href=\"#\">". $f_movimiento."</a></td>";
				

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"agregar_med.php?id_movimiento=".$id_movimiento."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"borrar_med.php?del=".$id_movimiento."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"agregar_med.php?insert=ok\"><span>Agregar Movimiento</span></a></td></tr>";
			}
		echo "</table><br />\n";
	} else {
		echo "<b><center>NO DATA</center></b>\n";
	}


?>

<br><br>
   </center><div class="pie"><center><p>Hecho por dannyasd </p><center></div>



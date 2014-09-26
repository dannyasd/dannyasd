<<!DOCTYPE html>
<html>
<head>
	<title>Sistema Financiero</title>
	<meta charset="utf-8" />
       <link rel="stylesheet" type="text/css" href="/Financiero/estilos/style.css">
     
       <link rel="stylesheet" media="screen" href="/Financiero/estilos/stilo.css" >
	
</head>
<body>


<!--   -en esta seccion estoy creando mi menu-->
     <center>  <nav>
	<ul>
		<li><a href="/Financiero/index.php">Sistema contable</a></li>




<!--   Creacion de Menu principal-->
		<li><a href="/Financiero/ejercicio/medio.php">Ejercisio</a>
			 
			 <!--   Creacion de subMenu -->
			<ul>
				<li><a href="/Financiero/ejercicio/agregar_med.php">Editar Ejercisio</a></li>

				
			</ul><!--   Creacion de subMenu -->
		</li><!--  Termina Menu principal-->
		


<!--   Creacion de Menu principal-->
		<li><a href="#">Catalogo de cuentas</a>
			<!--   Creacion de subMenu -->
			<ul> 
				<li><a href="#">Agregar Cuenta</a></li>
				
			</ul><!--   Creacion de subMenu -->
		</li><!--  Termina Menu principal-->




<!--   Creacion de Menu principal-->
		<li><a href="#">Movimientos</a>
				<!--   Creacion de subMenu -->
				<ul>
				<li><a href="#">Nuevo Movimiento</a></li>
				
			</ul><!--   Creacion de subMenu -->
		</li><!--  Termina Menu principal-->

<!--   Creacion de Menu principal-->
		<li><a href="#">Libro Mayor</a>
				<!--   Creacion de subMenu -->
				<ul>
				<li><a href="#">Nuevo Movimiento</a></li>
				<li><a href="#">Ver Movimientos</a></li>
			</ul><!--   Creacion de subMenu -->
		</li><!--  Termina Menu principal-->

<!--   Creacion de Menu principal-->
		<li><a href="#">Resultados</a>
				<!--   Creacion de subMenu -->
				<ul>
				<li><a href="#">Balance de Comprobacion</a></li>
				<li><a href="#">Estado de Resultado</a></li>
				<li><a href="#">Balance General</a></li>
			</ul><!--   Creacion de subMenu -->
		</li><!--  Termina Menu principal-->


		<!--   Creacion de Menu principal-->
		<li><a href="#"><img src="#"></a>
<!--   Creacion de subMenu -->
				<ul>
				<li><a href="#">Perfil</a></li>
				<li><a href="/Financiero/medios/medio.php">Usuarios</a></li>
				<li><a href="/Financiero/medios/salir.php">Salir</a></li>
			</ul><!--   Creacion de subMenu -->
		</li><!--  Termina Menu principal-->




	</ul>
</nav>
<!--   Termino de crear mi menu-->
</center>


 







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

$query = "SELECT * FROM conta2.ejercicio;";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);



//Table header
echo "<table class=\"list\">\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\">Id</th>\n";
echo "<th class=\"\">Nombre de le empresa</th>\n";
echo "<th class=\"\">Descripcion</th>\n";
echo "<th class=\"\">RFC</th>\n";
echo "<th class=\"\">Direccion</th>\n";
echo "<th class=\"\">Telefono</th>\n";
echo "<th class=\"\">Fecha</th>\n";


echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";


echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id_ejercicio=$row['id_ejercicio'];
$nom_empresa=htmlentities($row['nom_empresa']);
$descripcion=htmlentities($row['descripcion']);
$RFC=htmlentities($row['RFC']);
$direccion=htmlentities($row['direccion']);
$telefono=htmlentities($row['telefono']);
$f_ejercicio=htmlentities($row['f_ejercicio']);

				echo "<tr>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $id_ejercicio ."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $nom_empresa."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $descripcion."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $RFC."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $direccion."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $telefono."</a></td>";
				echo "	<td class=\"\"><a class=\"cell-link\" >". $f_ejercicio."</a></td>";

				
				

				//echo "	<input type=\"image\" src=\"images/update.png\" alt=\"Update Row\" class=\"update\" title=\"Update Row\">\n";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"/Financiero/movimiento/agregar_med.php?id_ejercicio=".$id_ejercicio."\"><span>Elegir</span></a></td>";
				echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"agregar_med.php?id_ejercicio=".$id_ejercicio."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"borrar_med.php?del=".$id_ejercicio."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"agregar_med.php?insert=ok\"><span>Agregar Ejercisio</span></a></td></tr>";
			}
		echo "</table><br />\n";
	} else {
		echo "<b><center>NO DATA</center></b>\n";
	}


?>
<br><br>
   </center><div class="pie"><center><p>Hecho por dannyasd </p><center></div>



</body>
</html>>
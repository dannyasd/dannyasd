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



$total_ventas=0;
$almacen_inicial=0;
$almacen_debe=0;
$almacen_haber=0;
$almacen=0;
$inv_final=0;
$costo_de_venta=0;
$utilidad_bruta=0;
$IRC=0;



$query = "SELECT * FROM `movimiento` WHERE `t_cuenta` = 58";

$result = mysql_query($query) or die(mysql_error());

while($cuentas = mysql_fetch_array($result)) {

$total_ventas=$total_ventas+$cuentas['debe'];

}

$query = "SELECT * FROM `movimiento` WHERE `t_cuenta` = 59";

$result = mysql_query($query) or die(mysql_error());

while($cuentas = mysql_fetch_array($result)) {

$almacen_debe=$almacen_debe+$cuentas['debe'];
$almacen_haber=$almacen_haber+$cuentas['haber'];
}


$query = "SELECT * FROM `movimiento` WHERE `t_cuenta` = 60";

$result = mysql_query($query) or die(mysql_error());

while($cuentas = mysql_fetch_array($result)) {

$IRC=$IRC+$cuentas['debe'];

}






//Table header
echo "<center><h1>Estado de Resultados</h1></center>";
echo "<center><table class=\"list\"id='pattern-style-a' summary='Meeting Results'>\n";
?>

<tr>
				<td><a class="cell-link" href="#"></a>Ventas Netas</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $total_ventas;?></td>
</tr>



<tr>
        <td><a class="cell-link" href="#"></a>Inventario Inicial</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $almacen_inicial;?></td>
<td><a class="cell-link" href="#"></a></td>
</tr>





<tr>
        <td><a class="cell-link" href="#"></a>Compras Netas</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $almacen_debe;?></td>
<td><a class="cell-link" href="#"></a></td>
</tr>



<tr>
        <td><a class="cell-link" href="#"></a>Mercancias Disponibles</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $almacen_debe;?></td>
<td><a class="cell-link" href="#"></a></td>
</tr>

<?php 

$total_almacen=$almacen_debe-$almacen_haber;
?>
<tr>
        <td><a class="cell-link" href="#"></a>Inventario Final</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $total_almacen;?></td>
<td><a class="cell-link" href="#"></a></td>
</tr>

<?php 

$costo_de_venta=$almacen_debe-$total_almacen;
?>
<tr>
        <td><a class="cell-link" href="#"></a>Costo de Venta</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $costo_de_venta;?></td>
</tr>

<?php 

$utilidad_bruta=$total_ventas-$costo_de_venta;
?>
<tr>
        <td><a class="cell-link" href="#"></a>Utilidad Bruta</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><b><?php echo $utilidad_bruta;?></b></td>
</tr>

<tr>
        <td><a class="cell-link" href="#"></a>ISR</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><?php echo $IRC;?></td>
</tr>
<?php 

$TOTAL=$utilidad_bruta-$IRC;
?>
<tr>
        <td><a class="cell-link" href="#"></a>Util. Neta. Ejer</td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a></td>
<td><a class="cell-link" href="#"></a><h1><b><?php echo $TOTAL;?></b></h1></td>
</tr>

<?php
echo "<center></table>";


?>
<br><br>
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>


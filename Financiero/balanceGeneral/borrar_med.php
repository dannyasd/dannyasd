
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

<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'include/config.php');

//variables necesarias

?>
    	<div class="form clearfix">
    <div class="form-header">
	<h2>&nbsp;</h2>

<form id="form" name="form" action="/examenes/examenes.php" method="post">
  <div class="button large"></div>
	</form> 
    </div>

</div>

		
		<div class="form clearfix">
    <div class="form-header">

	<h2>¿Esta seguro de borrar a este Movimiento?</h2>

	<form id="form" name="form" action="inserta_med.php" method="post">
	<input name="del" type="hidden"  id="del"  value="<?php echo $_GET["del"]; ?>" >		  
		 <div class="button large"><input type="submit" value="Borrar">
		 </div>
	</form> 
	      
    </div>

</div>

<br><br>
   </center><div class="pie"><center><p>Hecho por dannyasd </p><center></div>



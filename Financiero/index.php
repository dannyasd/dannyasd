
  <?php
session_start();

$nombre=$_SESSION['login'];
if(isset($_SESSION['login'])){



  ?>
<!DOCTYPE html>  
<html>  
    <head>  
       <meta charset="utf-8" />
       <link rel="stylesheet" type="text/css" href="/Financiero/estilos/style.css">
     
       <link rel="stylesheet" media="screen" href="/Financiero/estilos/stilo.css" >

       <script language="JavaScript" type="text/javascript">
alert("BIENVENIDO AL SISTEMA FINANCIERO, PARA COMENZAR SELECCIONA UN EJERCISIO");
</script>
              

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
		<li><a href="#" >Catalogo de cuentas</a>
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
<table border="">

<p>Bienvenido al Sistema Contable <h1><?php echo $nombre;?><h1></p>


</table>






 <br><br>
   </center><div class="pie"><center><p>Hecho por dannyasd </p><center></div>



<?php
}
else {
	header("location: /Financiero/login/login.php?error=verdadero1");}
?>
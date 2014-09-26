
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
        <li><a href="/Financiero/BalanceComprobacion/medio.php">Balance de Comprobacion</a></li>
        <li><a href="/Financiero/EdoResultado/medio.php">Estado de Resultado</a></li>
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
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
//require_once($nivel_dir.'template/pop.php');

if (isset($_GET["id_cuenta"]))
	{
		$query1 = "SELECT * FROM conta2.cuenta where id_cuenta=".$_GET["id_cuenta"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_cuenta=$row1['id_cuenta'];
		$tipo_cuenta=$row1['tipo_cuenta'];
		$nombre_cuenta=$row1['nombre_cuenta'];
		$descripcion=$row1['descripcion'];
		
			
	} else {
		$id_cuenta=$row1[""];
		$tipo_cuenta=$row1[""];
		$nombre_cuenta=$row1[""];
		$descripcion=$row1[""];
	
		}

?>
<center>
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Agrega Nueva cuenta</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_med.php?id_cuenta<?php echo $_GET["id_cuenta"];?>" method="post">
    
		<div>
			  <label for="tipo_cuenta" >Tipo de Cuenta</label>
			  
	          
			 <select id="text3" name="tipo_cuenta">
			  <option selected>Eliga un tipo de Usuario</option>
	  <option value="Activo">Activo</option>
	  <option value="Pasivo">Pasivo</option>
	  <option value="Capital">Capital</option>
	 
	</select> 
			  </div>
          

          <div>
		  <label for="nombre_cuenta">Nombre de la Cuenta</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="nombre_cuenta"  value="<?php echo $nombre_cuenta; ?>"  size="40" required="required">
		  </div>
         <div>

          <div>
		  <label for="descripcion">descripcion</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="descripcion"  value="<?php echo $descripcion; ?>"  size="40" required="required">
		  </div>
         <div>
		 
		 
		 

          
        
       
        <?php if (isset($_GET["id_cuenta"])){ ?>

		  <input name="id_cuenta" type="hidden"  id="id_cuenta"  value="<?php echo $_GET["id_cuenta"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		 
		  
	 
		<div class="button large"><input type="submit" id="gobutton" ></div>
  </form> 

   

<br><br>
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>




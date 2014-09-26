
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
    <li><a href="#" >Catalogo de cuentas</a>
      <!--   Creacion de subMenu -->
      <ul> 
        <li><a href="#">Agregar Cuenta</a></li>
        
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

if (isset($_GET["id_ejercicio"]))
	{
		$query1 = "SELECT * FROM conta2.ejercicio where id_ejercicio=".$_GET["id_ejercicio"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_ejercicio=$row1['id_ejercicio'];
		$nom_empresa=$row1['nom_empresa'];
		$descripcion=$row1['descripcion'];
		$RFC=$row1['RFC'];
		$direccion=$row1['direccion'];
		$telefono=$row1['telefono'];
			
	} else {
		$id_ejercicio=$row1[""];
		$nom_empresa=$row1[""];
		$descripcion=$row1[""];
		$RFC=$row1[""];
		$direccion=$row1[""];
		$telefono=$row1[""];
		
		}

?>
<center>
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Agrega un nuevo ejercicio</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_med.php?id_ejercicio<?php echo $_GET["id_ejercicio"];?>" method="post">
    
		<div>
		  <label for="nom_empresa">Nombre empresa</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="nom_empresa"  value="<?php echo $nom_empresa; ?>"  size="40" required="required">
		  </div>
          

          <div>
		  <label for="descripcion">descripcion</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="descripcion"  value="<?php echo $descripcion; ?>"  size="40" required="required">
		  </div>
         <div>

          <div>
		  <label for="RFC">RFC</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="RFC"  value="<?php echo $RFC; ?>"  size="40" required="required">
		  </div>
         <div>
		  <div>
		  <label for="direccion">direccion</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="direccion"  value="<?php echo $direccion; ?>"  size="40" required="required">
		  </div>
         <div>
          <div>
		  <label for="telefono">telefono</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="telefono"  value="<?php echo $telefono; ?>"  size="40" required="required">
		  </div>
         <div>

          <div>
		  <label for="f_ejercicio">Fecha de Movimiento</label>
		  
          
		  <input class="skinny" type="date" id="text3" name="f_ejercicio"  value="<?php echo $f_ejercicio; ?>"  size="40" required="required">
		  </div>
         <div>
		 
		 
		 
		 
		 

          
        
       
        <?php if (isset($_GET["id_ejercicio"])){ ?>

		  <input name="id_medi" type="hidden"  id="id_medi"  value="<?php echo $_GET["id_ejercicio"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		 
		  
	 
		<div class="button large"><input type="submit" id="gobutton" ></div>
  </form> 

   
<br><br>
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>


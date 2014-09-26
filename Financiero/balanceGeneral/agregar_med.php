
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

if (isset($_GET["id_ejercicio"])) {
	# code...

$_SESSION['id_ejercicio']=$_GET["id_ejercicio"];
 } ?>


<?PHP 
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
//require_once($nivel_dir.'template/pop.php');

if (isset($_GET["id_movimiento"]))
	{
		 $query1 = "SELECT * FROM movimiento where id_movimiento=".$_GET["id_movimiento"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row1 = mysql_fetch_array($result1);
		$id_movimiento=$row1['id_movimiento'];
		$concepto=$row1['concepto'];
		$t_cuenta=$row1['t_cuenta'];
		$debe=$row1['debe'];
		$haber=$row1['haber'];
		$id_ejercicio=$row1['id_ejercicio'];
        
			
	} else {
		$id_movimiento=$row1[""];
		$concepto=$row1[" "];
		$t_cuenta=$row1[" "];
		$debe=$row1[" "];	
		$haber=$row1[" "];

		$id_ejercicio=$row1[" "];

		
		}
		

?>
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Agrega un nuevo Movimiento</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_med.php?id_movimiento=<?php echo $_GET["id_movimiento"];?>" method="post">
    
<div>
		  <label for="concepto">Ejercicio</label>
		  
          
		  <input class="skinny" type="text" id="concepto" name="concepto"  value="<?php echo $_GET["id_ejercicio"]; ?>"  size="40" required="required">
		  </div>

<div>
		  <label for="tipos_de_cuentas">Tipo de cuenta</label>


 		<a  class="modalbox small-button modal" href="/Financiero/cuentas/activo.php"><span>C.Activo</span></a>
 		<a  class="modalbox small-button modal" href="/Financiero/cuentas/pasivo.php"><span>C.Pasivo</span></a>
 		<a  class="modalbox small-button modal" href="/Financiero/cuentas/capital.php"><span>C.Capital</span></a></td>
		  
          
		 
		  </div>
<div>
		  <label for="t_cuenta">Cuentas</label>
		  
          
		  <input class="skinny" type="text" id="t_cuenta" name="t_cuenta"  value="<?php echo $_GET["id_cuenta"];; ?>"  size="40" required="required">
		  </div>



		<div>
		  <label for="concepto">Concepto</label>
		  
          
		  <input class="skinny" type="text" id="concepto" name="concepto"  value="<?php echo $concepto; ?>"  size="40" required="required">
		  </div>
          

          <div>
		  <label for="debe">costo a Debito</label>
		  
          
		  <input class="skinny" type="text" id="debe" name="debe"  value="<?php echo $debe; ?>"  size="40" >
		  </div>
         <div>

         <div>
		  <label for="haber">costo a Credito</label>
		  
          
		  <input class="skinny" type="text" id="haber" name="haber"  value="<?php echo $haber; ?>"  size="40" >
		  </div>
         <div>
           <div>
		  <label for="f_movimiento">Fecha de Movimiento</label>
		  
          
		  <input class="skinny" type="date" id="f_movimiento" name="f_movimiento"  value="<?php echo $f_movimiento; ?>"  size="40" >
		  </div>
         <div>




   

          
        
       
        <?php
         if (isset($_GET["id_movimiento"])){ ?>
		  <input name="id_movimiento" type="hidden"  id="id_movimiento"  value="<?php echo $_GET["id_movimiento"]; ?>" >
		   <input name="id_ejercicio" type="hidden"  id="id_ejercicio"  value="<?php echo $id_ejercicio; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		 
		  
	 
		<div class="button large"><input type="submit" id="send" ></div>
  </form> 

   


<br><br>
   </center><div class="pie"><center><p>Hecho por dannyasd </p><center></div>



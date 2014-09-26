
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
/*
*$nivel_dir: obtener configuracion de los niveles de la base de datos
*/
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias
//include ($nivel_dir.'includes/existeconexion.php');
//require_once($nivel_dir.'template/pop.php');

if (isset($_GET["id_usuario"]))
	{
		$query1 = "SELECT * FROM conta2.usuarios where id_usuario=".$_GET["id_usuario"]."";
		$result1 = mysql_query($query1) or die(mysql_error());
		$row = mysql_fetch_array($result1);
		$id_usuario=$row['id_usuario'];
		$nombre=$row['nombre'];
		$login=$row['login'];
			$contrasena=$row['contrasena'];
				$email=$row['email'];
				$id_tipo_usuario=$row['id_tipo_usuario'];
		
	} else {
		$id_usuario=$row[""];
		$nombre=$row[""];
		$login=$row[""];
		$contrasena=$row[""];
			$email=$row1[""];
			$id_tipo_usuario=$row['id_tipo_usuario'];				
		}

?>
<center>
<div class="form clearfix">
    <div class="form-header">
        <h2 class="form-title">Agrega a un Nuevo Usuario</h2>
    </div>
    
     <div class="error_list clearfix">
    <div id="myform_errorloc"></div></div>


	<form id="new_project" name="myform" action="inserta_med.php?id_usuario=<?php echo $_GET["id_usuario"];?>" method="post">
    
		<div>
		  <label for="nombre">Nombre del usuario</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="nombre"  value="<?php echo $nombre; ?>"  size="40" required="required">
		  </div>
          <div>
		  <label for="login">login</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="login"  value="<?php echo $login; ?>"  size="40" required="required">
		  </div>
         <div>
		  <label for="contrasena">Contrasena</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="contrasena"  value="<?php echo $contrasena; ?>"  size="40" required="required">
		  </div>
        
         <div>
		  <label for="email">email</label>
		  
          
		  <input class="skinny" type="text" id="text3" name="email"  value="<?php echo $email; ?>"  size="40" required="required">
		  </div>
		   <div>
		  <label for="id_tipo_usuario">tipo de usuario</label>
		  
          
		 <select id="text3" name="id_tipo_usuario">
		  <option selected>Eliga un tipo de Usuario</option>
  <option value="Gerente">Gerente</option>
  <option value="Contador">Contador</option>
 
</select> 
		  </div>
          
          
        
       
        <?php if (isset($_GET["id_usuario"])){ ?>
		  <input name="id_usuario" type="hidden"  id="id_medi"  value="<?php echo $_GET["id_usuario"]; ?>" >
        <?php  } else{ ?>
         <input name="insert" type="hidden"  id="insert"  value=1 >
        <?php }?>
        
          		  
		  <br>
		  
		 
		  
	 
		<div class="button large"><input type="submit" id="send" ></div>
  </form> 

<br><br>
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>


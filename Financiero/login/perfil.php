
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

$query = "SELECT * FROM usuarios where login='$nombre'";

$result = mysql_query($query) or die(mysql_error());

//Contar el numero de filas.
$count = mysql_num_rows($result);



//Table header
echo "<center><table class=\"list\"id='pattern-style-a' summary='Meeting Results' >\n";
echo "<tr class=\"table-header\">\n";
echo "<th class=\"\">Id</th>\n";
echo "<th class=\"\">Nombre</th>\n";
echo "<th class=\"\">login</th>\n";
echo "<th class=\"\">contraseña</th>\n";
echo "<th class=\"\">email</th>\n";
echo "<th class=\"\">tipo de Usuario</th>\n";
echo "<th class=\"\">Foto</th>\n";

echo "</tr>";
if ($count !== 0) {
while($row = mysql_fetch_array($result)) {
$id_usuario=$row['id_usuario'];
$nombre=htmlentities($row['nombre']);
$login=htmlentities($row['login']);
$contrasena=htmlentities($row['contrasena']);
$email=htmlentities($row['email']);
$id_tipo_usuario=htmlentities($row['id_tipo_usuario']);

        echo "<tr>";
        echo "  <td class=\"\"><a class=\"cell-link\" >". $id_usuario ."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" >". $nombre."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" >". $login."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" >". $contrasena."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" >". $email."</a></td>";
        echo "  <td class=\"\"><a class=\"cell-link\" >". $id_tipo_usuario."</a></td>";
        ?>
         <td><img width='50px' height='50px' style='border-radius: 50%' src="/Financiero/imagenes/<?php echo $nombre;?>.jpg"><td>
<?php

        
        

        }
    echo "</table><br />\n";
  } else {
    echo "<b><center>NO DATA</center></b>\n";
  }


?>

<br><br>
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>




<?php
}
else {
  header("location: /Financiero/login/login.php?error=verdadero1");}
?>



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
        <ul>
        <li><a href="#">Perfil</a></li>
        <li><a href="/Financiero/medios/medio.php">Usuarios</a></li>
        <li><a href="/Financiero/login/salir.php">Salir</a></li>
      </ul><!--   Creacion de subMenu -->
    </li><!--  Termina Menu principal-->




  </ul>
</nav>
<!--   Termino de crear mi menu-->
</center>



<?php
$mysqli = new mysqli("localhost", "root", "", "conta2");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

?>


 <br><br>

<form action="#" method="post">
    
    <input name='buscar'  type='text' maxlength='20'>
    <input name='submit' type='submit' value='Buscar'>
</form>
<?php 

$limit = 11;


if (isset($_GET["buscar"])) {
$var1=$_GET["buscar"];
}elseif (isset($_POST["buscar"])){
$var1=$_POST["buscar"];
}else {
 $var1=""; 
}
echo $var1;
//////////////////////////////////////////////////////


// pagina pedida
$pag = (int) $_GET["pag"];
if ($pag < 1)
{
   $pag = 1;
}
$offset = ($pag-1) * $limit;

/////////////////////////////////////////////////////




 $query = "SELECT *  FROM `movimiento` WHERE `t_cuenta` = 1";


//////////////////////////////////////////////////
 $queryTotal = "SELECT FOUND_ROWS() as total";

///////////////////////////////////////////////   
///////////////////////////////////







if ($result = $mysqli->query($query)) {
$result1 = $mysqli->query($queryTotal);
$rowTotal = $result1->fetch_assoc();
  $total = $rowTotal["total"];


echo "<table  align='center' id='pattern-style-a' summary='Meeting Results'>";
echo "<tr bgcolor='#FFFFFF'>";
echo "<td><b>Id_Movim</b></td>";
echo "<td><b>Concepto</b></td>";
echo "<td><b>tipo cuenta</b></td>";
echo "<td><b>Debe</b></td>";
echo "<td><b>Haber</b></td>";
echo "<td><b>Id Ejer</b></td>";
echo "<td><b>Fecha Movi</b></td>";



echo "</tr>";

    /* obtener array asociativo */
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
    echo "<td>".$row["id_movimiento"]."</td>";
    echo "<td>".$row["concepto"]."</td>";
    echo "<td>".$row["tipo_cuenta"]."</td>";
    echo "<td>".$row["debe"]."</td>";
    echo "<td>".$row["haber"]."</td>";
    echo "<td>".$row["id_ejercicio"]."</td>";
    echo "<td>".$row["f_movimiento"]."</td>";



    echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"/Financiero/movimiento/agregar_med.php?id_ejercicio=".$_SESSION['id_ejercicio']."&id_cuenta=".$row["id_cuenta"]."\"><span>Elegir</span></a></td>";
    echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"agregar_med.php?id_cuenta=".$row["id_cuenta"]."\"><span>Editar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"borrar_med.php?del=".$row["id_cuenta"]."\"><span>Borrar</span></a></td>";
				echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"agregar_med.php?insert=ok\"><span>Agregar Medio</span></a></td></tr>";
			

    echo "</tr>";

          //echo  $row["title"].": ".$row["first_name"]."</br>";
    }

echo "<tfoot>";
     echo  "<tr>";
         echo "<td colspan='2'>";
      
         $totalPag = ceil($total/$limit);
         $links = array();
         for( $i=1; $i<=$totalPag ; $i++)
         {
            $links[] = "<a href=\"?pag=$i&buscar=$var1\">$i</a>"; 
         }
         echo implode(" - ", $links);
     
        echo "</td>";
      echo "</tr>";
   echo "</tfoot>";


echo "</table>";
    /* liberar el resultset */
    $result->free();

}

 ?>




<br><br>
   </center><div class="pie"><center><p>Hecho por dannyasd </p><center></div>



</body>
</html>
<?php 


/* cerrar la conexión */
$mysqli->close();

?>
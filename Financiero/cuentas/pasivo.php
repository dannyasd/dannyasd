
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

<?php
$mysqli = new mysqli("localhost", "root", "", "conta2");

/* verificar la conexión */
if (mysqli_connect_errno()) {
    printf("Conexión fallida: %s\n", mysqli_connect_error());
    exit();
}

?>


<center>
 <br><br>
<form action="#" method="post">
    
    <input name='buscar'  type='text' maxlength='20' id="text3">
    <input name='submit' type='submit' value='Buscar'>
</form></center>
<?php 

$limit = 10;


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




 $query = "select distinct SQL_CALC_FOUND_ROWS id_cuenta, tipo_cuenta, nombre_cuenta, descripcion from conta2.cuenta where tipo_cuenta= 'Pasivo' and nombre_cuenta like '%$var1%' LIMIT $offset, $limit"; 
//////////////////////////////////////////////////
 $queryTotal = "SELECT FOUND_ROWS() as total";

///////////////////////////////////////////////   
///////////////////////////////////







if ($result = $mysqli->query($query)) {
$result1 = $mysqli->query($queryTotal);
$rowTotal = $result1->fetch_assoc();
  $total = $rowTotal["total"];


echo "<center><table  align='center' id='pattern-style-a' summary='Meeting Results'>";
echo "<tr bgcolor='#FFFFFF'>";
echo "<td><b>Id_cuenta</b></td>";
echo "<td><b>Tipo de cuenta</b></td>";
echo "<td><b>NOmbre de la cuenta</b></td>";
echo "<td><b>Descripcion</b></td>";
echo "<td><b><a class=\"modalbox small-button  modal\" href=\"/Financiero/reporte/reporte_Pasivo.php\"><span>Reporte PDF</span></a></td>";

echo "</tr>";

    /* obtener array asociativo */
    while ($row = $result->fetch_assoc()) {

        echo "<tr>";
    echo "<td>".$row["id_cuenta"]."</td>";
    echo "<td>".$row["tipo_cuenta"]."</td>";
    echo "<td>".$row["nombre_cuenta"]."</td>";
    echo "<td>".$row["descripcion"]."</td>";
    echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"/Financiero/movimiento/agregar_med.php?id_ejercicio=".$_SESSION['id_ejercicio']."&id_cuenta=".$row["id_cuenta"]."\"><span>Elegir</span></a></td>";
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
   </center><div class="pie"><center><p>Hecho por danny^2 </p><center></div>



</body>
</html>
<?php 


/* cerrar la conexión */
$mysqli->close();

?>
<<!DOCTYPE html>
<html>
<head>
    <title>Sistema Financiero</title>
    <meta charset="utf-8" />
       <link rel="stylesheet" type="text/css" href="/Financiero/estilos/style.css">
     
       <link rel="stylesheet" media="screen" href="/Financiero/estilos/stilo.css" >
    
</head>
<body>


<!--   -en esta seccion estoy creando mi menu-->
     <center>  <nav>
    <ul>
        <li><a href="/Financiero/index2.php">Sistema contable</a></li>




<!--   Creacion de Menu principal-->
        <li><a href="/Financiero/ejercicio/medio.php">Ejercisio</a>
             
             <!--   Creacion de subMenu -->
            <ul>
                <li><a href="/Financiero/ejercicio/agregar_med.php">Editar Ejercisio</a></li>

                
            </ul><!--   Creacion de subMenu -->
        </li><!--  Termina Menu principal-->
        


<!--   Creacion de Menu principal-->
        <li><a href="#">Catalogo de cuentas</a>
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
        <li><a href="#"><img src="#"></a>
<!--   Creacion de subMenu -->
                <ul>
                <li><a href="#">Perfil</a></li>
                <li><a href="/Financiero/medios/medio.php">Usuarios</a></li>
                <li><a href="/Financiero/medios/salir.php">Salir</a></li>
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

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
 <br><br>
<form action="#" method="post">
   
    <input name='buscar'  type='text' maxlength='20'>
    <input name='submit' type='submit' value='Buscar'>
</form>
<?php 

$limit = 20;


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




 $query = "select distinct SQL_CALC_FOUND_ROWS * from ejercicio where ejercicio.nom_empresa like '%$var1%' LIMIT $offset, $limit"; 
 


//////////////////////////////////////////////////
 $queryTotal = "SELECT FOUND_ROWS() as total";

///////////////////////////////////////////////   
///////////////////////////////////







if ($result = $mysqli->query($query)) {
$result1 = $mysqli->query($queryTotal);
$rowTotal = $result1->fetch_assoc();
  $total = $rowTotal["total"];


echo "<table border='1' align='center'>";
echo "<tr bgcolor='#CCCCCC'>";
echo "<td><b>Id_ejercicio</b></td>";
echo "<td><b>Nombre empresa</b></td>";
echo "<td><b>Descripcion</b></td>";
echo "<td><b>RFC</b></td>";
echo "<td><b>Direccion</b></td>";
echo "<td><b>Telefono</b></td>";
echo "<td><b>Fecha</b></td>";

echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "<th class=\"action\"></th>";
echo "</tr>";

    /* obtener array asociativo */
    while ($row = $result->fetch_assoc()) {
        $id_ejercicio="";

        echo "<tr>";
    echo "<td>".$row["id_ejercicio"]."</td>";
    echo "<td>".$row["nom_empresa"]."</td>";
    echo "<td>".$row["descripcion"]."</td>";
    echo "<td>".$row["RFC"]."</td>";
    echo "<td>".$row["direccion"]."</td>";
    echo "<td>".$row["telefono"]."</td>";
    echo "<td>".$row["f_ejercicio"]."</td>";
    echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"/Financiero/movimiento/agregar_med.php?id_ejercicio=".$id_ejercicio."\"><span>Elegir</span></a></td>";
                echo "<td class=\"action\"><a  class=\"modalbox small-button modal\" href=\"agregar_med.php?id_ejercicio=".$id_ejercicio."\"><span>Editar</span></a></td>";
                echo "<td class=\"action\"><a class=\"modalbox small-button danger modal\" href=\"borrar_med.php?del=".$id_ejercicio."\"><span>Borrar</span></a></td>";
                echo "<td class=\"action\"><a class=\"modalbox small-button  modal\" href=\"agregar_med.php?insert=ok\"><span>Agregar Ejercisio</span></a></td></tr>";
            

    
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






</body>
</html>
<?php 


/* cerrar la conexión */
$mysqli->close();

?>
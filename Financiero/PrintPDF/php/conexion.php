<?php

$servidor = "localhost";
$usuario = "root";
$contra = "";

$conexion = mysql_connect( $servidor , $usuario , $contra ) or die ( "No hay conexion ");
$db = mysql_select_db( "conta2" ) or die ( "No hay conexion ");


?>

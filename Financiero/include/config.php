<?php
/*
$dbhost='localhost';
$dbusername='root';
$dbuserpass='dannyasd';
$dbname = 'registro';
*/
$dbhost='localhost';
$dbusername='root';
$dbuserpass='';
$dbname = 'conta2';

$con=mysql_connect($dbhost,$dbusername,$dbuserpass);
 if (!$con)
  die('Fallo la conexion con el servidor Mysql'.mysql_error());
  $db=mysql_select_db($dbname, $con);
  if(!$db)
  die('Fallo al selecionar la base de datos '.mysql_error());
    mysql_query("SET NAMES 'utf8'");

?>

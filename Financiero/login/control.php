  <?php
session_start();



  ?>


  <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>
 <?php
$login= $_POST['login'];
$contrasena= $_POST['contrasena'];
$_SESSION ['login']= $_POST['login'];
// mysqli
$mysqli = new mysqli("localhost", "root", "", "conta2");
/* check connection */
if (mysqli_connect_errno()) {
    echo "<li>Coneccion Fallida!! : %s\n", mysqli_connect_error();
    exit();
}


echo $query1="SELECT * FROM usuarios where login='$login' and contrasena='$contrasena'";
$resultado = $mysqli->query($query1) or die ($mysqli->error);



//for($set = array(); $row = $resultado->fetch_assoc(); $set[] = $row);
//echo $set;

$fila=$resultado->fetch_assoc();
$filas = $resultado->num_rows;
//echo $filas;

//echo $filas;


if ($filas==1){

if ($fila['id_tipo_usuario']=='Gerente') {
	$_SESSION["autentificacion"]=true;
	$_SESSION["nombre"]=$filas['login'];
	$_SESSION ['id_tipo_usuario']= $fila['id_tipo_usuario'];
	header("location: /Financiero/index.php");

} 
if ($fila['id_tipo_usuario']=="Contador") {
	$_SESSION["autentificacion"]=true;
	$_SESSION["nombre"]=$filas['login'];
	header("location: /Financiero/index.php");
}

}	
	
else {
	header("location: /Financiero/login/login.php?error=verdadero1");
}

?>
 </body>

 </html>


  
<!DOCTYPE html>
<html>
<head>
	<title>Biblioteca Benito Juárez</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<h1>Impresiones</h1>


<?php
//conexion a la base de datos
mysql_connect("dannyasdcom.ipagemysql.com", "dannyasd", "dannyasd") or die(mysql_error()) ;
mysql_select_db("impresiones") or die(mysql_error()) ;


$nombreCompleto=$_POST["nombreC"];
 $nombreCompleto;

$matricula=$_POST["matricula"];
 $matricula;

$paginas=$_POST["pag"];
 $paginas;

$pago=$paginas*.50;
 $pago;

$escuela=$_POST["tipo_escuela"];
 $escuela;

$descripcion=$_POST["comment"];
 $descripcion;




?>


<?php 

 $_FILES['imagen']['name']; //este es el nombre del archivo que acabas de subir
$_FILES['imagen']['type']; //este es el tipo de archivo que acabas de subir
$_FILES['imagen']['tmp_name'];//este es donde esta almacenado el archivo que acabas de subir.
$_FILES['imagen']['size']; //este es el tamaño en bytes que tiene el archivo que acabas de subir.
 $_FILES['imagen']['error']; //este almacena el codigo de error que resultaría en la subida.
//imagen es el nombre del input tipo file del formulario. 


//comprobamos si ha ocurrido un error.
if ($_FILES["imagen"]["error"] > 0){
?>	
	<script>

    alert("Necesitas seleccionar un Archivo");

</script>


<?php
//header("location: index.html");	
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "audio/x-ms-wma","image/gif","video/mp4","video/avi", "audio/mp3","image/png","application/pdf","application/msword","application/vnd.openxmlformats-officedocument.wordprocessingml.document","application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
	$limite_kb = 29903778555;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		if (!file_exists($ruta)){
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			 $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				echo "el archivo ha sido movido exitosamente";
				//echo $nombre = $_FILES['imagen']['name'];
				//echo $tipo_dato = $_FILES['imagen']['type'];
				//insertamos/guardamos el nombre de la imagen en la tabla.
				$mysql=mysql_query("INSERT INTO `print`(`matricula`,`nombreC`,`paginas`,`pago`,`nombre`,`descripcion`,`tipo_escuela`,`tipo_dato`) VALUES ('$matricula','$nombreCompleto','$paginas','$pago','$nombre','$descripcion','$escuela','$tipo_dato')");
				//echo $mysql;

				header('location: index.php?paginas=$paginas');
			} else {
				echo "ocurrio un error al mover el archivo.";
			}
		} else {
			echo $_FILES['imagen']['name'] . ", este archivo existe";

		}
	} else {
		echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes";
	}
}



?>

<?PHP 
session_start();

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias
$concepto= $_POST['concepto'];
$descripcion= $_POST['descripcion'];
$id_ejer=$_SESSION['id_ejercicio'];
$id2= $_POST['id_ejercicio'];
$id_movi=$_POST['id_movimiento'];

if ($_POST["id_ejercicio"]&&$_POST['id_movimiento'])
	{
	
		
		
		 $query = "UPDATE `conta2`.`movimiento` SET `concepto`='".$concepto."' WHERE `movimiento`.`id_ejercicio`='$id2' and id_movimiento= $id_movi";

		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_ejercicio'];
		header("Location: medio.php");
	
	}

	if ($_POST["del"])
		{
			echo $query = "DELETE  from `conta2`.`movimiento` WHERE `movimiento`.`id_movimiento`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: medio.php");
		
		}
		
		


if ($_POST["insert"])
		{
			
		echo $query = "insert into `movimiento`  values('', '".$_POST["concepto"]."', '".$_POST["t_cuenta"]."', '".$_POST["debe"]."','".$_POST["haber"]."','".$id_ejer."','".$_POST["f_movimiento"]."')";
	  
						
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: 	medio.php");
		
	
		
	}
		  echo $query1="SELECT * FROM materia where nombre='$nombre' and descripcion='$descripcion'";
$resultado = $mysqli->query($query1) or die ($mysqli->error);
		
		$fila=$resultado->fetch_assoc();
		echo fila;
	
?>

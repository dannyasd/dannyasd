	
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias

$id= $_POST['id_materia'];
$id2= $_POST['id_medi'];
$n_cuenta=$_POST['nombre_cuenta'];
$id_cuent=$_POST['id_cuenta'];


if ($_POST["id_cuenta"])
	
	{
	
		
		 echo $query = "UPDATE `cuenta` SET `nombre_cuenta`='".$n_cuenta."' WHERE `cuenta`.`id_cuenta`='".$id_cuent."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_cuenta'];
		header("Location: medio.php");
	
	}

	if ($_POST["del"])
		{
			 $query = "DELETE  from `conta2`.`cuenta` WHERE `cuenta`.`id_cuenta`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: medio.php");
		
		}
		
		if ($_POST["insert"])
		{
			echo $query = "insert into `cuenta`  values('', '".$_POST["tipo_cuenta"]."', '".$_POST["nombre_cuenta"]."', '".$_POST["descripcion"]."')";
			
			
			
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: 	medio.php");
		
		
	//	echo $query = "insert into `examenes`.`materia`  values('', '".$_POST["Nombre"]."', '".$_POST["a_paterno"]."',  '".$_POST["a_materno"]."', ".$_POST["f_nac"].", '".$_POST["edad"]."', '".$_POST["telefono"]."', '".$_POST["escuela"]."')";
	//	$result = mysql_query($query) or die(mysql_error());
		//row1 = mysql_fetch_array($result);
		//header("Location: 	medio.php");
		
	}
		  
		
?>

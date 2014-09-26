	
<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias

$id= $_POST['id_materia'];
$id2= $_POST['id_medi'];

$nom_emp= $_POST['nom_empresa'];
$descripcion= $_POST['descripcion'];

if ($_POST["id_medi"])
	
	{
	
		
		 echo $query = "UPDATE `ejercicio` SET `nom_empresa`='".$nom_emp."' WHERE `ejercicio`.`id_ejercicio`='".$id2."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_ejercicio'];
		header("Location: medio.php");
	
	}

	if ($_POST["del"])
		{
			 $query = "DELETE  from `conta2`.`ejercicio` WHERE `ejercicio`.`id_ejercicio`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: medio.php");
		
		}
		
		if ($_POST["insert"])
		{
			echo $query = "insert into `ejercicio`  values('', '".$_POST["nom_empresa"]."', '".$_POST["descripcion"]."', '".$_POST["RFC"]."', '".$_POST["direccion"]."', '".$_POST["telefono"]."', '".$_POST["f_ejercicio"]."')";
			
			
			
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: 	medio.php");
		
		
	//	echo $query = "insert into `examenes`.`materia`  values('', '".$_POST["Nombre"]."', '".$_POST["a_paterno"]."',  '".$_POST["a_materno"]."', ".$_POST["f_nac"].", '".$_POST["edad"]."', '".$_POST["telefono"]."', '".$_POST["escuela"]."')";
	//	$result = mysql_query($query) or die(mysql_error());
		//row1 = mysql_fetch_array($result);
		//header("Location: 	medio.php");
		
	}
		  
		
?>


<?PHP 

//obtener configuracion de la base de datos
$nivel_dir="../";
include ($nivel_dir.'include/config.php');
//variables necesarias

$nom=$_POST['nombre'];
$id_usua=$_POST['id_usuario'];

if ($_POST["id_usuario"])
	{
	
		
		$query = "UPDATE `usuarios` SET `nombre`='".$nom."' WHERE `usuarios`.`id_usuario`='".$id_usua."'";
		
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		$id_esc=$row['id_usuario'];
		header("Location: medio.php");
	
	}

	if ($_POST["del"])
		{
			echo $query = "DELETE  from `conta2`.`usuarios` WHERE `usuarios`.`id_usuario`='".$_POST["del"]."' ";
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: medio.php");
		
		}
		
		if ($_POST["insert"])
		{
			echo $query = "insert into `conta2`.`usuarios`  values('', '".$_POST["nombre"]."', '".$_POST["login"]."',  '".$_POST["contrasena"]."', '".$_POST["email"]."', '".$_POST["id_tipo_usuario"]."')";
			
			
			
		$result = mysql_query($query) or die(mysql_error());
		$row1 = mysql_fetch_array($result);
		header("Location: 	medio.php");
		
		
	//	echo $query = "insert into `biblioteca`.`usuario`  values('', '".$_POST["Nombre"]."', '".$_POST["a_paterno"]."',  '".$_POST["a_materno"]."', ".$_POST["f_nac"].", '".$_POST["edad"]."', '".$_POST["telefono"]."', '".$_POST["escuela"]."')";
	//	$result = mysql_query($query) or die(mysql_error());
		//row1 = mysql_fetch_array($result);
		//header("Location: 	medio.php");
		
		
		
		}
		
		
		
		
?>

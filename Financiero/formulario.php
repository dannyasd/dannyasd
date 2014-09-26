
<?php
$id= "danny";

?>
<<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" media="screen" href="stilo.css" >
</head>
<body>




<form class="contact_form" action="formulario.php" method="GET">
<fieldset>
	<legend>formulatio</legend>
	<ul>
		<li>
			<h2>formulario</h2>

		</li>
		<li>
			<label for="name">nombre:</label>
			<input type="text" name="name" placeholder="pon  tu name" id="name" required>
		</li>
		<li>
			<label for="peso">Dame tu peso:</label>
			<input type="text" name="peso" placeholder="pon tu peso" id="peso"required>
		</li>
		<li>
			<label for="altura">Dame tu altura:</label>
			<input type="text" name="altura" placeholder="pon  tu altura" id="altura" required>
		</li>

<li>
			<label for="edad">Dame tu edad:</label>
			<input type="text" name="edad" placeholder="pon  tu edad" id="edad" required>
		</li>

		<li>
			
			<label for="sexo">Dame tu tu sexo:</label>
			<select required>			
		<option value="mas">Masculino</option>
   <option value="feme">femenino</option>
   </select>
  

			
		<input type="hidden" name="ident" value="<?php echo $id;?>" />
		</li>

		<button class="button" type="submit">Enviar</button>
	</ul>

</fieldset>
</form>
<?php
 print_r($_GET);



	echo"tu nombre es".$_GET["name"];


?>

<?php
//echo $_GET["name"]; 
$nombre= $_GET['name'];
$peso= $_GET['peso'];
$altura= $_GET['altura'];



echo "<br>Bienvenido " .$nombre. " Gracias por visitar mi pagina en ella sacaremos tu indice de masa corporal";
echo "<br>Tu peso es: ".$peso;
echo "<br>Tu altura es de :" .$altura;
echo "<br>para sacar tu IMC la formula es peso/(altura*altura)";
$imc=$peso/($altura*$altura);
echo "Tu IMC es de : " .$imc;

if ($imc<=18) {
	echo "<br><li>Tienes desnutricion come mas frutas verduras y leguminosas, un poco de carne y lacteos</li>";
}else
{
if ($imc<=26) {
	echo "<br><li>Felicidades tu pero es normal, come frutas y verduras</li>";
}

}
if ($imc>26) {
	echo "<br><li>Tienes sobre peso cuidado, te recomiendo una dieta y consta en comer frutas y verduras, deja los lacteos, arinas y carnes</li>";
}




?>


</body>
</html>
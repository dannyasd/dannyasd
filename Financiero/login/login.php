
<?php
if(isset($_POST['login'])){
echo"Se ha enviado con exito su Formulario";
}
else {
?>
<!DOCTYPE html>
 <html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Dark Login Form</title>
  <link rel="stylesheet" href="css/style.css">
 
</head>
<body>
  <form method="post" action="/Financiero/login/control.php" class="login">
     <p>Control de Acceso</p>
     <?php
if (isset($_GET['error']) && $_GET['error']=="verdadero"){
    echo "AUTENTIFICATE POR FAVOR";
}
        ?>

    <p>
      <label for="login">Usuario:</label>
      <input type="text" name="login" id="login" placeholder="Patitofeo">
    </p>

    <p>
      <label for="contrasena">Password:</label>
      <input type="password" name="contrasena" id="contrasena" placeholder="*********">
    </p>

    <p class="login-submit">
      <button type="submit" class="login-button">Login</button>
    </p>

    <p class="forgot-password"><a href="">Registrate</a></p>
  </form>
<?php }
?>
  
</body>
</html>

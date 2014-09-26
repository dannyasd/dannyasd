
<?php

session_start();
session_destroy();
header("location: /Financiero/login/login.php?error=verdadero");

?>
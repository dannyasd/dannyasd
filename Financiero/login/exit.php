<?php
session_start();

 session_destroy();
  $_SESSION["login"];
?>
<?php
if (isset($_SESSION["login"])) {
	# code...

	header("location: /contableCss/index.php");
}



?>
<?php
	 session_start();
     if (!session_is_registered('id_usuario'))
        session_unregister('id_usuario');
     session_start();
     session_destroy();
     header ('Location: ../index.php');
?>


<?php
 // Inicia o reanuda la sesión
 session_start();

 // Elimina todas las variables de sesión
 session_unset();

 // Destruye la sesión
 session_destroy();

 // Redirige al inicio de sesión
 header("Location:login.php");
?>
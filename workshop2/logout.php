<?php
session_start();

// Eliminar las variables de sesión
session_unset();

// Destruir la sesión
session_destroy();

// Volver al inicio de sesión
header("Location: login.php");
exit();
?>

<?php
session_start();

// Cerrar la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión u otra página deseada
header("Location: ./login.php");
exit();
?>
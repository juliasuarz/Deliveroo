<?php
session_start();
include_once("../conexion.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
    header('Location: ../login.php');
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/style.less"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Home</title>
</head>
<body>

<h1>Lista de Perfiles</h1>

<table id="perfilesTable">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Imagen</th>
            <th>Contraseña</th>
            <th>Teléfono</th>

        </tr>
    </thead>
    <tbody id="cuerpoTabla">
        <!-- Aquí se insertarán los datos del JSON -->
    </tbody>
</table>

<!-- Agrega los scripts de Bootstrap y otros aquí si es necesario -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="perfil.js"></script>

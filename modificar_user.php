<?php
// Establecer la conexión a la base de datos
include_once("./sql/conexion.php");
$pdo = conectar();

// Recuperar los datos del usuario desde la URL
$idUsuario = $_GET['id'];
$nombreUsuario = $_GET['nombre'];
$apellidosUsuario = $_GET['apellidos'];
$emailUsuario = $_GET['email'];
$tipoUsuario = $_GET['tipo'];
$telefonoUsuario = $_GET['telefono'];

// Consulta SQL para actualizar los datos del usuario
$sql = "UPDATE usuarios SET nombre_usu = :nombre, apellidos_usu = :apellidos, email_usu = :email, tipo_usu = :tipo, telf_usu = :telefono WHERE id_usu = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombreUsuario);
$stmt->bindParam(':apellidos', $apellidosUsuario);
$stmt->bindParam(':email', $emailUsuario);
$stmt->bindParam(':tipo', $tipoUsuario);
$stmt->bindParam(':telefono', $telefonoUsuario);
$stmt->bindParam(':id', $idUsuario);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Redirigir de vuelta a la página anterior o a donde desees
    header("Location: crud.php");
    exit();
} else {
    // Manejar cualquier error que pueda ocurrir durante la ejecución de la consulta
    echo "Error al actualizar los datos del usuario.";
}
?>
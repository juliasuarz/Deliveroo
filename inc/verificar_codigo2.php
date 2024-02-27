<?php
session_start();
require_once '../conexion.php';
$pdo = conectar();

// Recuperar los datos del formulario
$codigoAleatorio = $_POST['codigoAleatorio'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password1 = $_POST['password1'];
$contrasenaEncriptada = password_hash($password1, PASSWORD_BCRYPT); // Encriptar la contraseña
$telefono = $_POST['telefono'];

// Verificar si los códigos aleatorios coinciden
$codigoAleatorio1 = $_POST['codigoAleatorio'];
$codigoAleatorio2 = $_POST['codigo'];

if ($codigoAleatorio1 == $codigoAleatorio2) {
    // Los códigos aleatorios coinciden, ahora puedes realizar la inserción en la tabla de usuarios
    try {
        // Preparamos la consulta SQL para insertar los datos en la tabla usuarios
        $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usu, apellidos_usu, email_usu, tipo_usu, pwd_usu, telf_usu) VALUES (:nombre, :apellidos, :email, :tipo, :pwd, :telefono)");

        // Bind parameters
        $stmt->bindParam(':nombre', $_POST['nombre']);
        $stmt->bindParam(':apellidos', $_POST['apellido']);
        $stmt->bindParam(':email', $_POST['email']);
        // Aquí deberías establecer el tipo de usuario según tu lógica de negocio
        $stmt->bindValue(':tipo', 'Estandar');
        $stmt->bindParam(':pwd', $contrasenaEncriptada); // Pasamos la contraseña encriptada
        $stmt->bindParam(':telefono', $_POST['telefono']);

        // Ejecutamos la consulta
        $stmt->execute();

        // Mostrar un mensaje de éxito
        header("Location: codigo_correcto.php");
    } catch (PDOException $e) {
        // En caso de error, mostrar un mensaje de error
        echo "Error al insertar en la base de datos: " . $e->getMessage();
    }
} else {
    // Los códigos aleatorios no coinciden, mostrar un mensaje de error
    echo "Los códigos aleatorios no coinciden.";
}
?>

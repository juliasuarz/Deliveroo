<?php
session_start();

// Incluir el archivo de conexión
include_once("../sql/conexion.php");

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])) {
    header('Location: ../inc/singup.php'); // Redirige a la página de inicio de sesión
    exit();
}

error_reporting(E_ALL);
ini_set('display_errors', '1');

// Obtener el id del usuario de la sesión
$id_usuario = $_SESSION['id_user'];

// Obtener la conexión PDO
$pdo = conectar(); // Aquí ya debería estar definida la función conectar() del archivo de conexión

try {
    // Obtener el perfil del usuario actual desde la base de datos
    $sql = "SELECT * FROM usuarios WHERE id_usu = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_usuario]);
    $perfil = $stmt->fetch(PDO::FETCH_ASSOC);

    // Devolver el perfil como JSON
    echo json_encode([$perfil]); // Devolver como un array para que sea compatible con la función JavaScript que espera un array de perfiles
} catch (PDOException $e) {
    // Manejar la excepción
    echo json_encode(array('error' => 'Error al obtener el perfil del usuario: ' . $e->getMessage()));
}
?>

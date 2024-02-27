<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header('Location: ./singup.php');
    exit();
}

// Verificar si se han recibido los datos del formulario
if (!isset($_POST['id_usu']) || !isset($_POST['pwd'])) {
    echo json_encode(array('error' => 'No se recibieron todos los datos del formulario.'));
    exit();
}

// Obtener los datos del formulario
$id_usu = $_POST['id_usu'];
$pwd = $_POST['pwd'];

// Incluir el archivo de conexión
include_once("../sql/conexion.php");

try {
    // Obtener la conexión PDO
    $pdo = conectar(); // Aquí ya debería estar definida la función conectar() del archivo de conexión

    // Hash de la contraseña
    $hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

    // Preparar la consulta SQL para actualizar la contraseña del usuario
    $sql = "UPDATE usuarios SET pwd_usu = ? WHERE id_usu = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$hashed_pwd, $id_usu]);

    // Verificar si se actualizó la contraseña correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('success' => 'Contraseña actualizada correctamente.'));
    } else {
        echo json_encode(array('error' => 'No se pudo actualizar la contraseña.'));
    }
} catch (PDOException $e) {
    // Manejar la excepción
    echo json_encode(array('error' => 'Error al actualizar la contraseña: ' . $e->getMessage()));
}
?>

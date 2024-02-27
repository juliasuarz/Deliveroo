<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header('Location: ../inc/singup.php');
    exit();
}

// Verificar si se ha recibido el id_usu
if (!isset($_POST['id_usu'])) {
    echo json_encode(array('error' => 'No se recibió el id_usu.'));
    exit();
}

// Obtener el id_usu a eliminar
$id_usuario_a_eliminar = $_POST['id_usu'];

// Incluir el archivo de conexión
include_once("../sql/conexion.php");

try {
    // Obtener la conexión PDO
    $pdo = conectar(); // Aquí ya debería estar definida la función conectar() del archivo de conexión

    // Preparar la consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id_usu = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id_usuario_a_eliminar]);

    // Verificar si se eliminó el usuario correctamente
    if ($stmt->rowCount() > 0) {
        // Cerrar la sesión
        session_destroy();
        
        // Redirigir al usuario al formulario de inicio de sesión
        header('Location: ../inc/singup.php');
        exit();
    } else {
        echo json_encode(array('error' => 'No se pudo eliminar el usuario.'));
    }
} catch (PDOException $e) {
    // Manejar la excepción
    echo json_encode(array('error' => 'Error al eliminar el usuario: ' . $e->getMessage()));
}
?>

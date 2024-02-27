<?php
session_start();

// Comprobar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header('Location: ./singup.php');
    exit();
}

// Verificar si se han recibido los datos del formulario
if (!isset($_POST['id_usu']) || !isset($_POST['nombre_usu']) || !isset($_POST['apellidos_usu'])) {
    echo json_encode(array('error' => 'No se recibieron todos los datos del formulario.'));
    exit();
}

// Obtener los datos del formulario
$id_usu = $_POST['id_usu'];
$nombre_usu = $_POST['nombre_usu'];
$apellidos_usu = $_POST['apellidos_usu'];

// Incluir el archivo de conexión
include_once("../sql/conexion.php");

try {
    // Obtener la conexión PDO
    $pdo = conectar(); // Aquí ya debería estar definida la función conectar() del archivo de conexión

    // Preparar la consulta SQL para actualizar solo el nombre y el apellido del usuario
    $sql = "UPDATE usuarios SET nombre_usu = ?, apellidos_usu = ? WHERE id_usu = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$nombre_usu, $apellidos_usu, $id_usu]);

    // Verificar si se actualizó el usuario correctamente
    if ($stmt->rowCount() > 0) {
        echo json_encode(array('success' => 'Nombre y apellidos actualizados correctamente.'));
    } else {
        echo json_encode(array('error' => 'No se pudo actualizar los datos del usuario.'));
    }
} catch (PDOException $e) {
    // Manejar la excepción
    echo json_encode(array('error' => 'Error al actualizar los datos del usuario: ' . $e->getMessage()));
}
?>

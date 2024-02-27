<?php
// Verificar si se recibió un ID de usuario para eliminar
if(isset($_GET['id'])){
    // Obtener el ID del usuario
    $id_usuario = $_GET['id'];

    // Conexión a la base de datos
    include_once("./sql/conexion.php");
    $pdo = conectar();

    // Consulta SQL para eliminar el usuario
    $sql = "DELETE FROM usuarios WHERE id_usu = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_usuario, PDO::PARAM_INT);

    // Ejecutar la consulta
    if($stmt->execute()){
        // Eliminación exitosa, redirigir a CRUD.php
        header("Location: crud.php");
        exit();
    } else {
        // Error al eliminar, mostrar mensaje de error
        echo "Error al eliminar el usuario.";
    }
} else {
    // No se proporcionó un ID de usuario válido, redirigir a CRUD.php
    header("Location: crud.php");
    exit();
}
?>
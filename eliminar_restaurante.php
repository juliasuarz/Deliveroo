<?php
// Verificar si se recibió un ID de restaurante para eliminar
if(isset($_GET['id'])){
    // Obtener el ID del restaurante
    $id_restaurante = $_GET['id'];

    // Conexión a la base de datos
    include_once("./sql/conexion.php");
    $pdo = conectar();

    // Consulta SQL para eliminar el restaurante
    $sql = "DELETE FROM restaurantes WHERE id_rest = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_restaurante, PDO::PARAM_INT);

    // Ejecutar la consulta
    if($stmt->execute()){
        // Eliminación exitosa, redirigir a CRUD.php
        header("Location: crud.php");
        exit();
    } else {
        // Error al eliminar, mostrar mensaje de error
        echo "Error al eliminar el restaurante.";
    }
} else {
    // No se proporcionó un ID de restaurante válido, redirigir a CRUD.php
    header("Location: crud.php");
    exit();
}
?>
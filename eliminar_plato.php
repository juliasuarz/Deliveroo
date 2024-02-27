<?php
// Verificar si se recibió un ID de plato para eliminar
if(isset($_GET['id'])){
    // Obtener el ID del plato
    $idPlato = $_GET['id'];

    // Incluir el archivo de conexión a la base de datos
    include_once("./sql/conexion.php");
    $pdo = conectar();

    try {
        // Consulta SQL para eliminar el plato
        $sql = "DELETE FROM platos WHERE id_plato = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $idPlato, PDO::PARAM_INT);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a CRUD.php si la eliminación fue exitosa
        header("Location: crud.php");
        exit();
    } catch (PDOException $e) {
        // Mostrar mensaje de error en caso de fallo en la eliminación
        echo "Error al eliminar el plato: " . $e->getMessage();
    }
} else {
    // Redirigir a CRUD.php si no se proporcionó un ID de plato válido
    header("Location: crud.php");
    exit();
}
?>

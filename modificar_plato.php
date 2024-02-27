<?php
// Establecer la conexión a la base de datos
include_once("./sql/conexion.php");
$pdo = conectar();

// Recuperar los datos del plato desde la URL
$idPlato = $_GET['id'];
$nombrePlato = $_GET['nombre'];
$precioPlato = $_GET['precio'];
$idTipoPlato = $_GET['id_tipo'];
$idRestPlato = $_GET['id_rest'];

// Consulta SQL para actualizar los datos del plato
$sql = "UPDATE platos SET nombre_plato = :nombre, precio_plato = :precio, id_tipo_plato = :id_tipo, id_rest_plato = :id_rest WHERE id_plato = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombrePlato);
$stmt->bindParam(':precio', $precioPlato);
$stmt->bindParam(':id_tipo', $idTipoPlato);
$stmt->bindParam(':id_rest', $idRestPlato);
$stmt->bindParam(':id', $idPlato);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Redirigir de vuelta a la página anterior o a donde desees
    header("Location: crud.php");
    exit();
} else {
    // Manejar cualquier error que pueda ocurrir durante la ejecución de la consulta
    echo "Error al actualizar los datos del plato.";
}
?>

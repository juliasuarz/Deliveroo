<?php
// Establecer la conexión a la base de datos
include_once("./sql/conexion.php");
$pdo = conectar();

// Recuperar los datos del restaurante desde la URL
$idRestaurante = $_GET['id'];
$nombreRestaurante = $_GET['nombre'];
$descripcionRestaurante = $_GET['descripcion'];
$tiempoRestaurante = $_GET['tiempo'];
$descuentoRestaurante = $_GET['descuento'];
$gastadoRestaurante = !empty($_GET['gastado']) ? $_GET['gastado'] : null; // Convertir a NULL si está vacío
$precioEnvioRestaurante = !empty($_GET['precio-envio']) ? $_GET['precio-envio'] : null; // Convertir a NULL si está vacío

// Consulta SQL para actualizar los datos del restaurante
$sql = "UPDATE restaurantes SET nombre_rest = :nombre, descripcion_rest = :descripcion, tiempo_rest = :tiempo, descuento_rest = :descuento, gastado_rest = :gastado, precio_envio_rest = :precioEnvio WHERE id_rest = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombreRestaurante);
$stmt->bindParam(':descripcion', $descripcionRestaurante);
$stmt->bindParam(':tiempo', $tiempoRestaurante);
$stmt->bindParam(':descuento', $descuentoRestaurante);
$stmt->bindParam(':gastado', $gastadoRestaurante, PDO::PARAM_NULL); // Especificar que es un parámetro NULL
$stmt->bindParam(':precioEnvio', $precioEnvioRestaurante, PDO::PARAM_NULL); // Especificar que es un parámetro NULL
$stmt->bindParam(':id', $idRestaurante);

// Ejecutar la consulta
if ($stmt->execute()) {
    // Redirigir de vuelta a la página anterior o a donde desees
    header("Location: crud.php");
    exit();
} else {
    // Manejar cualquier error que pueda ocurrir durante la ejecución de la consulta
    echo "Error al actualizar los datos del restaurante.";
}
?>
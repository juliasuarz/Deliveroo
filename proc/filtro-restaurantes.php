<?php 
include_once("../conexion.php");

$sql = 'SELECT * FROM tipo_comida;';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
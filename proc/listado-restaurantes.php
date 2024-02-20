<?php 
include_once("../conexion.php");
$tipo = $_POST["tipo"];

$sql = 'SELECT * FROM restaurantes INNER JOIN tipo_comida ON id_rest = id_tipo WHERE id_tipo LIKE :tipo;';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':tipo', $tipo);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
<?php 
include_once("../sql/conexion.php");
$pdo = conectar();

if(!empty($_POST["restauranteId"])) {
    $id_rest = $_POST["restauranteId"];
}

$sql = 'SELECT * FROM restaurantes WHERE id_rest = :id_rest;';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_rest', $id_rest);
$stmt->execute();
$resultado = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($resultado);
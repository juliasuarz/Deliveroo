<?php 
include_once("../conexion.php");

if(!empty($_POST["restauranteId"])) {
    $id_rest = $_POST["restauranteId"];
}

$sql = 'SELECT DISTINCT nombre_tipo FROM restaurantes INNER JOIN tipo_comida ON id_rest = id_tipo LEFT JOIN platos ON id_rest = id_rest_plato WHERE id_rest = :id_rest;';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_rest', $id_rest);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
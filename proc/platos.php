<?php 
include_once("../sql/conexion.php");
$pdo = conectar();

if(!empty($_POST["restauranteId"])) {
    $id_rest = $_POST["restauranteId"];
}

$sql = 'SELECT * FROM restaurantes INNER JOIN platos ON id_rest = id_rest_plato INNER JOIN tipo_comida ON id_tipo = id_tipo_plato WHERE id_rest = :id_rest ORDER BY id_tipo;';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id_rest', $id_rest);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
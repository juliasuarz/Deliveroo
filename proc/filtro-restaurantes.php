<?php 

$sql = 'SELECT * FROM tbl_restaurantes;';
$stmt = $pdo->prepare($sql);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
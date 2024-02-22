<?php 
include_once("../conexion.php");
$tipo = $_POST["tipo"];
$precio = $_POST["precio"];

$sql = 'SELECT * FROM restaurantes INNER JOIN tipo_comida ON id_rest = id_tipo WHERE id_tipo LIKE :tipo;';
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':tipo', $tipo);
$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $restaurante) {
    $idRest = $restaurante['id_rest'];

    $sqlPlatos = 'SELECT * FROM platos WHERE id_restaurante = :idRest';
    $stmtPlatos = $pdo->prepare($sqlPlatos);
    $stmtPlatos->bindParam(':idRest', $idRest);
    $stmtPlatos->execute();
    $platos = $stmtPlatos->fetchAll(PDO::FETCH_ASSOC);

    $precios = array_column($platos, 'precio');
    $mediaPrecios = count($precios) > 0 ? array_sum($precios) / count($precios) : 0;

    // $restaurante['platos'] = $platos;
    // $restaurantesConPlatos[] = $restaurante;

    if($mediaPrecios > 0 && $precio == 1) {
        $resultadoFinal[] = $restaurante;
    }
}

echo json_encode($resultadoFinal);
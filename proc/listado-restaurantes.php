<?php 
include_once("../conexion.php");

if(!empty($_POST["tipo_comida_selec"])) {
    $tipos = $_POST["tipo_comida_selec"];
} else {
    $tipos = "%";
}

if (!is_array($tipos)) {
    $tipos = array($tipos);
}

// $precio = $_POST["precio"];

$sql = 'SELECT DISTINCT restaurantes.* FROM restaurantes LEFT JOIN platos ON id_rest = id_rest_plato INNER JOIN tipo_comida ON id_tipo = id_tipo_plato WHERE id_rest LIKE "%"';

foreach ($tipos as $i => $tipo) {
    $paramName = ":tipo" . $i;
    $sql .= ' AND id_tipo LIKE ' . $paramName;
}

$stmt = $pdo->prepare($sql);

foreach ($tipos as $i => $tipo) {
    $paramName = ":tipo" . $i;
    $stmt->bindParam($paramName, $tipo);
}

$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// foreach ($resultado as $restaurante) {
//     $idRest = $restaurante['id_rest'];

//     $sqlPlatos = 'SELECT * FROM platos WHERE id_restaurante = :idRest';
//     $stmtPlatos = $pdo->prepare($sqlPlatos);
//     $stmtPlatos->bindParam(':idRest', $idRest);
//     $stmtPlatos->execute();
//     $platos = $stmtPlatos->fetchAll(PDO::FETCH_ASSOC);

//     $precios = array_column($platos, 'precio');
//     $mediaPrecios = count($precios) > 0 ? array_sum($precios) / count($precios) : 0;

//     // $restaurante['platos'] = $platos;
//     // $restaurantesConPlatos[] = $restaurante;

//     if($mediaPrecios > 0 && $precio == 1) {
//         $resultadoFinal[] = $restaurante;
//     }
// }

echo json_encode($resultado);
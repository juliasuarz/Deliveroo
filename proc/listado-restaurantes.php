<?php 
include_once("../conexion.php");

if(!empty($_POST["tipo_comida_selec"])) {
    $tipos = $_POST["tipo_comida_selec"];
    $filtrotipo = true;
} else {
    $tipos = "%";
    $filtrotipo = false;
}

if(!empty($_POST["precio_selec"])) {
    $precio_selec = $_POST["precio_selec"];
    $filtroprecio = true;
} else {
    $filtroprecio = false;
}

if (!is_array($tipos)) {
    $tipos = array($tipos);
}

// $precio = $_POST["precio"];

$sql = 'SELECT DISTINCT restaurantes.* FROM restaurantes LEFT JOIN platos ON id_rest = id_rest_plato LEFT JOIN tipo_comida ON id_tipo = id_tipo_plato WHERE id_rest LIKE "%"';
if($filtrotipo) {
    foreach ($tipos as $i => $tipo) {
        $paramName = ":tipo" . $i;
        $sql .= ' AND id_tipo LIKE ' . $paramName;
    }
}

$stmt = $pdo->prepare($sql);

if($filtrotipo) {
    foreach ($tipos as $i => $tipo) {
        $paramName = ":tipo" . $i;
        $stmt->bindParam($paramName, $tipo);
    }
}

if ($filtroprecio) {
    $sql .= ' HAVING AVG(platos.precio) > :precio_selec';
}

$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

// $resultadoFinal = array();

// foreach ($resultado as $restaurante) {
//     $idRest = $restaurante['id_rest'];

//     // Obtener platos del restaurante
//     $sqlPlatos = 'SELECT * FROM platos WHERE id_rest_plato = :idRest';
//     $stmtPlatos = $pdo->prepare($sqlPlatos);
//     $stmtPlatos->bindParam(':idRest', $idRest);
//     $stmtPlatos->execute();
//     $platos = $stmtPlatos->fetchAll(PDO::FETCH_ASSOC);

//     // Calcular la media de precios
//     $mediaPrecios = 0;

//     if (!empty($platos)) {
//         $precios = array_column($platos, 'precio_plato');
//         $mediaPrecios = array_sum($precios) / count($precios);
//     }

//     // Agregar el precio medio al array del restaurante
//     $restaurante['precio_medio'] = $mediaPrecios;

//     // Agregar el restaurante al resultado final
//     $resultadoFinal[] = $restaurante;
// }

echo json_encode($resultado);
<?php 
include_once("../conexion.php");

if (!empty($_POST["tipo_comida_selec"])) {
    $tipos = $_POST["tipo_comida_selec"];
    $filtrotipo = true;
} else {
    $filtrotipo = false;
}

if (!empty($_POST["precio_selec"])) {
    $precio_selec = $_POST["precio_selec"];
    $filtroprecio = true;
} else {
    $filtroprecio = false;
}

if (!empty($_POST["valoracion_selec"])) {
    $valoracion_selec = $_POST["valoracion_selec"];
    $filtrovaloracion = true;
} else {
    $filtrovaloracion = false;
}

$sql = 'SELECT DISTINCT restaurantes.* FROM restaurantes 
        LEFT JOIN platos ON id_rest = id_rest_plato 
        LEFT JOIN tipo_comida ON id_tipo = id_tipo_plato 
        LEFT JOIN valoracion ON id_rest_val = id_rest  
        WHERE id_rest LIKE "%"';

if ($filtrotipo) {
    $sql .= ' AND id_tipo LIKE :tipo';
}

if ($filtroprecio || $filtrovaloracion) {
    $sql .= ' GROUP BY restaurantes.id_rest';
}

if ($filtroprecio) {
    list($precio_selec_min, $precio_selec_max) = explode(',', $precio_selec);
    $sql .= ' HAVING AVG(precio_plato) BETWEEN :precio_selec_min AND :precio_selec_max';
}

if ($filtrovaloracion) {
    list($valoracion_selec_min, $valoracion_selec_max) = explode(',', $valoracion_selec);
    $sql .= ' HAVING AVG(valoracion_plato) BETWEEN :valoracion_selec_min AND :valoracion_selec_max';
}

$stmt = $pdo->prepare($sql);

if ($filtrotipo) {
    // Puedes usar directamente el primer tipo si es un array
    $stmt->bindParam(':tipo', $tipos);
}

if ($filtroprecio) {
    $stmt->bindParam(':precio_selec_min', $precio_selec_min);
    $stmt->bindParam(':precio_selec_max', $precio_selec_max);
}

if ($filtrovaloracion) {
    $stmt->bindParam(':valoracion_selec_min', $valoracion_selec_min);
    $stmt->bindParam(':valoracion_selec_max', $valoracion_selec_max);
}

$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
?>
<?php 
include_once("../sql/conexion.php");
$pdo = conectar();

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
        LEFT JOIN valoracion ON id_rest_val = id_rest';

if ($filtrotipo) {
    $sql .= ' WHERE id_tipo LIKE :tipo';
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
    if ($filtroprecio) {
        $sql .= ' AND (SELECT AVG(num_val) FROM valoracion WHERE id_rest_val = restaurantes.id_rest) BETWEEN :valoracion_selec_min AND :valoracion_selec_max';
    } else {
        $sql .= ' HAVING AVG(num_val) BETWEEN :valoracion_selec_min AND :valoracion_selec_max';
    }
}

$stmt = $pdo->prepare($sql);

if ($filtrotipo) {
    $stmt->bindParam(':tipo', $tipos);
}

if ($filtroprecio) {
    $stmt->bindParam(':precio_selec_min', $precio_selec_min, PDO::PARAM_INT);
    $stmt->bindParam(':precio_selec_max', $precio_selec_max, PDO::PARAM_INT);
}

if ($filtrovaloracion) {
    $stmt->bindParam(':valoracion_selec_min', $valoracion_selec_min, PDO::PARAM_INT);
    $stmt->bindParam(':valoracion_selec_max', $valoracion_selec_max, PDO::PARAM_INT);
}

$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($resultado);
?>

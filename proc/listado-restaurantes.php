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

$sql = 'SELECT DISTINCT restaurantes.* FROM restaurantes LEFT JOIN platos ON id_rest = id_rest_plato LEFT JOIN tipo_comida ON id_tipo = id_tipo_plato WHERE id_rest LIKE "%"';
if($filtrotipo) {
    foreach ($tipos as $i => $tipo) {
        $paramName = ":tipo" . $i;
        $sql .= ' AND id_tipo LIKE ' . $paramName;
    }
}

if ($filtroprecio) {
    list($precio_selec_min, $precio_selec_max) = explode(',', $precio_selec);

    $sql .= ' HAVING AVG(precio_plato) > :precio_selec_min AND AVG(precio_plato) < :precio_selec_max';
}

$stmt = $pdo->prepare($sql);

if($filtrotipo) {
    foreach ($tipos as $i => $tipo) {
        $paramName = ":tipo" . $i;
        $stmt->bindParam($paramName, $tipo);
    }
}

if ($filtroprecio) {
    $stmt->bindParam(':precio_selec_min', $precio_selec_min);
    $stmt->bindParam(':precio_selec_max', $precio_selec_max);
}


$stmt->execute();
$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
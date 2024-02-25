<?php

if (isset($_POST)) {
    // Se recogen los campos del formulario
    $id_plato = $_POST['id_plato'];
    $nombre_plato = $_POST['nombre_plato'];
    $img_plato = $_POST['img_plato'];

    include_once("./sql/conexion.php");
    $pdo = conectar();
    $query = $pdo->prepare("INSERT INTO platos (id_plato, nombre_plato, img_plato) VALUES (:id_plato, :nombre, :img)");
    $query->bindParam(":id_plato", $id_plato);
    $query->bindParam(":nombre", $nombre_plato);
    $query->bindParam(":img", $img_plato);
    $query->execute();
    $pdo = null;
    echo "ok";
}
?>

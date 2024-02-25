<?php

if (isset($_POST)) {
    // Se recogen los campos del formulario
    $id_rest = $_POST['id_rest'];
    $nombre_rest = $_POST['nombre_rest'];
    $descripcion_rest = $_POST['descripcion_rest'];

    include_once("./sql/conexion.php");
    $pdo = conectar();
    $query = $pdo->prepare("INSERT INTO restaurantes (id_rest, nombre_rest, descripcion_rest) VALUES (:id_rest, :nombre, :descripcion)");
    $query->bindParam(":id_rest", $id_rest);
    $query->bindParam(":nombre", $nombre_rest);
    $query->bindParam(":descripcion", $descripcion_rest);
    $query->execute();
    $pdo = null;
    echo "ok";
}
?>

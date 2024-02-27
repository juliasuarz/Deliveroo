<?php

if (isset($_POST)) {
    // Se recogen los campos del formulario
    // $id_rest = $_POST['id_rest'];
    $nombre_rest = $_POST['nombre_rest'];
    $descripcion_rest = $_POST['descripcion_rest'];
    $tiempo_rest = $_POST['tiempo_rest'];
    $descuento_rest = $_POST['descuento_rest'];
    $gastado_rest = $_POST['gastado_rest'];
    $precio_envio_rest = $_POST['precio_envio_rest'];

    if(isset($_FILES['img_rest'])){
        $img_rest = $_FILES['img_rest']['name'];
        $ruta_destino = "./img" . $img_rest;
        // Se mueve el archivo subido a la ruta destino
        move_uploaded_file($_FILES['img_rest']['tmp_name'], $ruta_destino);
    }

    include_once("./sql/conexion.php");
    $pdo = conectar();
    $query = $pdo->prepare("INSERT INTO restaurantes(nombre_rest, descripcion_rest, tiempo_rest, descuento_rest, gastado_rest, precio_envio_rest, img_rest ) 
        VALUES (:nombre, :descripcion, :tiempo, :descuento, :gastado,:envio, :img )");
    // $query->bindParam(":id_rest", $id_rest);
    $query->bindParam(":nombre", $nombre_rest);
    $query->bindParam(":descripcion", $descripcion_rest);
    $query->bindParam(":gastado", $gastado_rest);
    $query->bindParam(":descuento", $descuento_rest);
    $query->bindParam(":tiempo", $tiempo_rest);
    $query->bindParam(":envio", $precio_envio_rest);
    $query->bindParam(":img", $img_rest);
    $query->execute();
    $pdo = null;
    echo "Restaurante registrado";
}
?>

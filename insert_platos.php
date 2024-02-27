<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se recogen los campos del formulario
    $nombre_plato = $_POST['nombre_plato'];
    $precio_plato = $_POST['precio_plato'];
    $id_tipo_plato = $_POST['id_tipo_plato'];
    // Se comprueba si se ha subido un archivo
    if(isset($_FILES['img_plato'])){
        $img_plato = $_FILES['img_plato']['name'];
        $ruta_destino = "./img" . $img_plato;
        // Se mueve el archivo subido a la ruta destino
        move_uploaded_file($_FILES['img_plato']['tmp_name'], $ruta_destino);
    }
    // $id_tipo_plato = $_POST['id_tipo_plato'];

    include_once("./sql/conexion.php");
    $pdo = conectar();
    $query = $pdo->prepare("INSERT INTO platos (nombre_plato, precio_plato, img_plato, id_tipo_plato) VALUES (:nombre, :precio, :img, :tipo_plato)");
    $query->bindParam(":nombre", $nombre_plato);
    $query->bindParam(":precio", $precio_plato);
    $query->bindParam(":img", $img_plato);
    $query->bindParam(":tipo_plato", $id_tipo_plato);
    $query->execute();
    $pdo = null;
    echo "ok";
}
?>

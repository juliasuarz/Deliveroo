<?php

function conectar() {
    $servidor = "mysql:host=localhost;dbname=deliveroo";
    $user = "root";
    $pass = "";

    try {
        $pdo = new PDO($servidor, $user, $pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Error en la conexión con la base de datos: " . $e->getMessage();
        die();
    }

    // Return the PDO connection
    return $pdo;
}

// Call the conectar() function to get the PDO instance
return conectar();
?>

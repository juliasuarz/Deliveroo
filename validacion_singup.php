<?php
session_start();

require_once 'conexion.php';
$pdo = conectar();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Creamos un array para almacenar los errores
    $errors = [];

    // Validación del nombre
    if (empty($_POST['nombre'])) {
        $errors['nombre'] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $_POST['nombre'])) {
        $errors['nombre'] = "El formato del nombre es incorrecto.";
    }

    // Validación del apellido
    if (empty($_POST['apellido'])) {
        $errors['apellido'] = "El apellido es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['apellido'])) {
        $errors['apellido'] = "El formato del apellido es incorrecto.";
    }

    // Validación del correo electrónico
    if (empty($_POST['email'])) {
        $errors['email'] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato del correo electrónico es incorrecto.";
    }

    // Validación del correo electrónico
    if (empty($_POST['email'])) {
        $errors['email'] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato del correo electrónico es incorrecto.";
    } else {
        // Verificar si el correo electrónico ya existe en la base de datos
        try {
            
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email_usu = :email");
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            
            $count = $stmt->fetchColumn();
            
            if ($count > 0) {
                // Guardar un indicador en la sesión
                $_SESSION['email_exists'] = true;
                header("Location: singup.php");
                exit(); // Terminar la ejecución del script
            }
        } catch (PDOException $e) {
            echo "Error al consultar la base de datos: " . $e->getMessage();
            die();
        }
    }

    // Validación de la contraseña
    if (empty($_POST['password1'])) {
        $errors['password1'] = "La contraseña es obligatoria.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST['password1'])) {
        $errors['password1'] = "El formato de la contraseña es incorrecto.";
    }

    // Validación de la confirmación de contraseña
    if (empty($_POST['password2'])) {
        $errors['password2'] = "La confirmación de contraseña es obligatoria.";
    } elseif ($_POST['password1'] !== $_POST['password2']) {
        $errors['password2'] = "Las contraseñas no coinciden.";
    }

    // Validación del teléfono
    if (empty($_POST['telefono'])) {
        $errors['telefono'] = "El teléfono es obligatorio.";
    } elseif (!ctype_digit($_POST['telefono']) || strlen($_POST['telefono']) !== 9) {
        $errors['telefono'] = "El formato del teléfono es incorrecto.";
    }

    // Validación del teléfono
    if (empty($_POST['telefono'])) {
        $errors['telefono'] = "El teléfono es obligatorio.";
    } elseif (!ctype_digit($_POST['telefono']) || strlen($_POST['telefono']) !== 9) {
        $errors['telefono'] = "El formato del teléfono es incorrecto.";
    }

    // Verificar si el teléfono ya existe en la base de datos
    try {
        require_once 'conexion.php';
        $pdo = conectar();
        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE telf_usu = :telefono");
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            // Guardar un indicador en la sesión
            $_SESSION['telefono_exists'] = true;
            header("Location: singup.php");
            exit(); // Terminar la ejecución del script
        }
    } catch (PDOException $e) {
        echo "Error al consultar la base de datos: " . $e->getMessage();
        die();
    }


    if (empty($errors)) {
        try {            

            // Preparamos la consulta SQL para insertar los datos en la tabla usuarios
            $stmt = $pdo->prepare("INSERT INTO usuarios (nombre_usu, apellidos_usu, email_usu, tipo_usu, pwd_usu, telf_usu) VALUES (:nombre, :apellidos, :email, :tipo, :pwd, :telefono)");

            // Bind parameters
            $stmt->bindParam(':nombre', $_POST['nombre']);
            $stmt->bindParam(':apellidos', $_POST['apellido']);
            $stmt->bindParam(':email', $_POST['email']);
            // Aquí deberías establecer el tipo de usuario según tu lógica de negocio
            $stmt->bindValue(':tipo', 'Estandar');
            $stmt->bindParam(':pwd', $_POST['password1']);
            $stmt->bindParam(':telefono', $_POST['telefono']);

            // Ejecutamos la consulta
            $stmt->execute();

            // Redireccionamos a la página de confirmación
            header("Location: singup.php");
            exit();
        } catch (PDOException $e) {
            // En caso de error al insertar en la base de datos, mostramos un mensaje de error
            echo "Error al insertar en la base de datos: " . $e->getMessage();
            die();
        }
    } else {
        // Si hay errores de validación, los guardamos en la sesión y redirigimos de vuelta al formulario
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = $_POST;
        header("Location: singup.php");
        exit();
    }
} else {
    // Si no se ha enviado el formulario, redireccionamos de vuelta al formulario
    header("Location: singup.php");
    exit();
}
?>

<?php
session_start();

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Creamos un array para almacenar los errores
    $errors = [];

    // Validación del correo electrónico
    if (empty($_POST['email'])) {
        $errors['email'] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato del correo electrónico es incorrecto.";
    }

    // Validación de la contraseña
    if (empty($_POST['password3'])) {
        $errors['password3'] = "La contraseña es obligatoria.";
    }

    // Si no hay errores, verificamos las credenciales
    if (empty($errors)) {
        // Incluir el archivo de conexión
        include_once "conexion.php";
        $conexion = conectar();

        // Escapamos los datos para evitar inyección SQL
        $email = $_POST['email'];
        $password = $_POST['password3'];

        // Consulta SQL para verificar las credenciales
        $consulta = "SELECT * FROM usuarios WHERE email_usu = :email AND pwd_usu = :password";
        $statement = $conexion->prepare($consulta);
        $statement->bindParam(':email', $email);
        $statement->bindParam(':password', $password);
        $statement->execute();
        $usuario = $statement->fetch(PDO::FETCH_ASSOC);

        // Verificamos si se encontró un usuario con las credenciales proporcionadas
        if ($usuario) {
            // Credenciales válidas, redireccionamos a la página de inicio
            header("Location: home.php");
            exit();
        } else {
            // Si las credenciales no son válidas, mostramos un mensaje de error y redirigimos de vuelta al formulario
            $errors['credenciales'] = "Las credenciales ingresadas son incorrectas.";
            $_SESSION['errors'] = $errors;
            header("Location: login.php");
            exit();
        }
    } else {
        // Si hay errores, los guardamos en la sesión y redirigimos de vuelta al formulario
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = $_POST;
        header("Location: login.php");
        exit();
    }
} else {
    // Si no se ha enviado el formulario, redireccionamos de vuelta al formulario
    header("Location: login.php");
    exit();
}
?>

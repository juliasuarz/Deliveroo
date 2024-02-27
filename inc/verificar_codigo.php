<?php
session_start();

$codigoAleatorio = $_POST['codigoAleatorio'];
$nombre = $_POST['nombre']; // Agrega esto para recuperar el nombre
$apellido = $_POST['apellido']; // Agrega esto para recuperar el apellido
$email = $_POST['email']; // Agrega esto para recuperar el email
$password1 = $_POST['password1']; // Agrega esto para recuperar la contraseña
$telefono = $_POST['telefono']; // Agrega esto para recuperar el teléfono

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Código</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="../style.less" rel="stylesheet">
</head>
<body class="region-verificar">
    <?php
    // Verificar si hay un indicador de correo electrónico existente en la sesión
    if (isset($_SESSION['incorrecto']) && $_SESSION['incorrecto']) {
        unset($_SESSION['incorrecto']); // Limpiar el indicador de la sesión

        // Mostrar SweetAlert
        ?>
        <script>
        Swal.fire("Error", "El codigo es incorrrecto.", "error");
        </script>
        <?php
    }
    ?>
    <h2 class="title">Verificar Código</h2>
    <form action="verificar_codigo2.php" method="post">
        <!-- Pasar el código aleatorio generado como campo oculto -->
        <input type="hidden" name="codigoAleatorio" value="<?php echo $codigoAleatorio; ?>">
        <!-- Agrega campos ocultos para los datos adicionales -->
        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
        <input type="hidden" name="apellido" value="<?php echo $apellido; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="password1" value="<?php echo $password1; ?>">
        <input type="hidden" name="telefono" value="<?php echo $telefono; ?>">
        
        <label for="codigo">Introduce el código de verificación:</label><br>
        <input type="text" id="codigo" name="codigo" class="text"><br>
        <input type="submit" value="Enviar" class="enviar">
    </form>

    <form action="validacion_singup.php" method="post">
        <!-- Agrega campos ocultos para los datos adicionales -->
        <input type="hidden" name="nombre" value="<?php echo $nombre; ?>">
        <input type="hidden" name="apellido" value="<?php echo $apellido; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        <input type="hidden" name="password1" value="<?php echo $password1; ?>">
        <input type="hidden" name="telefono" value="<?php echo $telefono; ?>">
        
        <label for="codigo">Volver a enviar codigo:</label><br>
        <input type="submit" value="Enviar">
    </form>
    
</body>
</html>

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
</head>
<body>
    <h2>Verificar Código</h2>
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
        <input type="text" id="codigo" name="codigo"><br>
        <input type="submit" value="Enviar">
        <?php echo $codigoAleatorio; ?>
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

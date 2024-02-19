<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="style.less" rel="stylesheet">
</head>
<body>
    
</body>
</html>

<div class="container-formulario">
    <h1>Crea una cuenta</h1><br>
    <div class="form-container">
        <div>
            <form action="validacion_login.php" method="post">
                
                <!-- Nombre -->
                <?php if (isset($_GET['nombreVacio'])) {echo "<div class='error-message'>Nombre vacío. Has de introducir un nombre válido.</div>"; } ?>

                <?php if (isset($_GET['nombreMal'])) {echo "<div class='error-message'>El formato del nombre es incorrecto.</div>"; } ?>

                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" id="nombre" value="<?php if(isset($_GET["nombre"])) {echo $_GET["nombre"];} ?>">

                <p id="errorNombre" class="mensaje-error"></p>

                <!-- Apellido -->
                <?php if (isset($_GET['apellidoVacio'])) {echo "<div class='error-message'>apellido vacío. Has de introducir un apellido válido.</div>"; } ?>

                <?php if (isset($_GET['apellidoMal'])) {echo "<div class='error-message'>Formato incorrecto de apellido. Solo puede contener letras y números.</div>"; } ?>

                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" id="apellido" placeholder="" value="<?php if(isset($_GET['apellido'])) {echo $_GET['apellido'];} ?>">
                
                <p id="errorApellido" class="mensaje-error"></p>

                <!-- telefono -->
                <?php if (isset($_GET['telefonoVacio'])) {echo "<div class='error-message'>telefono vacío. Has de introducir un telefono válido.</div>"; } ?>

                <?php if (isset($_GET['telefonoMal'])) {echo "<div class='error-message'>Formato incorrecto de telefono. Solo puede contener letras y números.</div>"; } ?>

                <label for="telefono">Numero de telefono</label>
                <input type="text" name="telefono" id="telefono" placeholder="" value="<?php if(isset($_GET['telefono'])) {echo $_GET['telefono'];} ?>">

                <!-- mensaje error si esta vacio -->
                <p id="errorVacioTelefono" class="mensaje-error"></p>
                <!-- mensaje error si el telf esta mal -->
                <p id="errorMalTelefono" class="mensaje-error"></p>

                <!-- Email -->
                <?php if (isset($_GET['emailVacio'])) {echo "<div class='error-message'>Email vacío. Has de introducir un email válido.</div>"; } ?>

                <?php if (isset($_GET['emailMal'])) {echo "<div class='error-message'>El formato del email es incorrecto</div>"; } ?>

                <?php if (isset($_GET['emailExistente'])) {echo "<div class='error-message'>El email ya existe.</div>"; } ?>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php if(isset($_GET["email"])) {echo $_GET["email"];} ?>">

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioMail" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalMail" class="mensaje-error"></p>

                <!-- Contraseña -->
                <?php if (isset($_GET['password1Vacio'])) {echo "<div class='error-message'>Contraseña vacía. Has de introducir una contraseña válida.</div>"; } ?>

                <?php if (isset($_GET['password1Mal'])) {echo "<div class='error-message'>El formato de la contraseña es incorrecto.</div>"; } ?>

                <label for="password1">Contraseña</label>
                <input type="password" name="password1" id="password1" value="<?php if(isset($_GET["password1"])) {echo $_GET["password1"];} ?>">
                <p id="password1" class="mensaje-error"></p>

                <!-- Contraseña2 -->
                <label for="password2">Contraseña2</label>
                <input type="password" name="password2" id="password2" value="<?php if(isset($_GET["password2"])) {echo $_GET["password2"];} ?>">
                <p id="password2mal" class="mensaje-error"></p>



                <br/><br>

                <input type="submit" name="enviar" value="Enviar" style="width: 100%;">

                <p style="text-align: center;">Ya tienes una cuenta? Inicia sesion <a href=" ./singup.php" style="color:#fe76c1">aqui</a></p>
            </form>
        </div>
    </div>
</div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
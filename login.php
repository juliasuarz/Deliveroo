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
    <h1>Inicia sesion</h1><br>
    <div class="form-container">
        <div>
            <form action="validacion_login.php" method="post">

                <!-- Email -->
                <?php if (isset($_GET['emailVacio'])) {echo "<div class='error-message'>Email vacío. Has de introducir un email válido.</div>"; } ?>

                <?php if (isset($_GET['emailMal'])) {echo "<div class='error-message'>El formato del email es incorrecto</div>"; } ?>

                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="julia@gmail.com" value="<?php if(isset($_GET["email"])) {echo $_GET["email"];} ?>">

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioMail" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalMail" class="mensaje-error"></p>

                <!-- Contraseña -->
                <?php if (isset($_GET['password3Vacio'])) {echo "<div class='error-message'>Contraseña vacía. Has de introducir una contraseña válida.</div>"; } ?>

                <label for="password3">Contraseña</label>
                <input type="password" name="password3" id="password3" placeholder="Constraseña" value="<?php if(isset($_GET["password3"])) {echo $_GET["password3"];} ?>">
                <p id="password3mal" class="mensaje-error"></p>

                <br><br>

                <span class="password-criteria-messaging">By continuing you agree to our <a href="/legal" target="_blank">T&amp;Cs</a>. Please also check out our <a href="/privacy" target="_blank">Privacy Policy</a>. We use your data to offer you a personalised experience and to better understand and improve our services. <a href="/privacy#use-of-your-information">For more information see here</a>.</span>

                <span class="container-btn">
                    <button type="submit" class="btn-azul" tabindex="0">
                        <span>Iniciar sesión</span>
                    </button>
                </span>

                <p style="text-align: center; width: 100%;">No tienes una cuenta? Inicia sesion <a href=" ./singup.php" >aqui</a></p>
            </form>
        </div>
    </div>
</div>

    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<?php
    // Mostrar Sweet Alert si existe el error de credenciales
    if (isset($_SESSION['errors']['credenciales'])) {
        echo "<script>
            Swal.fire({
                icon: 'error',
                title: 'Error de inicio de sesión',
                text: '".$_SESSION['errors']['credenciales']."',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>";
        unset($_SESSION['errors']['credenciales']); // Limpiar el error después de mostrar el Sweet Alert
    }
?>
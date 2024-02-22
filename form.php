<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="./css/style_form_rest.less" rel="stylesheet">
</head>
<body>
    
</body>
</html>

<div class="container-formulario">
    <h1>Añade tu restaurante</h1><br>
    <div class="form-container">
        <div>
            <form action="validacion_restaurante.php" method="post">

                <!-- nombre_rest -->
                <div class="form-group">
                <?php if (isset($_GET['nombre_restVacio'])) {echo "<div class='error-message'>nombre_rest vacío. Has de introducir un nombre_rest válido.</div>"; } ?>
                <?php if (isset($_GET['nombre_restMal'])) {echo "<div class='error-message'>El formato del nombre_rest es incorrecto</div>"; } ?>

                <label for="nombre_rest">Nombre del restaurante</label>
                <input type="text" name="nombre_rest" id="nombre_rest" placeholder="Deliveroo" value="<?php if(isset($_GET["nombre_rest"])) {echo $_GET["nombre_rest"];} ?>">

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioNombre" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalNombre" class="mensaje-error"></p>
                </div>


                <!-- descripcion_rest -->
                <div class="form-group">
                <?php if (isset($_GET['descripcion_restVacio'])) {echo "<div class='error-message'>descripcion_rest vacío. Has de introducir un descripcion_rest válido.</div>"; } ?>
                <?php if (isset($_GET['descripcion_restMal'])) {echo "<div class='error-message'>El formato del descripcion_rest es incorrecto</div>"; } ?>

                <label for="descripcion_rest">Descripcion</label>
                <input type="text" name="descripcion_rest" id="descripcion_rest" placeholder="Restaurante..." value="<?php if(isset($_GET["descripcion_rest"])) {echo $_GET["descripcion_rest"];} ?>">

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioDesc" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalDesc" class="mensaje-error"></p>
                </div>


                <!-- img_rest -->
                <div class="form-group">
                <?php if (isset($_GET['img_restVacio'])) {echo "<div class='error-message'>img_rest vacío. Has de introducir un img_rest válido.</div>"; } ?>
                <?php if (isset($_GET['img_restMal'])) {echo "<div class='error-message'>El formato del img_rest es incorrecto</div>"; } ?>
                
                <label for="img_rest">Foto</label>
                <input type="file" name="img_rest" id="img_rest" placeholder="" value="<?php if(isset($_GET["img_rest"])) {echo $_GET["img_rest"];} ?>">

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioImg" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalImg" class="mensaje-error"></p>
                </div>

                <!-- dinero_gastado -->
                <div class="form-group select">
                <?php if (isset($_GET['dinero_gastadoVacio'])) {echo "<div class='error-message'>dinero_gastado vacío. Has de introducir un dinero_gastado válido.</div>"; } ?>
                <?php if (isset($_GET['dinero_gastadoMal'])) {echo "<div class='error-message'>El formato del dinero_gastado es incorrecto</div>"; } ?>

                <label for="dinero_gastado">Pedido mínimo de:</label>
                <select name="dinero_gastado" id="dinero_gastado">
                    <option value="">Seleccione...</option>
                    <option value="5€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '5€') echo 'selected'; ?>>5€</option>
                    <option value="10€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '10€') echo 'selected'; ?>>10€</option>
                    <option value="15€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '15€') echo 'selected'; ?>>15€</option>
                    <option value="20€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '20€') echo 'selected'; ?>>20€</option>
                    <option value="25€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '25€') echo 'selected'; ?>>25€</option>
                    <option value="30€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '30€') echo 'selected'; ?>>30€</option>
                    <option value="35€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '35€') echo 'selected'; ?>>35€</option>
                    <option value="40€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '40€') echo 'selected'; ?>>40€</option>
                    <option value="45€" <?php if(isset($_GET["dinero_gastado"]) && $_GET["dinero_gastado"] == '45€') echo 'selected'; ?>>45€</option>
                </select>

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioDineroGastado" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalDineroGastado" class="mensaje-error"></p>
                </div>


                <!-- dinero_descuento -->
                <div class="form-group select">
                <?php if (isset($_GET['dinero_descuentoVacio'])) {echo "<div class='error-message'>dinero_descuento vacío. Has de introducir un dinero_descuento válido.</div>"; } ?>
                <?php if (isset($_GET['dinero_descuentoMal'])) {echo "<div class='error-message'>El formato del dinero_descuento es incorrecto</div>"; } ?>
                
                <label for="dinero_descuento">Descuento de:</label>
                <select name="dinero_descuento" id="dinero_descuento">
                    <option value="">Seleccione...</option>
                    <option value="10%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '10%') echo 'selected'; ?>>10%</option>
                    <option value="15%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '15%') echo 'selected'; ?>>15%</option>
                    <option value="20%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '20%') echo 'selected'; ?>>20%</option>
                    <option value="25%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '25%') echo 'selected'; ?>>25%</option>
                    <option value="30%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '30%') echo 'selected'; ?>>30%</option>
                    <option value="35%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '35%') echo 'selected'; ?>>35%</option>
                    <option value="40%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '40%') echo 'selected'; ?>>40%</option>
                    <option value="45%" <?php if(isset($_GET["dinero_descuento"]) && $_GET["dinero_descuento"] == '45%') echo 'selected'; ?>>45%</option>
                </select>

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioDineroDescuento" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalDineroDescuento" class="mensaje-error"></p>
                </div>


                <!-- tiempo_preparacion -->
                <div class="form-group">
                <?php if (isset($_GET['tiempo_preparacionVacio'])) {echo "<div class='error-message'>tiempo_preparacion vacío. Has de introducir un tiempo_preparacion válido.</div>"; } ?>
                <?php if (isset($_GET['tiempo_preparacionMal'])) {echo "<div class='error-message'>El formato del tiempo_preparacion es incorrecto</div>"; } ?>

                <label for="tiempo_preparacion">¿Cuánto tarda en enviarse?</label>
                <select name="tiempo_preparacion" id="tiempo_preparacion">
                    <option value="">Seleccione...</option>
                    <option value="15 min" <?php if(isset($_GET["tiempo_preparacion"]) && $_GET["tiempo_preparacion"] == '15 min') echo 'selected'; ?>>15 min</option>
                    <option value="20 min" <?php if(isset($_GET["tiempo_preparacion"]) && $_GET["tiempo_preparacion"] == '20 min') echo 'selected'; ?>>20 min</option>
                    <option value="25 min" <?php if(isset($_GET["tiempo_preparacion"]) && $_GET["tiempo_preparacion"] == '25 min') echo 'selected'; ?>>25 min</option>
                    <option value="30 min" <?php if(isset($_GET["tiempo_preparacion"]) && $_GET["tiempo_preparacion"] == '30 min') echo 'selected'; ?>>30 min</option>
                    <option value="35 min" <?php if(isset($_GET["tiempo_preparacion"]) && $_GET["tiempo_preparacion"] == '35 min') echo 'selected'; ?>>35 min</option>
                    <option value="40 min" <?php if(isset($_GET["tiempo_preparacion"]) && $_GET["tiempo_preparacion"] == '40 min') echo 'selected'; ?>>40 min</option>
                </select>

                <!-- mensaje error si el esta vacio -->
                <p id="errorVacioTiempoPreparacion" class="mensaje-error"></p>
                <!-- mensaje error si el correo esta mal -->
                <p id="errorMalTiempoPreparacion" class="mensaje-error"></p>
                </div>
                <!-- <span class="password-criteria-messaging">By continuing you agree to our <a href="/legal" target="_blank">T&amp;Cs</a>. Please also check out our <a href="/privacy" target="_blank">Privacy Policy</a>. We use your data to offer you a personalised experience and to better understand and improve our services. <a href="/privacy#use-of-your-information">For more information see here</a>.</span> -->

                <span class="container-btn">
                    <button type="submit" class="btn-azul" tabindex="0">
                        <span>Añadir restaurante</span>
                    </button>
                </span>

                <!-- <p style="text-align: center; width: 100%;">No tienes una cuenta? Inicia sesion <a href=" ./singup.php" >aqui</a></p> -->
            </form>
        </div>
    </div>
</div>

    <script src="./js/script.js"></script>
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
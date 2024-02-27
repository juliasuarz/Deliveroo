<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir restaurante</title>
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
            <form action="" method="post" id="frm">
                <div class="form-group">
                    <input type="hidden" name="idp" id="idp" value="">
                    <!-- <label for="">id rest</label>
                    <input type="text" name="id_rest" id="id_rest" placeholder="id_rest" class="form-control"> -->
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_rest" id="nombre_rest" placeholder="nombre_rest" class="form-control">
                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioNombre" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalNombre" class="mensaje-error"></p>
                </div>
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion_rest" id="descripcion_rest" placeholder="descripcion_rest" class="form-control">
                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioDesc" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalDesc" class="mensaje-error"></p>
                </div>
                
                <!-- tiempo_preparacion -->
                <div class="form-group">
                    <?php if (isset($_GET['tiempo_preparacionVacio'])) {echo "<div class='error-message'>tiempo_preparacion vacío. Has de introducir un tiempo_preparacion válido.</div>"; } ?>
                    <?php if (isset($_GET['tiempo_preparacionMal'])) {echo "<div class='error-message'>El formato del tiempo_preparacion es incorrecto</div>"; } ?>

                    <label for="tiempo_preparacion">¿Cuánto tarda en enviarse?</label>
                    <select name="tiempo_rest" id="tiempo_rest" class="form-control"> <!-- Aquí agregamos la etiqueta select -->
                    <?php
                        include_once("./sql/conexion.php");
                        $pdo = conectar();
                        // Consulta SQL para obtener los tipos de comida
                        $sql = "SELECT tiempo_rest FROM restaurantes ORDER BY tiempo_rest ASC";
                        $result = $pdo->query($sql);

                        // Generar opciones del select
                        if ($result) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['tiempo_rest'] . "'>" . $row['tiempo_rest'] . " min</option>";
                            }
                        } else {
                            echo "<option value=''>No hay tipos de comida disponibles</option>"; // Si no hay resultados, muestra un mensaje
                        }
                    ?>
                    </select>
                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioTiempoPreparacion" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalTiempoPreparacion" class="mensaje-error"></p>
                </div>
                <!-- dinero_gastado -->
                <div class="form-group select">
                    <?php if (isset($_GET['dinero_gastadoVacio'])) {echo "<div class='error-message'>dinero_gastado vacío. Has de introducir un dinero_gastado válido.</div>"; } ?>
                    <?php if (isset($_GET['dinero_gastadoMal'])) {echo "<div class='error-message'>El formato del dinero_gastado es incorrecto</div>"; } ?>

                    <label for="gastado_rest">Pedido mínimo de:</label>
                    <select name="gastado_rest" id="gastado_rest">
                        <option value="">Seleccione...</option>
                        <option value="5€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '5€') echo 'selected'; ?>>5€</option>
                        <option value="10€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '10€') echo 'selected'; ?>>10€</option>
                        <option value="15€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '15€') echo 'selected'; ?>>15€</option>
                        <option value="20€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '20€') echo 'selected'; ?>>20€</option>
                        <option value="25€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '25€') echo 'selected'; ?>>25€</option>
                        <option value="30€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '30€') echo 'selected'; ?>>30€</option>
                        <option value="35€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '35€') echo 'selected'; ?>>35€</option>
                        <option value="40€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '40€') echo 'selected'; ?>>40€</option>
                        <option value="45€" <?php if(isset($_GET["gastado_rest"]) && $_GET["gastado_rest"] == '45€') echo 'selected'; ?>>45€</option>
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

                    <label for="descuento_rest">Descuento de:</label>
                    <select name="descuento_rest" id="descuento_rest">
                        <option value="">Seleccione...</option>
                        <option value="0%" <?php if(isset($_GET["descuento_rest"]) && $_GET["descuento_rest"] == '0%') echo 'selected'; ?>>0%</option>
                        <option value="10%" <?php if(isset($_GET["descuento_rest"]) && $_GET["descuento_rest"] == '10%') echo 'selected'; ?>>10%</option>
                        <option value="20%" <?php if(isset($_GET["descuento_rest"]) && $_GET["descuento_rest"] == '20%') echo 'selected'; ?>>20%</option>
                        <option value="30%" <?php if(isset($_GET["descuento_rest"]) && $_GET["descuento_rest"] == '30%') echo 'selected'; ?>>30%</option>
                        <option value="50%" <?php if(isset($_GET["descuento_rest"]) && $_GET["descuento_rest"] == '50%') echo 'selected'; ?>>45%</option>
                    </select>

                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioDineroDescuento" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalDineroDescuento" class="mensaje-error"></p>
                </div>
                <div class="form-group">
                    <label for="">Precio Envío</label>
                    <input type="text" name="precio_envio_rest" id="precio_envio_rest" placeholder="2€, 3.5€" class="form-control">
                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioPrecio" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalPrecio" class="mensaje-error"></p>
                </div>
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
                <div class="form-group form-registrar">
                    <input type="button" value="Registrar" id="registrar" class="btn btn-registrar btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="./js/script_rest.js"></script>
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
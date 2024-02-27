<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir plato</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="./css/style_form_rest.less" rel="stylesheet">
</head>
<body>
    
</body>
</html>
<?php
    session_start();
?>
<div class="container-formulario">
    <h1>Añade un plato</h1><br>
    <div class="form-container">
        <div>
            <form action="" method="post" id="frm">
                <div class="form-group">
                    <input type="hidden" name="idp" id="idp" value="">
                    <!-- <label for="">id plato</label> -->
                    <!-- <input type="text" name="id_plato" id="id_plato" placeholder="id_plato" class="form-control"> -->
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_plato" id="nombre_plato" placeholder="nombre_plato" class="form-control">
                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioNombre" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalNombre" class="mensaje-error"></p>
                </div>
                <div class="form-group">
                    <label for="">Precio</label>
                    <input type="text" name="precio_plato" id="precio_plato" placeholder="precio" class="form-control">
                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioDesc" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalDesc" class="mensaje-error"></p>
                </div>
                <div class="form-group">
                    <label for="">Img</label>
                    <input type="file" name="img_plato" id="img_plato" placeholder="img_plato" class="form-control">

                    <!-- mensaje error si el esta vacio -->
                    <p id="errorVacioImg" class="mensaje-error"></p>
                    <!-- mensaje error si el correo esta mal -->
                    <p id="errorMalImg" class="mensaje-error"></p>
                </div>
                <!-- id_tipo_plato -->
                <div class="form-group">
                    <?php if (isset($_GET['id_tipo_platoVacio'])) {echo "<div class='error-message'>id_tipo_plato vacío. Has de introducir un id_tipo_plato válido.</div>"; } ?>
                    <?php if (isset($_GET['id_tipo_platoMal'])) {echo "<div class='error-message'>El formato del id_tipo_plato es incorrecto</div>"; } ?>

                    <label for="id_tipo_plato">Tipo de comida</label>
                    <select name="id_tipo_plato" id="id_tipo_plato" class="form-control"> <!-- Aquí agregamos la etiqueta select -->
                    <?php
                        include_once("./sql/conexion.php");
                        $pdo = conectar();
                        // Consulta SQL para obtener los tipos de comida
                        $sql = "SELECT id_tipo, nombre_tipo FROM tipo_comida";
                        $result = $pdo->query($sql);

                        // Generar opciones del select
                        if ($result) {
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                echo "<option value='" . $row['id_tipo'] . "'>" . $row['nombre_tipo'] . "</option>";
                            }
                        } else {
                            echo "<option value=''>No hay tipos de comida disponibles</option>"; // Si no hay resultados, muestra un mensaje
                        }
                    ?>

                    </select> <!-- Aquí cerramos la etiqueta select -->
                    <!-- mensaje error si el esta vacio -->
                </div>

                <div class="form-group form-registrar">
                    <input type="button" value="Registrar" id="registrar" class="btn btn-registrar btn-block">
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="./js/script_plato.js"></script>
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
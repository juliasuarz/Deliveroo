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
                    <label for="">id rest</label>
                    <input type="text" name="id_rest" id="id_rest" placeholder="id_rest" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombre_rest" id="nombre_rest" placeholder="nombre_rest" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Descripcion</label>
                    <input type="text" name="descripcion_rest" id="descripcion_rest" placeholder="descripcion_rest" class="form-control">
                </div>
                <div class="form-group form-registrar">
                    <input type="button" value="Registrar" id="registrar" class="btn btn-registrar btn-block">
                </div>
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
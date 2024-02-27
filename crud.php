<?php
// Recuperar SESSION del login
session_start();

if(isset($_SESSION['id_user'])){
    $userID = $_SESSION['id_user'];
    // Conexión a la BBDD
    include_once("./sql/conexion.php");
    $pdo = conectar();

    // Consulta SQL para seleccionar todos los usuarios
    $sql = "SELECT * FROM usuarios";
    $stmt = $pdo->query($sql);

    // Verifica si hay resultados
    if ($stmt) {
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $usuarios = [];
    }

    // Consulta SQL para seleccionar todos los restaurantes
    $sql1 = "SELECT * FROM restaurantes";
    $stmt1 = $pdo->query($sql1);

    // Verifica si hay resultados
    if ($stmt1) {
        $restaurantes = $stmt1->fetchAll(PDO::FETCH_ASSOC);
    } else {
        $restaurantes = [];
    }


} else {
    // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .btn-modificar,
        .btn-añadir,
        .btn-modificar-restaurante,
        .btn-modificar-plato,
        .btn-enviar {
            background-color: rgb(0, 204, 188);
            border-color: rgb(0, 204, 188);
        }

        .btn-modificar:hover,
        .btn-añadir:hover,
        .btn-modificar-restaurante:hover,
        .btn-modificar-plato:hover,
        .btn-enviar:hover {
            background-color: rgb(0, 194, 179);
            border-color: rgb(0, 194, 179);
        }
    </style>
</head>
<body>
    <!-- Botones insert Restaurantes/Platos -->
    <div>
        <div style="text-align:end">
            <a href="./form_restaurante.php">
                <button class="btn-añadir btn" style="color: white;">Añadir Restaurante</button>
            </a>
            <a href="./form_platos.php">
                <button class="btn-añadir btn" style="color: white;">Añadir plato</button>
            </a>
        </div>
    </div>
    <!-- Tabla Usuario -->
    <div class="container">
        <h2>Usuarios</h2>
        <table class="table">
            <thead>
                <tr style="background-color: rgb(0, 204, 188); color:white">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellidos</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Teléfono</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['id_usu'] ?></td>
                    <td><?= $usuario['nombre_usu'] ?></td>
                    <td><?= $usuario['apellidos_usu'] ?></td>
                    <td><?= $usuario['email_usu'] ?></td>
                    <td><?= $usuario['tipo_usu'] ?></td>
                    <td><?= $usuario['telf_usu'] ?></td>
                    <td><button class="btn btn-primary btn-modificar" data-id="<?= $usuario['id_usu'] ?>" data-nombre="<?= $usuario['nombre_usu'] ?>" data-apellidos="<?= $usuario['apellidos_usu'] ?>" data-email="<?= $usuario['email_usu'] ?>" data-tipo="<?= $usuario['tipo_usu'] ?>" data-telefono="<?= $usuario['telf_usu'] ?>">Modificar</button></td>
                    <td><button class="btn btn-danger eliminar" data-id="<?= $usuario['id_usu'] ?>">Eliminar</button></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Tabla Restaurante -->
    <div class="container">
        <h2>Restaurantes</h2>
        <table class="table">
            <thead>
                <tr style="background-color: rgb(0, 204, 188); color:white">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Tiempo de Entrega</th>
                    <th>Descuento</th>
                    <th>Gasto Mínimo</th>
                    <th>Precio de Envío</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($restaurantes as $restaurante): ?>
                    <tr>
                        <td><?= $restaurante['id_rest'] ?></td>
                        <td><?= $restaurante['nombre_rest'] ?></td>
                        <td><?= $restaurante['descripcion_rest'] ?></td>
                        <td><?= $restaurante['tiempo_rest'] ?> minutos</td>
                        <td><?= $restaurante['descuento_rest'] ?></td>
                        <td><?= $restaurante['gastado_rest'] ?></td>
                        <td><?= $restaurante['precio_envio_rest'] ?> €</td>
                        <td>
                            <button class="btn btn-primary btn-modificar-restaurante"data-id="<?= $restaurante['id_rest'] ?>"data-nombre="<?= $restaurante['nombre_rest'] ?>"data-descripcion="<?= $restaurante['descripcion_rest'] ?>"data-tiempo="<?= $restaurante['tiempo_rest'] ?>"data-descuento="<?= $restaurante['descuento_rest'] ?>"data-gastado="<?= $restaurante['gastado_rest'] ?>"data-precio-envio="<?= $restaurante['precio_envio_rest'] ?>">Modificar</button>
                        </td>
                        <td>
                            <button class="btn btn-danger eliminar-restaurante" data-id="<?= $restaurante['id_rest'] ?>">Eliminar</button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Tabla Platos -->
    <div class="container">
        <h2>Platos</h2>
        <table class="table">
            <thead>
                <tr style="background-color: rgb(0, 204, 188); color:white">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Tipo de Plato</th>
                    <th>Restaurante</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Consulta SQL para seleccionar todos los platos
                $sql2 = "SELECT p.id_plato, p.nombre_plato, p.precio_plato, tc.nombre_tipo, r.nombre_rest 
                        FROM platos p 
                        INNER JOIN tipo_comida tc ON p.id_tipo_plato = tc.id_tipo 
                        INNER JOIN restaurantes r ON p.id_rest_plato = r.id_rest";
                $stmt2 = $pdo->query($sql2);

                // Verifica si hay resultados
                if ($stmt2) {
                    $platos = $stmt2->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($platos as $plato):
                ?>
                <tr>
                    <td><?= $plato['id_plato'] ?></td>
                    <td><?= $plato['nombre_plato'] ?></td>
                    <td><?= $plato['precio_plato'] ?></td>
                    <td><?= $plato['nombre_tipo'] ?></td>
                    <td><?= $plato['nombre_rest'] ?></td>
                    <td>
                        <button class="btn btn-primary btn-modificar-plato"
                            data-id="<?= $plato['id_plato'] ?>"
                            data-nombre="<?= $plato['nombre_plato'] ?>"
                            data-precio="<?= $plato['precio_plato'] ?>"
                            data-tipo="<?= $plato['nombre_tipo'] ?>"
                            data-restaurante="<?= $plato['nombre_rest'] ?>">Modificar</button>
                    </td>
                    <td>
                        <button class="btn btn-danger eliminar-plato" data-id="<?= $plato['id_plato'] ?>">Eliminar</button>
                    </td>
                </tr>
                <?php
                    endforeach;
                } else {
                    echo "<tr><td colspan='7'>No se encontraron platos.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de Modificación Usuario-->
    <div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="modalModificarLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalModificarLabel">Modificar Usuario</h4>
                </div>
                <div class="modal-body">
                    <form id="formModificar" action="modificar_user.php" method="get">
                        <div class="form-group">
                            <label for="idUsuario">ID de Usuario:</label>
                            <input type="text" class="form-control" id="idUsuario" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombreUsuario">Nombre de Usuario:</label>
                            <input type="text" class="form-control" id="nombreUsuario" required>
                        </div>
                        <div class="form-group">
                            <label for="apellidosUsuario">Apellidos de Usuario:</label>
                            <input type="text" class="form-control" id="apellidosUsuario" required>
                        </div>
                        <div class="form-group">
                            <label for="emailUsuario">Email de Usuario:</label>
                            <input type="email" class="form-control" id="emailUsuario" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoUsuario">Tipo de Usuario:</label>
                            <select class="form-control" id="tipoUsuario" required>
                                <option value="Admin">Admin</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Estandar">Estandar</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="telefonoUsuario">Teléfono de Usuario:</label>
                            <input type="text" class="form-control" id="telefonoUsuario" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-enviar">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Modificación de Restaurantes -->
    <div class="modal fade" id="modalModificarRestaurante" tabindex="-1" role="dialog" aria-labelledby="modalModificarRestauranteLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalModificarRestauranteLabel">Modificar Restaurante</h4>
                </div>
                <div class="modal-body">
                    <form id="formModificarRestaurante">
                        <div class="form-group">
                            <label for="idRestaurante">ID de Restaurante:</label>
                            <input type="text" class="form-control" id="idRestaurante" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombreRestaurante">Nombre de Restaurante:</label>
                            <input type="text" class="form-control" id="nombreRestaurante" required>
                        </div>
                        <div class="form-group">
                            <label for="descripcionRestaurante">Descripción de Restaurante:</label>
                            <textarea class="form-control" id="descripcionRestaurante" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="tiempoRestaurante">Tiempo de Entrega:</label>
                            <select class="form-control" id="tiempoRestaurante" required>
                                <option value="10">10 minutos</option>
                                <option value="15">15 minutos</option>
                                <option value="20">20 minutos</option>
                                <option value="25">25 minutos</option>
                                <option value="30">30 minutos</option>
                                <option value="+30">Más de 30 minutos</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="descuentoRestaurante">Descuento:</label>
                            <select class="form-control" id="descuentoRestaurante">
                                <option value="0">0%</option>
                                <option value="10">10%</option>
                                <option value="20">20%</option>
                                <option value="30">30%</option>
                                <option value="50">50%</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gastadoRestaurante">Gasto Promedio por Persona:</label>
                            <select class="form-control" id="gastadoRestaurante">
                                <option value="5€">5€</option>
                                <option value="10€">10€</option>
                                <option value="15€">15€</option>
                                <option value="20€">20€</option>
                                <option value="25€">25€</option>
                                <option value="30€">30€</option>
                                <option value="35€">35€</option>
                                <option value="40€">40€</option>
                                <option value="45€">45€</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="precioEnvioRestaurante">Precio de Envío:</label>
                            <input type="number" class="form-control" id="precioEnvioRestaurante" step="0.01" required>
                        </div>
                        <button type="submit" class="btn btn-primary btn-enviar-restaurante" 
                            data-id="<?= $restaurante['id_rest'] ?>" 
                            data-nombre="<?= $restaurante['nombre_rest'] ?>"
                            data-descripcion="<?= $restaurante['descripcion_rest'] ?>"
                            data-tiempo="<?= $restaurante['tiempo_rest'] ?>"
                            data-descuento="<?= $restaurante['descuento_rest'] ?>"
                            data-gastado="<?= $restaurante['gastado_rest'] ?>"
                            data-precio-envio="<?= $restaurante['precio_envio_rest'] ?>">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Modificación de Platos -->
    <div class="modal fade" id="modalModificarPlato" tabindex="-1" role="dialog" aria-labelledby="modalModificarPlatoLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalModificarPlatoLabel">Modificar Plato</h4>
                </div>
                <div class="modal-body">
                    <form id="formModificarPlato">
                        <div class="form-group">
                            <label for="idPlato">ID de Plato:</label>
                            <input type="text" class="form-control" id="idPlato" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nombrePlato">Nombre de Plato:</label>
                            <input type="text" class="form-control" id="nombrePlato" required>
                        </div>
                        <div class="form-group">
                            <label for="precioPlato">Precio de Plato:</label>
                            <input type="number" class="form-control" id="precioPlato" step="0.01" required>
                        </div>
                        <div class="form-group">
                            <label for="tipoPlato">Tipo de Plato:</label>
                            <input type="text" class="form-control" id="tipoPlato" readonly>
                        </div>
                        <div class="form-group">
                            <label for="restaurantePlato">Restaurante:</label>
                            <input type="text" class="form-control" id="restaurantePlato" readonly>
                        </div>
                        <button type="submit" class="btn btn-enviar-plato">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            // ----------------------------------
            // USUARIOS
            // Mostrar modal de modificación al hacer clic en el botón Modificar
            $('.btn-modificar').click(function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var apellidos = $(this).data('apellidos');
                var email = $(this).data('email');
                var tipo = $(this).data('tipo');
                var telefono = $(this).data('telefono');
                $('#idUsuario').val(id);
                $('#nombreUsuario').val(nombre);
                $('#apellidosUsuario').val(apellidos);
                $('#emailUsuario').val(email);
                $('#tipoUsuario').val(tipo);
                $('#telefonoUsuario').val(telefono);
                $('#modalModificar').modal('show');
            });

            // Eliminar usuario al hacer clic en el botón Eliminar
            $('.eliminar').click(function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: "¿Deseas eliminar el usuario?",
                    text: "No habrá vuelta atrás...",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirige a eliminar_user.php con el ID como parámetro
                        window.location.href = 'eliminar_user.php?id=' + id;
                    }
                });
            });

            // Enviar el formulario de modificación al hacer clic en Enviar
            $('#formModificar').submit(function(e) {
                e.preventDefault();
                var idUsuario = $('#idUsuario').val();
                var nombreUsuario = $('#nombreUsuario').val();
                var apellidosUsuario = $('#apellidosUsuario').val();
                var emailUsuario = $('#emailUsuario').val();
                var tipoUsuario = $('#tipoUsuario').val();
                var telefonoUsuario = $('#telefonoUsuario').val();

                // Construir la URL con los datos del formulario
                var url = 'modificar_user.php?id=' + idUsuario + '&nombre=' + nombreUsuario + '&apellidos=' + apellidosUsuario + '&email=' + emailUsuario + '&tipo=' + tipoUsuario + '&telefono=' + telefonoUsuario;

                // Redirigir a modificar_user.php con los datos del formulario
                window.location.href = url;
            });

            // ----------------------------------
            // RESTAURANTES
            // Mostrar modal de modificación al hacer clic en el botón Modificar
            $('.btn-modificar-restaurante').click(function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var descripcion = $(this).data('descripcion');
                var tiempo = $(this).data('tiempo');
                var descuento = $(this).data('descuento');
                var gastado = $(this).data('gastado');
                var precioEnvio = $(this).data('precio-envio');
                $('#idRestaurante').val(id);
                $('#nombreRestaurante').val(nombre);
                $('#descripcionRestaurante').val(descripcion);
                $('#tiempoRestaurante').val(tiempo);
                $('#descuentoRestaurante').val(descuento);
                $('#gastadoRestaurante').val(gastado);
                $('#precioEnvioRestaurante').val(precioEnvio);
                $('#modalModificarRestaurante').modal('show');
            });

            // Eliminar restuarante al hacer clic en el botón Eliminar
            $('.eliminar-restaurante').click(function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: "¿Deseas eliminar el restaurante?",
                    text: "No habrá vuelta atrás...",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirige a eliminar_user.php con el ID como parámetro
                        window.location.href = 'eliminar_restaurante.php?id=' + id;
                    }
                });
            });

            // Enviar el formulario de modificación de restaurante al hacer clic en Enviar
            $('#formModificarRestaurante').submit(function(e) {
                e.preventDefault();
                var idRestaurante = $('#idRestaurante').val();
                var nombreRestaurante = $('#nombreRestaurante').val();
                var descripcionRestaurante = $('#descripcionRestaurante').val();
                var tiempoRestaurante = $('#tiempoRestaurante').val();
                var descuentoRestaurante = $('#descuentoRestaurante').val();
                var gastadoRestaurante = $('#gastadoRestaurante').val();
                var precioEnvioRestaurante = $('#precioEnvioRestaurante').val();

                // Construir la URL con los datos del formulario
                var url = 'modificar_restaurante.php?id=' + idRestaurante +
                    '&nombre=' + nombreRestaurante +
                    '&descripcion=' + descripcionRestaurante +
                    '&tiempo=' + tiempoRestaurante +
                    '&descuento=' + descuentoRestaurante +
                    '&gastado=' + gastadoRestaurante +
                    '&precioEnvio=' + precioEnvioRestaurante;

                // Redirigir a modificar_restaurante.php con los datos del formulario
                window.location.href = url;
            });

            // ----------------------------------
            // PLATOS
            // Mostrar modal de modificación al hacer clic en el botón Modificar
            $('.btn-modificar-plato').click(function() {
                var id = $(this).data('id');
                var nombre = $(this).data('nombre');
                var precio = $(this).data('precio');
                var tipo = $(this).data('tipo');
                var restaurante = $(this).data('restaurante');
                $('#idPlato').val(id);
                $('#nombrePlato').val(nombre);
                $('#precioPlato').val(precio);
                $('#tipoPlato').val(tipo);
                $('#restaurantePlato').val(restaurante);
                $('#modalModificarPlato').modal('show');
            });

            // Eliminar plato al hacer clic en el botón Eliminar
            $('.eliminar-plato').click(function() {
                var id = $(this).data('id');
                Swal.fire({
                    title: "¿Deseas eliminar el plato?",
                    text: "No habrá vuelta atrás...",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Delete"
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Redirige a eliminar_plato.php con el ID como parámetro
                        window.location.href = 'eliminar_plato.php?id=' + id;
                    }
                });
            });

            // Enviar el formulario de modificación de plato al hacer clic en Enviar
            $('#formModificarPlato').submit(function(e) {
                e.preventDefault();
                var idPlato = $('#idPlato').val();
                var nombrePlato = $('#nombrePlato').val();
                var precioPlato = $('#precioPlato').val();

                // Construir la URL con los datos del formulario
                var url = 'modificar_plato.php?id=' + idPlato +
                    '&nombre=' + nombrePlato +
                    '&precio=' + precioPlato;

                // Redirigir a modificar_plato.php con los datos del formulario
                window.location.href = url;
            });

        });
    </script>
</body>
</html>
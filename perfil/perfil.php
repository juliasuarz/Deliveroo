<?php
session_start();
include_once("../sql/conexion.php");
$pdo = conectar(); // Suponiendo que la función conectar() está definida en el archivo de conexión


// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['id_user'])) {
    // El usuario no ha iniciado sesión, redirigirlo a la página de inicio de sesión o mostrar un mensaje de error
    header('Location: ../login.php');
    exit();
}
error_reporting(E_ALL);
ini_set('display_errors', '1');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="./css/style.less"> -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="../style.less" rel="stylesheet">
    <title>Home</title>
</head>
<body style="    background-color: #f9fafa;">
<?php
// Verificar si hay un indicador de correo electrónico existente en la sesión
if (isset($_SESSION['nombre']) && $_SESSION['nombre']) {
    unset($_SESSION['nombre']); // Limpiar el indicador de la sesión

    // Mostrar SweetAlert
    ?>
    <script>
    Swal.fire("Error", "El nombre no es valido.", "error");
    </script>
    <?php
}
?>
<div class ="menu menu-azul" >
        <div class="navbar navbar-expand-lg ">
            <div class="navbar">
                <div class="container-fluid menu-p">
                    <div class="col col-logo">
                    <a href="../index.php"><img class="logo-img" src="../img/deliveroo-logo.png" id="inicio"></a>
                    </div>
                    <!-- <div>
                        <input class="buscador-inicio" placeholder="Search Carbon - Soho">
                    </div> -->
                    <!-- <div class="btn-menu navbar-right nav navbar-nav navbar-right">
                        <div class="dropdown">
                            <button class=" opt btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Partner with us</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Riders</a>
                                <a class="dropdown-item" href="#">Partners</a>
                                <a class="dropdown-item" href="#">Careers</a>
                                <a class="dropdown-item" href="#">Deliveroo for Work</a>
                            </div>
                        </div>
                        <div>
                            <button class="opt">
                                <i class="fa-solid fa-house"></i>
                                <span>Sign up or log in</span>
                            </button>                 
                        </div>
                        <div>
                            <button class="opt">
                                <a href="./inc/singup.php" >
                                    <i class="fa-solid fa-user"></i>
                                    <span>Account</span>
                                </a>
                            </button>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <div class="region-azul">
        <div class="container-azul">
    <?php
    // Obtener el ID de usuario de la sesión
    $id_usuario = $_SESSION['id_user'];

    try {
        // Obtener el perfil del usuario actual desde la base de datos
        $sql = "SELECT nombre_usu, email_usu FROM usuarios WHERE id_usu = :id_usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id_usuario', $id_usuario, PDO::PARAM_INT);
        $stmt->execute();
        $perfil = $stmt->fetch(PDO::FETCH_ASSOC);

        // Mostrar el perfil del usuario en la misma página
        echo "<ul>";
        echo "<li><h1>Editar perfil</h1></li>";
        echo "<li>" . $perfil['email_usu'] . "</li>";
        echo "</ul>";

    } catch (PDOException $e) {
        // Manejar la excepción
        echo "Error al obtener el perfil de usuario: " . $e->getMessage();
    }
    ?>
    </div>
</div>


<div class="region-tabla">
    <div class="container-tabla">
    <h1>Lista de Perfiles</h1>

        <table id="perfilesTable">
            <tbody id="cuerpoTabla">
                <!-- Aquí se insertarán los datos del JSON -->
        </tbody>
        </table>
    </div>
</div>


<!-- <form id="formulario">
    <label for="pwdant">Contraseña actual:</label>
    <input type="password" id="pwdant" name="pwdant"><br><br>
    
    <label for="pwd1">Nueva contraseña:</label>
    <input type="password" id="pwd1" name="pwd1"><br><br>
    
    <label for="pwd2">Confirmar nueva contraseña:</label>
    <input type="password" id="pwd2" name="pwd2"><br><br>
    
    <input type="submit" value="Enviar">
</form> -->

<!-- Agrega los scripts de Bootstrap y otros aquí si es necesario -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="perfil.js"></script>

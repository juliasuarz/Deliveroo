<?php
session_start();
include_once("../sql/conexion.php");
$pdo = conectar();


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('./PHPMailer/src/Exception.php');
require('./PHPMailer/src/PHPMailer.php');
require('./PHPMailer/src/SMTP.php');



// Verificamos si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Creamos un array para almacenar los errores
    $errors = [];

    // Validación del nombre
    if (empty($_POST['nombre'])) {
        $errors['nombre'] = "El nombre es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z\s]*$/", $_POST['nombre'])) {
        $errors['nombre'] = "El formato del nombre es incorrecto.";
    }

    // Validación del apellido
    if (empty($_POST['apellido'])) {
        $errors['apellido'] = "El apellido es obligatorio.";
    } elseif (!preg_match("/^[a-zA-Z0-9]*$/", $_POST['apellido'])) {
        $errors['apellido'] = "El formato del apellido es incorrecto.";
    }

    // Validación del correo electrónico
    if (empty($_POST['email'])) {
        $errors['email'] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato del correo electrónico es incorrecto.";
    }

    // Validación del correo electrónico
    if (empty($_POST['email'])) {
        $errors['email'] = "El correo electrónico es obligatorio.";
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "El formato del correo electrónico es incorrecto.";
    } else {
        // Verificar si el correo electrónico ya existe en la base de datos
        try {
            
            $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE email_usu = :email");
            $stmt->bindParam(':email', $_POST['email']);
            $stmt->execute();
            
            $count = $stmt->fetchColumn();
            
            if ($count > 0) {
                // Guardar un indicador en la sesión
                $_SESSION['email_exists'] = true;
                header("Location: singup.php");
                exit(); // Terminar la ejecución del script
            }
        } catch (PDOException $e) {
            echo "Error al consultar la base de datos: " . $e->getMessage();
            die();
        }
    }

    // Validación de la contraseña
    if (empty($_POST['password1'])) {
        $errors['password1'] = "La contraseña es obligatoria.";
    } elseif (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $_POST['password1'])) {
        $errors['password1'] = "El formato de la contraseña es incorrecto.";
    }

    // Validación de la confirmación de contraseña
    // if (empty($_POST['password2'])) {
    //     $errors['password2'] = "La confirmación de contraseña es obligatoria.";
    // } elseif ($_POST['password1'] !== $_POST['password2']) {
    //     $errors['password2'] = "Las contraseñas no coinciden.";
    // }

    // Validación del teléfono
    if (empty($_POST['telefono'])) {
        $errors['telefono'] = "El teléfono es obligatorio.";
    } elseif (!ctype_digit($_POST['telefono']) || strlen($_POST['telefono']) !== 9) {
        $errors['telefono'] = "El formato del teléfono es incorrecto.";
    }

    // Validación del teléfono
    if (empty($_POST['telefono'])) {
        $errors['telefono'] = "El teléfono es obligatorio.";
    } elseif (!ctype_digit($_POST['telefono']) || strlen($_POST['telefono']) !== 9) {
        $errors['telefono'] = "El formato del teléfono es incorrecto.";
    }

    // Verificar si el teléfono ya existe en la base de datos
    try {
        $pdo = conectar();
        
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM usuarios WHERE telf_usu = :telefono");
        $stmt->bindParam(':telefono', $_POST['telefono']);
        $stmt->execute();
        
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            // Guardar un indicador en la sesión
            $_SESSION['telefono_exists'] = true;
            header("Location: singup.php");
            exit(); // Terminar la ejecución del script
        }
    } catch (PDOException $e) {
        echo "Error al consultar la base de datos: " . $e->getMessage();
        die();
    }

    // Empieza la verificación por mail y la inserción de datos
    function generarCodigo() {
        $codigo = rand(10000, 99999);
        return $codigo;
    }

    $mail = new PHPMailer(true);

    if (empty($errors)) {
        try {
            // Enviar verificación de mail
            try {
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                $mail->isSMTP();
                $mail->SMTPDebug = 0;
                $mail->Host       = 'smtp.office365.com'; // Servidor SMTP de Outlook
                $mail->SMTPAuth   = true;
                $mail->Username   = 'Deliveriooo@outlook.es'; // Tu dirección de correo de Outlook
                $mail->Password   = 'ASDasd123'; // Tu contraseña de Outlook
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar STARTTLS para cifrado TLS
                $mail->Port       = 587; // Puerto SMTP de Outlook
            
                $mail->setFrom('Deliveriooo@outlook.es', 'Deliveroo');
                $mail->addAddress($_POST['email']);
                
                // Generar código aleatorio
                $codigoAleatorio = generarCodigo();
                
                $mail->isHTML(true);
                $mail->Subject = 'Deliveroo | Codigo de verificacion';
                $mail->Body = "<p>Bienvenido/a a <b>Deliveroo</b>, su código de verificación es: <b>$codigoAleatorio</b></p>";
                $mail->AltBody = 'Confirma tu registro con el siguiente código';
                
                if ($mail->send()) {
                    // Redireccionar a la página verificar_codigo.php enviando los datos por POST
                    echo '<form id="redirectForm" action="verificar_codigo.php" method="post">
                              <input type="hidden" name="codigoAleatorio" value="' . $codigoAleatorio . '">
                              <input type="hidden" name="nombre" value="' . $_POST['nombre'] . '">
                              <input type="hidden" name="apellido" value="' . $_POST['apellido'] . '">
                              <input type="hidden" name="email" value="' . $_POST['email'] . '">
                              <input type="hidden" name="password1" value="' . $_POST['password1'] . '">
                              <input type="hidden" name="telefono" value="' . $_POST['telefono'] . '">
                          </form>
                          <script type="text/javascript">
                              document.getElementById("redirectForm").submit();
                          </script>';
                    exit(); // Terminar la ejecución del script
                } else {
                    // Si no se pudo enviar el correo, mostrar un mensaje de error
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }                
                
            } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            unset($mail->SMTPDebug);

        } catch (PDOException $e) {
            // En caso de error al insertar en la base de datos, mostramos un mensaje de error
            $errors['db_error'] = "Error al insertar en la base de datos: " . $e->getMessage();
        }
    }
    else {
        // Si hay errores de validación, los guardamos en la sesión y redirigimos de vuelta al formulario
        $_SESSION['errors'] = $errors;
        $_SESSION['old_input'] = $_POST;
        header("Location: singup.php");
        exit();
    }    
} else {
    // Si no se ha enviado el formulario, redireccionamos de vuelta al formulario
    header("Location: singup.php");
    exit();
}
?>


<!-- 
ALTER TABLE usuarios
ADD COLUMN verificado TINYINT(1) DEFAULT 0; -->

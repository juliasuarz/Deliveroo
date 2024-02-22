/////////////////////////FORMULARIO LOGIN Y SINGUP/////////////////////////////

//Recoger datos formulario Login
var emailElement = document.getElementById('email');
if (emailElement) {
    emailElement.onblur = validacionMail;
}

var password1Element = document.getElementById('password1');
if (password1Element) {
    password1Element.onblur = ValidacionContrasena;
}

var password2Element = document.getElementById('password2');
if (password2Element) {
    password2Element.onblur = contrasena;
}

var password3Element = document.getElementById('password3');
if (password3Element) {
    password3Element.onblur = ValidacionContrasena2;
}

var nombreElement = document.getElementById('nombre');
if (nombreElement) {
    nombreElement.onblur = validacionNombre;
}

var apellidoElement = document.getElementById('apellido');
if (apellidoElement) {
    apellidoElement.onblur = validacionApellido;
}

var telefonoElement = document.getElementById('telefono');
if (telefonoElement) {
    telefonoElement.onblur = validacionTelefono;
}

// Obtener el botón de envío del formulario y agregar un evento de clic para llamar a la función de validación
var formRegistro = document.getElementById('btnRegistro');
if (formRegistro) {
    formRegistro.onclick = validarYRedirigir;
}

// Función para validar el campo de correo electrónico
function validacionMail() {
    var mail = document.getElementById('email').value;
    var inputMail = document.getElementById('email');
    var errorVacioMail = document.getElementById('errorVacioMail');
    var errorMalMail = document.getElementById('errorMalMail');

    if (mail == null || mail === "") {
        // Si el campo está vacío, se muestra un mensaje de error de campo obligatorio.
        inputMail.style.borderColor = 'red';
        errorVacioMail.textContent = "El campo Correo es obligatorio.";
        errorMalMail.textContent = "";
        return false;
    } else if (!(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/.test(mail))) {
        // Si el campo no cumple con el formato de correo electrónico, se muestra un mensaje de error.
        inputMail.style.borderColor = 'red';
        errorVacioMail.textContent = "";
        errorMalMail.textContent = "¡Proporcione un correo válido!";
        return false;
    } else {
        // Si el campo contiene un correo electrónico válido, se limpian los mensajes de error.
        inputMail.style.borderColor = '#e8ebeb';
        errorVacioMail.textContent = "";
        errorMalMail.textContent = "";
        return true;
    }
}

function ValidacionContrasena() {
    var contrasena1 = document.getElementById('password1').value;
    var contrasena1mal = document.getElementById('password1mal');
    var inputpass1 = document.getElementById('password1');


    if (contrasena1 == null || contrasena1 === "") {
        inputpass1.style.borderColor = 'red';
        // Si el campo está vacío, se muestra un mensaje de error de campo obligatorio.
        contrasena1mal.innerHTML = "El campo Contraseña es obligatorio.";
        return false;
    } else {
        // Expresión regular para validar la contraseña
        var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

        if (!regex.test(contrasena1)) {
            inputpass1.style.borderColor = 'red';
            // Si la contraseña no cumple con los requisitos, mostrar un mensaje de error
            contrasena1mal.innerHTML = "La contraseña debe tener al menos 8 caracteres, incluyendo mayúsculas, minúsculas y al menos un carácter especial.";
            return false; // Retorna falso indicando que la contraseña no es válida
        } else {
            inputpass1.style.borderColor = '#e8ebeb';
            contrasena1mal.innerHTML = ""; // Borrar el mensaje de error si la contraseña es válida
            return true; // Retorna verdadero indicando que la contraseña es válida
        }
    }
}

function ValidacionContrasena2() {
    var contrasena3 = document.getElementById('password3').value;
    var contrasena3mal = document.getElementById('password3mal');
    var inputpass3 = document.getElementById('password3');


    if (contrasena3 == null || contrasena3 === "") {
        inputpass3.style.borderColor = 'red';
        // Si el campo está vacío, se muestra un mensaje de error de campo obligatorio.
        contrasena3mal.innerHTML = "El campo Contraseña es obligatorio.";
        return false;
    } else {
        inputpass3.style.borderColor = '#e8ebeb';
        contrasena3mal.innerHTML = ""; // Borrar el mensaje de error si la contraseña es válida
        return true; // Retorna verdadero indicando que la contraseña es válida
    }
}


function contrasena() {
    var inputpass2 = document.getElementById('password2');
    var inputpass1 = document.getElementById('password1');

    var contrasena1 = document.getElementById('password1').value;
    var contrasena2 = document.getElementById('password2').value;
    var contrasena2mal = document.getElementById('password2mal');


    if (contrasena1.trim() !== "" && contrasena2.trim() !== "") {
        if (contrasena1 === contrasena2) {
            inputpass2.style.borderColor = '#e8ebeb';
            inputpass1.style.borderColor = '#e8ebeb';
            contrasena2mal.textContent = "";
            return true;
        } else {
            inputpass2.style.borderColor = 'red';
            inputpass1.style.borderColor = 'red';
            contrasena2mal.textContent = "No coinciden";
            return false;
        }
    } else {
        // Si alguno de los campos de contraseña está vacío, muestra un mensaje de error.
        inputpass2.style.borderColor = 'red';
        inputpass1.style.borderColor = 'red';
        contrasena2mal.textContent = "Por favor, complete ambos campos de contraseña.";
        return false;
    }
}


// Función para validar el campo de nombre
function validacionNombre() {
    var nombre = document.getElementById('nombre').value;
    var inputnombre = document.getElementById('nombre');
    var errorNombre = document.getElementById('errorNombre');

    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
        // Si el campo está vacío o solo contiene espacios en blanco, se muestra un mensaje de error.
        inputnombre.style.borderColor = 'red';
        errorNombre.textContent = "El campo nombre es obligatorio.";
        return false;
    } else if (nombre.length > 30) {
        inputnombre.style.borderColor = 'red';
        errorNombre.textContent = "El nombre es demasiado largo";
        return false;
    } else {
        // Si el campo contiene datos válidos, se limpia el mensaje de error.
        inputnombre.style.borderColor = '#e8ebeb';
        errorNombre.textContent = "";
        return true;
    }


}

// Función para validar el campo de apellidos
function validacionApellido() {
    var apellido = document.getElementById('apellido').value;
    var inputapellido = document.getElementById('apellido');
    var errorApellido = document.getElementById('errorApellido');

    if (apellido == null || apellido.length == 0 || /^\s+$/.test(apellido)) {
        // Si el campo está vacío o solo contiene espacios en blanco, se muestra un mensaje de error.
        inputapellido.style.borderColor = 'red';
        errorApellido.textContent = "El campo apellido es obligatorio.";
        return false;
    } else if (apellido.length > 30) {
        inputapellido.style.borderColor = 'red';
        errorApellido.textContent = "El apellido es demasiado largo";
        return false;
    } else {
        // Si el campo contiene datos válidos, se limpia el mensaje de error.
        inputapellido.style.borderColor = '#e8ebeb';
        errorApellido.textContent = "";
        return true;
    }


}

// Función para validar el campo de número de teléfono
function validacionTelefono() {
    var telefono = document.getElementById('telefono').value;
    var inputTelefono = document.getElementById('telefono');
    var errorVacioTelefono = document.getElementById('errorVacioTelefono');
    var errorMalTelefono = document.getElementById('errorMalTelefono');
    console.log(telefono);

    if (telefono == "" || telefono == null) {
        // Si el campo está vacío, se muestra un mensaje de error de campo obligatorio.
        inputTelefono.style.borderColor = 'red';
        errorVacioTelefono.textContent = "El campo telefono es obligatorio."
        errorMalTelefono.textContent = "";
        return false;
    } else if (!(/^\d{9}$/.test(telefono))) {
        // Si el campo no cumple con el formato de número de teléfono, se muestra un mensaje de error.
        inputTelefono.style.borderColor = 'red';
        errorVacioTelefono.textContent = "";
        errorMalTelefono.textContent = "Introduce un numero de telefono valido.";
        return false;
    } else {
        // Si el campo contiene un número de teléfono válido, se limpian los mensajes de error.
        inputTelefono.style.borderColor = '#e8ebeb';
        errorMalTelefono.textContent = "";
        errorVacioTelefono.textContent = ""
        return true;
    }
}

// Función para validar el formulario y redirigir si es válido
function validarYRedirigir(event) {
    // Detener el envío del formulario para validar primero
    event.preventDefault();

    // Realizar validaciones aquí
    var nombreValido = validacionNombre();
    var apellidoValido = validacionApellido();
    var telefonoValido = validacionTelefono();
    var emailValido = validacionMail();
    var contrasenaValida = ValidacionContrasena();
    var contrasenasCoinciden = contrasena();

    // Verificar si todas las validaciones son verdaderas
    if (nombreValido && apellidoValido && telefonoValido && emailValido && contrasenaValida && contrasenasCoinciden) {
        // Si todas las validaciones son verdaderas, enviar el formulario
        document.getElementById('formularioRegistro').submit();
    } else {
        // Si alguna validación falla, mostrar un SweetAlert con un mensaje de error
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'Por favor, completa todos los campos correctamente.',
            showConfirmButton: false,
            timer: 2000
        });
    }
}
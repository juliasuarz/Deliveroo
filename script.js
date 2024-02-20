/////////////////////////FORMULARIO LOGIN/////////////////////////////

//Recoger datos formulario Login
document.getElementById('email').onblur = validacionMail;
document.getElementById('password2').onblur = contrasena;
document.getElementById('password1').onblur = ValidacionContrasena;
document.getElementById('nombre').onblur = validacionNombre;
document.getElementById('apellido').onblur = validacionApellido;
document.getElementById('telefono').onblur = validacionTelefono;

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


function contrasena() {
    var inputpass2 = document.getElementById('password2');
    var inputpass1 = document.getElementById('password1');

    var contrasena1 = document.getElementById('password1').value;
    var contrasena2 = document.getElementById('password2').value;
    var contrasena2mal = document.getElementById('password2mal');

    console.log(contrasena1);
    console.log(contrasena2);


    if (contrasena1 === contrasena2) {
        inputpass2.style.borderColor = '#e8ebeb';
        inputpass1.style.borderColor = '#e8ebeb';
        contrasena2mal.textContent = "";
        return true;
        
    } else{
        // Si el campo contiene un correo electrónico válido, se limpian los mensajes de error.
        inputpass2.style.borderColor = 'red';
        inputpass1.style.borderColor = 'red';
        contrasena2mal.textContent = "No coinciden";
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

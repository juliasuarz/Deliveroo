window.onload = function() {
    // mostrarCamareros();
    cargarTabla();
};

function cargarTabla() {
    var perfilesTable = document.getElementById("cuerpoTabla");

    var formdata = new FormData();
    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'obtener_datos.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var perfiles = JSON.parse(ajax.responseText);
            var tabla = '';

            perfiles.forEach(function(perfil) {
                str = "<tr>";
                // str += `<td><input type="text" value="${perfil.id_usu}" /></td>`;
                str += `<td>Nombre</td>`;
                str += `<td>Apellido</td>`;
                str += `<td><input type="text" id="nombre_${perfil.id_usu}" value="${perfil.nombre_usu}" /></td>`;
                str += `<td><input type="text" id="apellidos_${perfil.id_usu}" value="${perfil.apellidos_usu}" /></td>`;
                str += `<td>Telefono</td>`;
                str += `<td>Correo</td>`;
                str += `<td><input type="text" value="${perfil.telf_usu}"readonly /></td>`;
                str += `<td><input type="text" value="${perfil.email_usu}" readonly/></td>`;
                str += `<td>Contraseña</td>`;
                str += `<td></td>`;
                str += `<td><input type="text"  id="pwd" /></td>`;
                str += `<td><button onclick="enviarpwd(${perfil.id_usu})" class="btn">Actualizar Contraseña</button></td>`;
                str += "<td>";

                str += `<button onclick="enviarFormulario(${perfil.id_usu})" class="btn" data-toggle="modal" data-target="#addTableModal">Actualizar</button>`;
                str += `<button onclick="eliminaregistro(${perfil.id_usu})" class="btn btn-danger">Eliminar</button>`;
                
                str += "</td>";
                str += "</tr>";
                tabla += str;
            });

            perfilesTable.innerHTML = tabla;

            // Agregar clase para posicionar la tabla al frente
            perfilesTable.classList.add('tabla-al-frente');
        } else {
            perfilesTable.innerHTML = 'Error';
        }
    };

    ajax.send(formdata);
}

function eliminaregistro(id_usu) {
    // Prepare data to be sent in the POST request
    var formData = new FormData();
    formData.append('id_usu', id_usu);

    // Create a new XMLHttpRequest object
    var ajax = new XMLHttpRequest();

    // Define the type of request (POST) and the destination URL
    ajax.open('POST', 'eliminar_perfil.php');

    // Set the onload callback function
    ajax.onload = function () {
        if (ajax.status === 200) {
            // Redirigir al usuario a la página de inicio de sesión después de actualizar la contraseña correctamente
            window.location.href = '../inc/singup.php';
        } else {
            // Handle the error if needed
            console.error('Error al actualizar el registro:', ajax.statusText);
        }
    };
    

    // Send the POST request with the form data
    ajax.send(formData);
}

function enviarFormulario(id_usu) {
    // Log the data before sending
    console.log("ID de usuario:", id_usu);
    var nombre_usu = document.getElementById(`nombre_${id_usu}`).value;
    var apellidos_usu = document.getElementById(`apellidos_${id_usu}`).value;

    // Check if the name and last name are empty
    if (nombre_usu.trim() === '' || apellidos_usu.trim() === '') {
        alert('El nombre y el apellido no pueden estar vacíos.');
        return; // Stop the function execution
    }

    // Check if the name and last name contain only letters and spaces
    var regex = /^[a-zA-Z\s]*$/;
    if (!regex.test(nombre_usu) || !regex.test(apellidos_usu)) {
        alert('El nombre y el apellido solo pueden contener letras y espacios.');
        return; // Stop the function execution
    }

    // Create a new FormData object
    var formData = new FormData();

    // Append the data to the FormData object
    formData.append('id_usu', id_usu);
    formData.append('nombre_usu', nombre_usu);
    formData.append('apellidos_usu', apellidos_usu);

    // Create a new XMLHttpRequest object
    var ajax = new XMLHttpRequest();

    // Define the type of request (POST) and the destination URL (actualizar_perfil.php)
    ajax.open('POST', 'actualizar_perfil.php');

    // Set the onload callback function
    ajax.onload = function () {
        if (ajax.status === 200) {
            // Handle the response from the server if needed
            cargarTabla(); // Reload the table after updating

            // You can add additional logic here based on the server response
        } else {
            // Handle the error if needed
            console.error('Error al actualizar el registro:', ajax.statusText);
        }
    };

    // Send the POST request with the form data
    ajax.send(formData);
}


function enviarpwd(id_usu) {
    // Log the data before sending
    console.log("ID de usuario:", id_usu);
    var pwd = document.getElementById('pwd').value;
    console.log(pwd)

    // Validar la contraseña
    if (pwd.trim() === '') {
        alert('La contraseña es obligatoria.');
        return; // Detener la función si la contraseña está vacía
    }
    // Puedes agregar más validaciones según tus requisitos, como longitud mínima, caracteres especiales, etc.
    // Ejemplo: Longitud mínima de 8 caracteres y al menos una letra minúscula, una letra mayúscula, un número y un carácter especial
    var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!regex.test(pwd)) {
        alert('El formato de la contraseña es incorrecto. Debe tener al menos 8 caracteres, una letra minúscula, una letra mayúscula, un número y un carácter especial.');
        return; // Detener la función si la contraseña no cumple con los requisitos
    }

    // Create a new FormData object
    var formData = new FormData();

    // Append the data to the FormData object
    formData.append('id_usu', id_usu);
    formData.append('pwd', pwd);

    // Create a new XMLHttpRequest object
    var ajax = new XMLHttpRequest();

    // Define the type of request (POST) and the destination URL (actualizar_perfil.php)
    ajax.open('POST', 'actualizar_pwd.php');

    // Set the onload callback function
    ajax.onload = function () {
        if (ajax.status === 200) {
            // Handle the response from the server if needed
            cargarTabla(); // Reload the table after updating

            // You can add additional logic here based on the server response
        } else {
            // Handle the error if needed
            console.error('Error al actualizar el registro:', ajax.statusText);
        }
    };

    // Send the POST request with the form data
    ajax.send(formData);
}

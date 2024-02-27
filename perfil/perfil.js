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
                str += `<td><input type="text" value="${perfil.nombre_usu}" /></td>`;
                str += `<td><input type="text" value="${perfil.apellidos_usu}" /></td>`;
                str += `<td><input type="text" value="${perfil.img_usu}" /></td>`;
                str += `<td><input type="text" value="${perfil.pwd_usu}" /></td>`;
                str += `<td><input type="text" value="${perfil.telf_usu}" /></td>`;
                str += "<td>";

                str += `<button onclick="verDetalles(${perfil.id_usu})" class="btn" data-toggle="modal" data-target="#addTableModal">Ver Detalles</button>`;
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
            // Handle the response from the server if needed
            cargarTabla();
            

            // You can add additional logic here based on the server response
        } else {
            // Handle the error if needed
            console.error('Error al eliminado el registro:', ajax.statusText);
        }
    };

    // Send the POST request with the form data
    ajax.send(formData);
}

// Function to handle form submission
function enviarFormulario() {
    // Get form data
    var formData = new FormData();
    formData.append('id_usu', document.getElementById("id_usu").value);
    formData.append('nombre_usu', document.getElementById("nombre_usu").value);
    formData.append('apellidos_usu', document.getElementById("apellidos_usu").value);
    formData.append('pwd_usu', document.getElementById("pwd_usu").value);


    // Create a new XMLHttpRequest object
    var ajax = new XMLHttpRequest();

    // Define the type of request (POST) and the destination URL (actualizar_registro.php)
    ajax.open('POST', 'actualizar_perfil.php');

    // Set the onload callback function
    ajax.onload = function () {
        if (ajax.status === 200) {
            // Handle the response from the server if needed
            cargarTabla();

            // You can add additional logic here based on the server response
        } else {
            // Handle the error if needed
            console.error('Error al actualizar el registro:', ajax.statusText);
        }
    };

    // Send the POST request with the form data
    ajax.send(formData);
}
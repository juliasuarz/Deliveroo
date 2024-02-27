ListarRest('');

function ListarRest() {
    var infoRest = document.getElementById('infoRest');
    var formdata = new FormData();
    // formdata.append('busqueda', valor);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', './listar_rest.php');

    ajax.onload = function () {

        // Inicializamos una variable string vacía que iremos rellenando con el código
        // HTML a mostrar a partir de los datos recibidos de listar.php
        var tabla = "";

        // El status 200 indica que se ha ejecutado correctamente la petición AJAX
        if (ajax.status == 200) {

            var json = JSON.parse(ajax.responseText);

            json.forEach(function (item) {
                var str = "<tr class='mesa'>";
                str += "<td>" + item.nombreRest + "</td>";
                str += "<td>" + item.descripcion_rest + "</td>";
                str += "<td>" + item.tiempo_rest + "</td>";
                str += "<td>" + item.descuento_rest + "</td>";
                str += "</tr>";

                // Concatenamos a la variable 'tabla'
                tabla += str;
            });

            infoRest.innerHTML = tabla;

        } else {
            // Si no se recibe un status 200, indica que ha habido un error en la petición AJAX
            infoRest.innerText = 'Error';
        }
    }

    // Se ejecuta la consulta AJAX (se envían los datos recibidos del formulario
    // a la página indicada en el método OPEN ('listar.php'))
    ajax.send(formdata);
}
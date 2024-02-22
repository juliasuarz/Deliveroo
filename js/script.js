function FiltrosRestaurantes() {
    var filtro = document.getElementById('filtro');

    var formdata = new FormData();

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/filtro-restaurantes.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var grid = '';

            str = '<div class="container">';
            str += '<div class = "row">';

            json.forEach(function (item) { 
                str += '<div>';
                str += '<button class="btn btn-success" onclick="ListarRestaurantes(\'' + item.id_tipo + '\')">'+ item.nombre_tipo +'</button>'
                str += '</div>';
            });
            str += '<div>';
            str += '<button class="btn btn-success" onclick="ListarRestaurantes(`%`)">Limpiar Filtro</button>'
            str += '</div>';
            str += '</div>';
            str += '</div>';
            grid = str;
            filtro.innerHTML = grid;

        } else {
            filtro.innerHTML = 'Error';
        }
    }
    ajax.send(formdata);
}

function ListarRestaurantes(tipo) {
    var resultados = document.getElementById('resultados');

    var formdata = new FormData();

    formdata.append('tipo', tipo);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/listado-restaurantes.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var grid = '';

            str = '<div class="container">';
            str += '<div class = "row">';

            json.forEach(function (item) { 
                str += '<div>';
                str += '<p>'+ item.nombre_rest +'</p>'
                str += '</div>';
            });
            str += '</div>';
            str += '</div>';
            grid = str;
            resultados.innerHTML = grid;

        } else {
            resultados.innerHTML = 'Error';
        }
    }
    ajax.send(formdata);
}

FiltrosRestaurantes();
ListarRestaurantes("%");

document.addEventListener('DOMContentLoaded', function () {

});
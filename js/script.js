function ListarRestaurantes() {
    var resultados = document.getElementById('resultados');

    var formdata = new FormData();

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/filtro-restaurantes.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var grid = '';

            str = '<div class="container">';
            str += '<div class = "row"';

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

ListarRestaurantes();
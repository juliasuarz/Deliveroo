function ListarRestaurantes() {
    var resultados = document.getElementById('resultados');

    var formdata = new FormData();

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/filtro-restaurante.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            var grid = '';

            str = '<div>';

            json.forEach(function (item) { 
                
            });
        } else {
            resultados.innerText = 'Error';
        }
    }
} 
var tipo_comida_selec = [];
var cantidadRestaurantes = "";

function FiltrosRestaurantes() { // Probablemente Haya que cambiar los id de item.nombre_tipo a algo como tipo_item.nombre_tipo
    var filtrotipo = document.getElementById('desplegable2');

    var formdata = new FormData();

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/filtro-restaurantes.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            str += '<div class="desplegador">';
            str += '<p>Platos</p>';
            str += '<i class="fa-solid fa-chevron-down"></i>';
            str += '</div>';

            json.forEach(function (item) { 
                str += '<div class="form-check">';
                str += '<input class="form-check-input" type="checkbox" id="'+ item.nombre_tipo +'" value="'+ item.id_tipo +'">';
                str += '<label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="'+ item.nombre_tipo +'">'+ item.nombre_tipo +'</label>';
                str += '</div>';
            });
            filtrotipo.innerHTML = str;

        } else {
            filtrotipo.innerHTML = 'Error';
        }
    }
    ajax.send(formdata);
}

function ListarRestaurantes() {
    var restaurantes = document.getElementById('restaurantes');
    var numRestaurantes = document.getElementById('num_restaurantes');

    tipos_comida = document.querySelectorAll('#desplegable2 .form-check-input:checked');
    
    var formdata = new FormData();

    tipo_comida_selec = [];

    tipos_comida.forEach(e => {
        tipo_comida_selec.push(e.value);
    });
    
    formdata.append('tipo_comida_selec', tipo_comida_selec);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/listado-restaurantes.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            cantidadRestaurantes = json.length;

            json.forEach(function (item) { 
                str += '<div class="card"><a href="./restaurante.php?restaurante='+ item.id_rest +'">';
                if(item.img_rest) {
                    str += '<img class="card-img-top" src="./img/'+ item.img_rest +'">';
                } else {
                    str += '<img class="card-img-top" src="./img/placeholder.png">';
                }
                if(item.descuento_rest != null && item.descuento_rest != "0") {
                    str += '<p class="tag-bg-white">Spend 10€</p>';
                    str += '<p class="tag-bg-red">Get '+ item.descuento_rest +' off</p>';
                }
                str += '<p class="tag-tiempo">Ready in <strong>'+ item.tiempo_rest +' min</strong></p>';

                str += '<div class="card-body">';
                str += '<h5 class="card-nombre">'+ item.nombre_rest +'</h5>';
                str += '<p class="card-estrellas">Estrellas Rest</p>'; //Añadir estos campos ↑↑↑ desde la bbdd
                if(item.precio_envio_rest != null && item.precio_envio_rest > 0) {
                    str += '<p class="card-dist">'+ item.precio_envio_rest +'€ Envio</p>';
                } else {
                    str += '<p class="card-dist">Envio Gratis</p>';
                }
                
                str += '</div>';
                str += '</a></div>';
            });

            restaurantes.innerHTML = str;
            numRestaurantes.innerHTML = cantidadRestaurantes;

            setTimeout(function() {
                var images = document.getElementsByClassName("card-img-top");
                
                for (var i = 0; i < images.length; i++) {
                    var image = images[i];
                    
                    // Verificar si la imagen no se ha cargado correctamente
                    if (!image.complete || (image.naturalWidth === 0 && image.naturalHeight === 0)) {
                        // Cambiar la imagen a la predefinida
                        image.src = "./img/placeholder.png";
                    }
                }
            }, 300);

            setTimeout(Desfiltrar(), 300);

        } else {
            restaurantes.innerHTML = 'Error';
        }
    }
    ajax.send(formdata);
}

function Desfiltrar() {
    var desfiltrar = document.getElementById('desfiltrar');

    var str = "";

    tipos_comida.forEach(e => {
        str+='<div class="tarjeta-filtro">'
        str+='<p>'+ e.id +'</p>';
        str+='<button class="close"><i class="fa-solid fa-xmark"></i></button>'
        str+='</div>'
    });

    desfiltrar.innerHTML = str;
}

// ---------------------------- //

function InformacionRestaurante() {
    var urlParams = new URLSearchParams(window.location.search);
    var restauranteId = urlParams.get('restaurante');

    var infoRest = document.querySelector('.content-restaurante .informacion-restaurante');
    
    var formdata = new FormData();

    formdata.append('restauranteId', restauranteId);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/informacion-restaurante.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            str += '<div class="img-rest">';
                str += '<a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Atras</a>';
                str += '<div class="grid-info">';
                    str += '<div class="info-img">';
                        str += '<img src="img/rest.jpeg" alt="">'; // --------------------
                    str += '</div>';
                    str += '<div class="info-body">';
                        str += '<h1>'+ json.nombre_rest +'</h1>';
                        str += '<div id="RestTipoComida"></div>';
                        str += '<div id="RestPrecioMedio"></div>'; // ---------------------------------
                        str += '<div id="RestValoracion"></div>';
                    str += '</div>';
                str += '</div>';
            str += '</div>';

            infoRest.innerHTML = str;

        } else {
            infoRest.innerHTML = 'Error';
        }

        setTimeout(Platos(restauranteId), 300);
        setTimeout(TipoComida(restauranteId), 300);
    }
    ajax.send(formdata);
}

function TipoComida(restauranteId) {
    var infoTipo = document.getElementById('RestTipoComida');
    var infoTipo2 = document.querySelector('.content-restaurante .nav-comida');
    
    var formdata = new FormData();

    formdata.append('restauranteId', restauranteId);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/tipo-comida.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            json.forEach(function (item) { 
                str += '<span>'+ item.nombre_tipo +'</span>';
            });

            infoTipo.innerHTML = str;
            infoTipo2.innerHTML = str;

        } else {
            infoTipo.innerHTML = 'Error';
            infoTipo2.innerHTML = 'Error';
        }
    }
    ajax.send(formdata);
}

function Platos(restauranteId) {
    var infoPlato = document.querySelector('.content-restaurante .informacion-platos');
    
    var formdata = new FormData();

    formdata.append('restauranteId', restauranteId);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', 'proc/platos.php');

    ajax.onload = function () {
        var str = "";
        var tipoAnterior = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            json.forEach(function (item) {
                if (item.nombre_tipo !== tipoAnterior) {
                    str += '<div><h3>'+ item.nombre_tipo +'</h3>';
                }
            
                str += '<div>';
                str += '<p>'+ item.nombre_plato +'</p>';
                str += '<p>'+ item.precio_plato +'</p>';
                str += '</div>';

                if (item.nombre_tipo !== tipoAnterior) {
                    str += '</div>';
                }
                tipoAnterior = item.nombre_tipo;
            });

            infoPlato.innerHTML = str;

        } else {
            infoPlato.innerHTML = 'Error';
        }
    }
    ajax.send(formdata);
}

FiltrosRestaurantes();
ListarRestaurantes();
InformacionRestaurante();

document.addEventListener('DOMContentLoaded', function () {

});
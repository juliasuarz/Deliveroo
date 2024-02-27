var cantidadRestaurantes = "";

function FiltrosRestaurantes() {
    var filtrotipo = document.getElementById('desplegable2');

    var formdata = new FormData();

    var ajax = new XMLHttpRequest();

    ajax.open('POST', './proc/filtro-restaurantes.php');

    ajax.onload = function () {
        var str = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            str += '<div class="desplegador">';
            str += '<p>Platos</p>';
            str += '<i class="fa-solid fa-chevron-down"></i>';
            str += '</div>';
            str += '<div class="form-check">';
            str += '<input class="form-check-input" type="radio" name="tipo_comida" id="TodoTipos" value="">';
            str += '<label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="TodoTipos">Todos</label>';
            str += '</div>';

            json.forEach(function (item) { 
                str += '<div class="form-check">';
                str += '<input class="form-check-input" type="radio" name="tipo_comida" id="'+ item.nombre_tipo +'" value="'+ item.id_tipo +'">';
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

    var precio = document.querySelector('#desplegable1 .form-check-input:checked');
    var tipos_comida = document.querySelector('#desplegable2 .form-check-input:checked');
    var valoracion = document.querySelector('#desplegable3 .form-check-input:checked');

    var precio_selec = "";
    var valoracion_selec = "";
    tipo_comida_selec = "";

    if(precio != null) {
        precio_selec = precio.value;
    }

    if(valoracion != null) {
        valoracion_selec = valoracion.value;
    }

    if(tipos_comida != null) {
        tipo_comida_selec = tipos_comida.value;
    }
    
    var formdata = new FormData();

    formdata.append('tipo_comida_selec', tipo_comida_selec);
    formdata.append('precio_selec', precio_selec);
    formdata.append('valoracion_selec', valoracion_selec);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', './proc/listado-restaurantes.php');

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
                // str += '<p class="card-estrellas">Estrellas Rest</p>';
                if(item.precio_envio_rest != null && item.precio_envio_rest > 0) {
                    str += '<p class="card-dist">'+ item.precio_envio_rest +'€ Envio</p>';
                } else {
                    str += '<p class="card-dist">Envio Gratis</p>';
                }
                
                str += '</div>';
                str += '</a></div>';
            });

            restaurantes.innerHTML = str;
            numRestaurantes.innerHTML = cantidadRestaurantes + " Restaurantes";

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
    var descRest = document.querySelector('.content-restaurante .descripcion-rest');
    
    var formdata = new FormData();

    formdata.append('restauranteId', restauranteId);

    var ajax = new XMLHttpRequest();

    ajax.open('POST', './proc/informacion-restaurante.php');

    ajax.onload = function () {
        var str = "";
        var str2 = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            str += '<div class="img-rest">';
                str += '<a href="./index.php"><i class="fa-solid fa-arrow-left"></i> Atras</a>';
                str += '<div class="grid-info">';
                    str += '<div class="info-img">';
                        str += '<img class="img-info-rest" src="./img/'+ json.img_rest +'" alt="">';
                    str += '</div>';
                    str += '<div class="info-body">';
                        str += '<h1>'+ json.nombre_rest +'</h1>';
                        str += '<div id="RestTipoComida"></div>';
                        str += '<div id="RestValoracion">'
                        
                                str += '<div class="card-body">';
                                str += '<div class="row">';
                                str += '<div class="col-sm-4 text-center">';
                                str += '<h4 class="verde mt-3 mb-2">';
                                str += '<b><span id="average_rating">0.0</span> / 5</b>';
                                str += '</h4>';
                                str += '<div class="mb-3">';
                                str += '<i class="fas fa-star star-light mr-1 main_star"></i>';
                                str += '<i class="fas fa-star star-light mr-1 main_star"></i>';
                                str += '<i class="fas fa-star star-light mr-1 main_star"></i>';
                                str += '<i class="fas fa-star star-light mr-1 main_star"></i>';
                                str += '<i class="fas fa-star star-light mr-1 main_star"></i>';
                                str += '</div>';
                                str += '<h6><span id="total_review">0</span> Reseña/s</h6>';
                                str += '<button type="button" name="add_review" id="add_review" class="btn fondo-turquesa text-white">Pon tu Reseña</button>';
                                str += '</div>';
                                str += '<div class="col-sm-4">';
                                str += '<p>';
                                str += '<div class="progress-label-left"><b>5</b> <i class="fas fa-star verde"></i></div>';
                                str += '<div class="progress-label-right">(<span id="total_five_star_review">0</span>)</div>';
                                str += '<div class="progress">';
                                str += '<div class="progress-bar fondo-verde" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>';
                                str += '</div>';
                                str += '</p>';
                                str += '<p>';
                                str += '<div class="progress-label-left"><b>4</b> <i class="fas fa-star verde"></i></div>';
                                str += '<div class="progress-label-right">(<span id="total_four_star_review">0</span>)</div>';
                                str += '<div class="progress">';
                                str += '<div class="progress-bar fondo-verde" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>';
                                str += '</div>';
                                str += '</p>';
                                str += '<p>';
                                str += '<div class="progress-label-left"><b>3</b> <i class="fas fa-star verde"></i></div>';
                                str += '<div class="progress-label-right">(<span id="total_three_star_review">0</span>)</div>';
                                str += '<div class="progress">';
                                str += '<div class="progress-bar fondo-verde" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>';
                                str += '</div>';
                                str += '</p>';
                                str += '<p>';
                                str += '<div class="progress-label-left"><b>2</b> <i class="fas fa-star verde"></i></div>';
                                str += '<div class="progress-label-right">(<span id="total_two_star_review">0</span>)</div>';
                                str += '<div class="progress">';
                                str += '<div class="progress-bar fondo-verde" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>';
                                str += '</div>';
                                str += '</p>';
                                str += '<p>';
                                str += '<div class="progress-label-left"><b>1</b> <i class="fas fa-star verde"></i></div>';
                                str += '<div class="progress-label-right">(<span id="total_one_star_review">0</span>)</div>';
                                str += '<div class="progress">';
                                str += '<div class="progress-bar fondo-verde" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>';
                                str += '</div>';
                                str += '</p>';
                                str += '</div>';
                                str += '</div>';
                                str += '</div>';

                        str += '</div>';
                    str += '</div>';
                str += '</div>';
            str += '</div>';

            str2 += '<h5>Sobre ' + json.nombre_rest + '</h5>';
            str2 += '<p>' + json.descripcion_rest + '</p>';

            infoRest.innerHTML = str;
            descRest.innerHTML = str2;

            setTimeout(function() {
                var images = document.getElementsByClassName("img-info-rest");
                
                for (var i = 0; i < images.length; i++) {
                    var image = images[i];
                    
                    // Verificar si la imagen no se ha cargado correctamente
                    if (!image.complete || (image.naturalWidth === 0 && image.naturalHeight === 0)) {
                        // Cambiar la imagen a la predefinida
                        image.src = "./img/placeholder.png";
                    }
                }
            }, 300);

        } else {
            infoRest.innerHTML = 'Error';
            descRest.innerHTML = 'Error';
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

    ajax.open('POST', './proc/tipo-comida.php');

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

    ajax.open('POST', './proc/platos.php');

    ajax.onload = function () {
        var str = "";
        var tipoAnterior = "";

        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);

            json.forEach(function (item) {
                if (item.nombre_tipo !== tipoAnterior) {
                    str += '<div><h3>'+ item.nombre_tipo +'</h3>';
                    str += '<div class="grid-platos">';
                }
            
                str += '<div class="info-plato">';
                str += '<div>';
                str += '<p>'+ item.nombre_plato +'</p>';
                str += '<p>'+ item.precio_plato +' €</p>';
                str += '</div>';
                str += '<img class="img-info-plato" src="./img/'+ json.img_rest +'" alt="">';
                str += '</div>';


                if (item.nombre_tipo !== tipoAnterior) {
                    str += '</div>';
                    str += '</div>';
                }
                tipoAnterior = item.nombre_tipo;
            });

            infoPlato.innerHTML = str;

            
            setTimeout(function() {
                var images = document.getElementsByClassName("img-info-plato");
                
                for (var i = 0; i < images.length; i++) {
                    var image = images[i];
                    
                    // Verificar si la imagen no se ha cargado correctamente
                    if (!image.complete || (image.naturalWidth === 0 && image.naturalHeight === 0)) {
                        // Cambiar la imagen a la predefinida
                        image.src = "./img/placeholder.png";
                    }
                }
            }, 300);

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
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Multiple Item Product Carousel Bootstrap 3.3.7</title>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="css/style.less">
  <script src="https://kit.fontawesome.com/0506b368cf.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>

<body>
    <div class ="menu">
        <div class="navbar navbar-expand-lg ">
            <div class="navbar">
                <div class="container-fluid menu-p">
                    <div class="col col-logo">
                        <img class="logo-img" src="./img/deliveroo-logo.png" id="inicio">
                    </div>
                    <div>
                        <input class="buscador-inicio" placeholder="Search Carbon - Soho">
                    </div>
                    <div class="btn-menu">
                        <div>
                            <button class="opt">
                                <i class="fa-solid fa-basket-shopping"></i>
                                <span id="precio-cesta">0.00 €</span>
                            </button>
                        </div>
                        <div>
                            <button class="opt">
                                <i class="fa-solid fa-house"></i>
                                <span>Sign up or log in</span>
                            </button>                 
                        </div>
                        <div>
                            <button class="opt">
                                <i class="fa-solid fa-user"></i>
                                <span>Account</span>
                            </button>                 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content-inicio">
        <div class="col-opt">

            <div class="rest-actual">
                <img src="./img/foto-profile.jpg">
                <p id="nombre" class="nombre">St James's</p>
                <!-- ?????????? -->
                <a href="#">Change</a>
            </div>

            <div class="recogida">
                <fieldset id="recogida">
                    <input type="radio" id="recogida1" name="recogida" value="delivery">
                    <label for="recogida1">Delivery</label><br>
                    <input type="radio" id="recogida2" name="recogida" value="pickup">
                    <label for="recogida2">Pickup</label><br>
                </fieldset>
            </div>

            <div class="filtros filtros-tipo-dieta">
                <div class="desplegable" id="desplegable1">
                    <div class="desplegador">
                        <p>Precio</p>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio1" value="1,4">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio1">1.00€ - 3.99€</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio2" value="4,7">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio2">4.00€ - 6.99€</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio3" value="7,10">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio3">7.00€ - 9.99€</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio4" value="10,15">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio4">10.00€ - 14.99€</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio5" value="15,20">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio5">15.00€ - 19.99€</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio6" value="20,30">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio6">20.00€ - 29.99€</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="precio" id="precio7" value="30,99">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="precio7">+30.00€</label>
                    </div>
                </div>
            </div>

            <div class="filtros filtros-tipo-comida">
                <div class="desplegable" id="desplegable2">
                </div>
            </div>

            <div class="filtros filtros-tipo-dieta">
                <div class="desplegable" id="desplegable3">
                <div class="desplegador">
                        <p>Valoración</p>
                        <i class="fa-solid fa-chevron-down"></i>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion5" value="5">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="valoracion5">5 estrellas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion4" value="4">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="valoracion4">4 estrellas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion3" value="3">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="valoracion3">3 estrellas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion2" value="2">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="valoracion2">2 estrellas</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="valoracion" id="valoracion1" value="1">
                        <label class="form-check-label" onclick="setTimeout(ListarRestaurantes, 100)" for="valoracion1">1 estrella</label>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-results">
            <div class="btn-rest col-md-offset-1">
                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="90000" id="myCarousel">
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/burgers.png" class="img-responsive"></a>
                                <p>Burguers</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/chicken.png" class="img-responsive"></a>
                                <p>Burguers</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/chinese.png" class="img-responsive"></a>
                                <p>Burguers</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/flowers.png" class="img-responsive"></a>
                                <p>Burguers</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/grocery.png" class="img-responsive"></a>
                                <p>Burguers</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/pasta.png" class="img-responsive"></a>
                                <p>Burguers</p>
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/sushi.png" class="img-responsive"></a>
                                <p>Burguers</p>        
                            </div>
                        </div>
                        <div class="item">
                            <div class="col-md-2 col-sm-6 col-xs-12"><a href="#"><img src="./img/pizza.png" class="img-responsive"></a>
                                <p>Burguers</p>        
                            </div>
                        </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
            </div>
        </div>

        <div class="resultado_filtro">
            <div id="desfiltrar">

            </div>
            <div id="num_restaurantes">

            </div>
        </div>

        <div class="restaurantes" id="restaurantes">
            <!-- Insercion de restaurantes por AJAX -->
        </div>
    </div>
</div>


    <script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <script src="js/script.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>

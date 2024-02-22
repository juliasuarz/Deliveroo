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
                <p>Dietas</p>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Gluten Free
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Halal
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Vegan Friendly
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Vegetarian
                </label>
            </div>
        </div>
    </div>
    <div class="filtros filtros-tipo-comida">
        <div class="desplegable" id="desplegable2">
            <div class="desplegador">
                <p>Platos</p>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Hamburguesa
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Cafe
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Postre
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Zumos
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Fideos
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Ensaladas
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" >
                <label class="form-check-label" for="flexCheckChecked">
                    Pizzas
                </label>
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
    <div class="restaurantes">
        <div class="card" >
        <img src="./img/rest.jpeg" class="card-img-top" alt="...">
        <p class="tag-bg-white">Spend 10€</p>
        <p class="tag-bg-red">Get 25€ off</p>
        <p class="tag-tiempo">Ready in <strong>15 min</strong></p>
        <div class="card-body">
            <h5 class="card-nombre">Nombre Rest</h5>
            <p class="card-estrellas">Estrellas Rest</p>
            <p class="card-dist">Distancia Rest</p>
        </div>
        </div>
        <div class="card" >
        <img src="./img/rest4.jpeg" class="card-img-top" alt="...">
        <p class="tag-bg-white">Spend 10€</p>
        <p class="tag-bg-red">Get 25€ off</p>
        <p class="tag-tiempo">Ready in <strong>15 min</strong></p>
        <div class="card-body">
            <h5 class="card-nombre">Nombre Rest</h5>
            <p class="card-estrellas">Estrellas Rest</p>
            <p class="card-dist">Distancia Rest</p>
        </div>
        </div>
        <div class="card">
        <img src="./img/rest2.jpeg" class="card-img-top" alt="...">
        <p class="tag-bg-white">Spend 10€</p>
        <p class="tag-bg-red">Get 25€ off</p>
        <p class="tag-tiempo">Ready in <strong>15 min</strong></p>
        <div class="card-body">
            <h5 class="card-nombre">Nombre Rest</h5>
            <p class="card-estrellas">Estrellas Rest</p>
            <p class="card-dist">Distancia Rest</p>
        </div>
        </div>
        <div class="card">
        <img src="./img/rest3.jpeg" class="card-img-top" alt="...">
        <p class="tag-bg-white">Spend 10€</p>
        <p class="tag-bg-red">Get 25€ off</p>
        <p class="tag-tiempo">Ready in <strong>15 min</strong></p>
        <div class="card-body">
            <h5 class="card-nombre">Nombre Rest</h5>
            <p class="card-estrellas">Estrellas Rest</p>
            <p class="card-dist">Distancia Rest</p>

        </div>
        </div>
    </div>
</div>
</div>


  <script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
  <script src="js/script.js"></script>
</body>
</html>

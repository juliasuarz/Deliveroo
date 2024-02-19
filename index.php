<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="styles.less" rel="stylesheet">
    <title>Document</title>
    <script src="https://kit.fontawesome.com/0506b368cf.js" crossorigin="anonymous"></script>

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
    <div class="content">
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
                <div class="desplegable" id="desplegable">
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
            <div class="filtros filtros-tipo-comida">
                <p>Platos</p>
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
    <script href="script.js"></script>
</body>
</html>
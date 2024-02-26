<?php
if(!isset($_GET["restaurante"])) {
    header("location: index.php");
}
?>

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

    <div class="content-restaurante">
        <div class="informacion-restaurante">

        </div>

        <div class="nav-comida">

        </div>

        <div class="informacion-platos">

        </div>
    </div>

    <script src='https://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
    <script src="js/script.js"></script>
    <script src="js/ajax.js"></script>
</body>
</html>
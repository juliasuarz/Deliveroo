<?php
// Recuperar SESSION del login
session_start();

if(isset($_SESSION['id_user'])) {
    $userID = $_SESSION['id_user'];
    // Conexión a la BBDD
    include_once("./sql/conexion.php");
    $pdo = conectar();

    // Verificar el tipo de usuario
    $query = "SELECT tipo_usu FROM usuarios WHERE id_usu = :userID";
    $statement = $pdo->prepare($query);
    $statement->execute(array(':userID' => $userID));
    $userData = $statement->fetch(PDO::FETCH_ASSOC);
    $userType = $userData['tipo_usu'];

    // Verificar si el usuario es administrador
    $isAdmin = ($userType === 'Admin');
} else {
    // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Multiple Item Product Carousel Bootstrap 3.3.7</title>
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel="stylesheet" href="style.less">
  <script src="https://kit.fontawesome.com/0506b368cf.js" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="owlcarousel/owl.carousel.min.css">
  <link rel="stylesheet" href="owlcarousel/owl.theme.default.min.css">
</head>

<body>
    <div class ="menu menu-negro" >
        <div class="navbar navbar-expand-lg ">
            <div class="navbar">
                <div class="container-fluid menu-p">
                    <div class="col col-logo">
                        <img class="logo-img" src="./img/deliveroo-logo.png" id="inicio">
                    </div>
                    <!-- <div>
                        <input class="buscador-inicio" placeholder="Search Carbon - Soho">
                    </div> -->
                    <div class="btn-menu navbar-right nav navbar-nav navbar-right">
                        <div class="dropdown">
                            <button class=" opt btn-secondary " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Partner with us</button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="#">Riders</a>
                                <a class="dropdown-item" href="#">Partners</a>
                                <a class="dropdown-item" href="#">Careers</a>
                                <a class="dropdown-item" href="#">Deliveroo for Work</a>
                            </div>
                        </div>
                        <div>
                            <?php if ($isAdmin): ?>
                                <button class="opt">
                                    <a href="crud.php">
                                        <i class="fa-solid fa-boxes"></i>
                                        <span>CRUD Admin</span>
                                    </a>
                                </button>  
                            <?php endif; ?>
                        </div>
                        <div>
                            <button class="opt">
                                <a href="./perfil/perfil.php" >
                                    <i class="fa-solid fa-user"></i>
                                    <span>Account</span>
                                </a>
                            </button>
                        </div>
                        <div>
                            <form action="cerrar_sesion.php" method="post">
                                <input class="opt" type="submit" value="Cerrar Sesión">
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
<!-- FINAL HEADER -->
<div class="region-header">
    <div class="title-header">
        <h1>Restaurant food, takeaway and groceries. Delivered.</h1>
    </div>
    <div class="container-header">
        <p>Enter a postcode to see what we deliver</p>
        <div class="container-search">
            <!-- Search form -->
            <form action="index.php">
            <div class="input-group search-principal">
                <input type="search" class="form-control rounded " placeholder="" aria-label="Search" aria-describedby="search-addon" />
                <button type="submit" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
            </div>
            </form>
        </div>
            <p><a href="/login?redirect=/" class="ccl-1a33e022806c6849">Log in</a> for your recent addresses.</p>    
        </div>
</div>

<div class="region-carrousell">
    <div class="container p-5 container-carrousell">
        <div class="owl-carousel">

            <div> <img src="img/carrousel/icon-donut.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/wagamama.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/fiveguys.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/chicken-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/pizza-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/icon-vegan.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/hop.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/bowl-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/thai-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/icon-pizza.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/waitrose.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/icon-wine.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/sushi-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/curry-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/nandos.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/dessert-wide.png" alt="" class="img-gran"> </div>
        </div>
    </div>
    <div class="container p-5 container-carrousell">
        <div class="owl-carousel">

            <div> <img src="img/carrousel/bowl-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/thai-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/icon-pizza.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/waitrose.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/icon-wine.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/sushi-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/curry-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/nandos.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/dessert-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/icon-donut.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/wagamama.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/fiveguys.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/chicken-wide.png" alt="" class="img-gran"> </div>
            
            <div> <img src="img/carrousel/pizza-wide.png" alt="" class="img-gran"> </div>

            <div> <img src="img/carrousel/icon-vegan.png" alt="" class="img-peq"> </div>

            <div> <img src="img/carrousel/hop.png" alt="" class="img-peq"> </div>
        </div>
    </div>
</div>

<div class="region-mapa">
    <div class="container-trackorders">
        <div class="track-order">
            <h2>
                Track orders to your door
            </h2>
            <p>Get your favourite food delivered in a flash. You’ll see when your rider’s picked up your order, and be able to follow them along the way. You’ll get a notification when they’re nearby, too.</p>
            <img src="img/iconos.svg" alt="">
        </div>

        <div class="imagenes-track">
            <img src="img/mapa.png" alt="" class="img-mapa">
            <img src="img/notification.webp" alt="" class="img-noti">
        </div>

    </div>

</div>

<div class="region-mealdeals">
    <div class="container-mealdeals">
        <div class="title-meal">
            <img src="img/strellas-izquierda.svg" alt="">
            <h2>Up to 25% off - Meal Deals</h2>
            <img src="img/strellas_derecha.svg" alt="">
        </div>
        <p class="text-1">Need a midweek pick-me-up, a break from cooking for the family or just fancy your favourite restaurant?</p>
        <p class="text-2">Service and delivery fees, subject to availability. Participating restaurants only. T&amp;Cs apply.<!-- -->&nbsp;<a href="/terms" class="MerchBlock-ce9e7ed87511fd8f">Terms.</a></p>
        <div class="img-footer">
            <img src="img/footer-deals.svg" alt="">
        </div>
    </div>

</div>

<div class="region-cards">
    <div class="container-cards">
        <div class="card" style="background-image: url('img/card-restaurante.png');">
            <div class="container-text">
                <div class="text-cards">
                    <h2>Partner with us</h2>
                    <p>Join Deliveroo and reach more customers than ever. We handle delivery, so you can focus on the food.</p>
                    <a>Get started</a>
                </div>
            </div>
        </div>
        <div class="card" style="background-image: url('img/card-rider.png');">
            <div class="container-text">
                <div class="text-cards">
                    <h2>Partner with us</h2>
                    <p>Join Deliveroo and reach more customers than ever. We handle delivery, so you can focus on the food.</p>
                    <a>Get started</a>
                </div>
            </div>
        </div>
        <div class="card" style="background-image: url('img/card-yogur.png');">
            <div class="container-text">
                <div class="text-cards">
                    <h2>Partner with us</h2>
                    <p>Join Deliveroo and reach more customers than ever. We handle delivery, so you can focus on the food.</p>
                    <a>Get started</a>
                </div>
            </div>
        </div>
        <div class="card" style="background-image: url('img/card-giftcardhero.png');">
            <div class="container-text">
                <div class="text-cards">
                    <h2>Partner with us</h2>
                    <p>Join Deliveroo and reach more customers than ever. We handle delivery, so you can focus on the food.</p>
                    <a>Get started</a>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- FOOTER -->
<div style="color:white; font-family: plex-sans,sans-serif; display: block;">
    <footer style="background-color: rgb(46, 51, 51);">
        <div style="width:100%; padding: 16px; overflow: hidden;">
            <nav style="display: flex; margin-top:30px; justify-content:center">
                <div style="background-color: rgb(67, 72, 72); width: 20%; padding:24px">
                    <!-- div de Discover Deliveroo -->
                    <h3 style="padding-left: 20px;">Discover Deliveroo</h3>
                    <ul style="list-style-type: none;">
                        <li><p>Investors</p></li>
                        <li><p>About us</p></li>
                        <li><p>Takeaway</p></li>
                        <li><p>More</p></li>
                        <li><p>Newsroom</p></li>
                        <li><p>Engineering blog</p></li>
                        <li><p>Design blog</p></li>
                        <li><p>Gift Cards</p></li>
                        <li><p>Deliveroo Students</p></li>
                        <li><p>Careers</p></li>
                        <li><p>Restaurant signup</p></li>
                        <li><p>Become a rider</p></li>
                    </ul>
                </div>
                <div style="background-color: rgb(67, 72, 72); width:20%; margin-left: 16px; padding:24px">
                    <!-- div de Legal -->
                    <h3 style="padding-left: 20px;">Legal</h3>
                    <ul style="list-style-type: none;">
                        <li><p>Terms and conditions</p></li>
                        <li><p>Privacy</p></li>
                        <li><p>Cookies</p></li>
                        <li><p>Modern Slavery Statement</p></li>
                        <li><p>Tax Strategy</p></li>
                        <li><p>Section 172 Statement</p></li>
                        <li><p>Public Authority Requests</p></li>
                    </ul>
                </div>
                <div style="background-color: rgb(67, 72, 72); width:20%; margin-left:16px; padding:24px">
                    <!-- div de Help -->
                    <h3 style="padding-left: 20px;">Help</h3>
                    <ul style="list-style-type: none;">
                        <li><p>Contact</p></li>
                        <li><p>FAQs</p></li>
                        <li><p>Cuisines</p></li>
                        <li><p>Brands</p></li>
                    </ul>
                </div>
                <div style="background-color: rgb(67, 72, 72); width:20%; margin-left:16px; padding:24px">
                    <!-- div de Help -->
                    <h3 style="padding-left: 20px;">Take Deliveroo with you</h3>
                    <ul style="list-style-type: none;">
                        <li><img src="./img/logoGoogle.png"></li>
                        <li><img src="./img/logostore.png"></li>
                    </ul>
                </div>
            </nav>
            <nav style="padding-top:16px; display: flex; justify-content: space-between;">
                <div style="display: flex; align-items: center; padding-left:130px; padding-bottom:10px">
                    <!-- Redes sociales -->
                    <i class="fa-brands fa-facebook" style="font-size:24px"></i>
                    <i class="fa-brands fa-twitter" style="padding-left: 8px; font-size:24px"></i>
                    <i class="fa-brands fa-instagram" style="padding-left: 8px; font-size:24px"></i>
                </div>
                <!-- Texto de copyright -->
                <p  style="font-size:14px;padding-right:125px; color:rgb(88, 92, 92); padding-bottom:10px">© 2024 Deliveroo</p>
            </nav>
        </div>
    </footer>   
</div>
<script src="owlcarousel/jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>


<script>

    $(window).on('load', function() {
        $('.owl-carousel').owlCarousel({
            center: true,
            items: 3,
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            autoplay: true,
            slideTransition: 'linear',
            autoplayTimeout: 6000,
            autoplaySpeed: 6000,
            autoplayHoverPause: true,
            mouseDrag: false, 
            touchDrag: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });
    });


    </script>
</body>
</html>

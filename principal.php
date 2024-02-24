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
<!-- FINAL HEADER -->
<div class="region-header">
    <div class="title-header">
        <h1>Restaurant food, takeaway and groceries. Delivered.</h1>
    </div>
    <div class="container-header">
        <p>Enter a postcode to see what we deliver</p>
        <div class="container-search">
            <!-- Search form -->
            <div class="input-group search-principal">
                <input type="search" class="form-control rounded " placeholder="" aria-label="Search" aria-describedby="search-addon" />
                <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init>Search</button>
            </div>
        </div>
            <p><a href="/login?redirect=/" class="ccl-1a33e022806c6849">Log in</a> for your recent addresses.</p>    
        </div>
</div>
<div class="region-carrousell">
    <div class="container p-5">

        <div class="owl-carousel">

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

            <div> <img src="img/burger.webp" alt=""> </div>

        </div>

    </div>

</div>

<script src="owlcarousel/jquery.min.js"></script>
<script src="owlcarousel/owl.carousel.js"></script>
<script src="owlcarousel/owl.carousel.min.js"></script>


<script>

        $(document).ready(function () {

            $('.owl-carousel').owlCarousel({

                loop: true,

                autoplay: true,

                autoplayTimeout: 1000,

                margin: 20,

                lazyLoad: true,

                nav: true, // if you follow the step no. 5 then only include this

                navText: ["<button class='text-center btn btn-outline-info btn-sm'><</button>", "<button class='text-center btn btn-outline-info btn-sm'>></button>"], // if you follow the step no. 5 then only include this

                autoplayHoverPause: true,

                responsive: {

                    0: {

                        items: 1

                    },

                    600: {

                        items: 2

                    },

                    1000: {

                        items: 3

                    }

                }

            });

        });

    </script>
</body>
</html>

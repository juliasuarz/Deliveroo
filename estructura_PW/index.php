<?php
    // en esta parte iria la SESSION y conexión a la BBDD
    // Si no tiene la SESSION (no se ha logeado y/o registrado) al intentar 
    // utilizar cualquier filtro, búsqueda, acceso a un restaurante de la página, etc.,
    // le tendría que aparecer un SWEET ALERT de que necesita estar logeado. para utilizar las funciones de la página
    // Si está logeado no salta el SWEET ALERT y permite realizar la función que haya intentado usar
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- ENLACE AL SCRIPT JS EXTERNO -->
    <!-- OPCIONAL ENLACE ESTILOS BOOTSTRAP -->
    <!-- ENLACE ESTILOS LESS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body style="margin: 0;">
    <!-- div de todo el body -->
    <div>
        <!-- div del HEADER -->
        <div>
            <!-- div que contendrá una imagen de fondo -->
            <div>
                <!-- div con logo y botones principales -->
                <div>
                    <!-- etiqueta <a> (donde irá el logo) -->
                    <!-- etiqueta <div> donde irá los botones de Loggin y Account/Cuenta (saldrá tu información personal) -->
                </div>
                <!-- div donde irá una breve descripción a modo de titulo junto con el buscador y filtros -->
                <div>
                    <div>
                        <!-- etiqueta <h1> que será el título o descripción breve y concisa -->
                    </div>
                    <div>
                        <div>
                            <!-- label del buscador -->
                        </div>
                        <div>
                            <!-- filtros -->
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <!-- div con carrusel en movimiento de imagenes de los restaurantes que tenemos -->
            </div>
        </div>
        <!-- PARTE PRINCIPAL -->
        <div>
            <div>
                <!-- div con los restaurantes que hay en nuestra BBDD; se irán mostrando según la búsqueda/filtros -->
            </div>
        </div>
        <!-- FOOTER -->
        <div style="color:white; font-family: plex-sans,sans-serif; display: block;">
            <footer style="background-color: rgb(46, 51, 51);">
                <div style="width:100%; padding: 16px; overflow: hidden;">
                    <nav style="display: flex; margin-top:30px; justify-content:center">
                        <div style="background-color: rgb(67, 72, 72); width: 20%; padding:24px">
                            <!-- div de Discover Deliveroo -->
                            <h3 style="padding-left: 40px;">Discover Deliveroo</h3>
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
                            <h3 style="padding-left: 40px;">Legal</h3>
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
                            <h3 style="padding-left: 40px;">Help</h3>
                            <ul style="list-style-type: none;">
                                <li><p>Contact</p></li>
                                <li><p>FAQs</p></li>
                                <li><p>Cuisines</p></li>
                                <li><p>Brands</p></li>
                            </ul>
                        </div>
                    </nav>
                    <nav style="padding-top:16px; display: flex; justify-content: space-between;">
                        <div style="display: flex; align-items: center; padding-left:290px; padding-bottom:10px">
                            <!-- Redes sociales -->
                            <i class="bi bi-facebook" style="font-size:24px"></i>
                            <i class="bi bi-twitter" style="padding-left: 8px; font-size:24px"></i>
                            <i class="bi bi-instagram" style="padding-left: 8px; font-size:24px"></i>
                        </div>
                        <!-- Texto de copyright -->
                        <p style="padding-right:290px; color:rgb(88, 92, 92); padding-bottom:10px">© 2024 Deliveroo</p>
                    </nav>
                </div>
            </footer>   
        </div>
    </div>
</body>
</html>
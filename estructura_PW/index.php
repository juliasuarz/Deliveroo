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
</head>
<body>
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
        <div>
            <footer>
                <div>
                    <nav>
                        <div>
                            <!-- div de Discover Deliveroo -->
                        </div>
                        <div>
                            <!-- div de Legal -->
                        </div>
                        <div>
                            <!-- div de Help -->
                        </div>
                    </nav>
                    <nav>
                        <!-- etiqueta <ul> que contiene las redes sociales y formas de contactar -->
                        <!-- etiqueta <p> que contiene el texto de Copyright -->
                    </nav>
                </div>
            </footer>   
        </div>
    </div>
</body>
</html>
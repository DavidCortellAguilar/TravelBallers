<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('configuracion.php');
include_once('config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>

    <!-- Enlaces a Bootstrap y jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"  crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- CSS personalizado -->
    <script src="./js/scroll.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <span class="ir-arriba"><img style="width: 60px" src="./img/arriba.png"></span>
    <div class="fondo1">
        <?php echo $nav ?>
        <div id="myCarousel" class="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
                <li data-target="#myCarousel" data-slide-to="4"></li>
                <li data-target="#myCarousel" data-slide-to="5"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./img/slogan.png" alt="1">
                </div>
                <div class="carousel-item">
                    <img src="./img/slogan2.png" alt="2">
                </div>
                <div class="carousel-item">
                    <img src="./img/slogan3.png" alt="3">
                </div>
                <div class="carousel-item">
                    <img src="./img/slogan4.png" alt="4">
                </div>
                <div class="carousel-item">
                    <img src="./img/slogan5.png" alt="5">
                </div>
                <div class="carousel-item">
                    <img src="./img/slogan6.png" alt="6">
                </div>
            </div>
        </div>
    </div>
    <div class="fondo2">
    <div class="container col-xxl-8 px-4 py-5">
        <div style="margin-top: 7%;" class="row">
            <div style="margin-bottom: 15px;">
                <img style="text-align: center; width:120%" src="./img/quienes.png" alt="Quienes somos">
            </div>
            <p style="text-align: justify; color: white;" class="lead">
                Travel Ballers es una empresa comprometida con inspirar a los jóvenes a perseguir sus sueños y alcanzar su máximo potencial, tanto dentro como fuera de la cancha. Nos dedicamos a apoyar a jugadores de baloncesto españoles con talento, brindándoles la oportunidad de continuar su carrera deportiva mientras avanzan en sus estudios en instituciones educativas de alto nivel en Estados Unidos, como High Schools y Universidades. Creemos firmemente que combinar una sólida educación con la pasión por el baloncesto es fundamental para formar personas integrales y abrirles las puertas a un futuro brillante.
                <br><br>En Travel Ballers, creemos que el baloncesto es mucho más que un deporte; es una herramienta poderosa para construir carácter, disciplina, y valores de superación personal. Ayudamos a jóvenes promesas a encontrar un camino que les permita vivir de su pasión, con el respaldo de una educación de calidad que asegure un futuro lleno de oportunidades. Nuestra misión es guiar a estos atletas y ofrecerles todas las herramientas posibles para que alcancen sus metas deportivas y académicas en el exigente panorama del baloncesto estadounidense, en donde el esfuerzo y la dedicación son recompensados.
                <br><br>Gracias a nuestra experiencia y red de contactos en el mundo del baloncesto en Estados Unidos, desde entrenadores y agentes hasta instituciones académicas, trabajamos para que cada joven tenga la oportunidad de demostrar su talento en un entorno de alto rendimiento. Creemos en el potencial de cada uno de nuestros jugadores y en su capacidad para brillar y sobresalir. Nos aseguramos de que cada paso que den esté respaldado por el soporte que necesitan para adaptarse a nuevos desafíos, aprender de cada experiencia y aprovechar al máximo las oportunidades que les brinda su viaje en el deporte y en la vida.
                <br><br>En resumen, en Travel Ballers nos dedicamos a mucho más que a conseguir becas; estamos aquí para formar líderes, personas seguras de sí mismas, con objetivos claros y herramientas para alcanzarlos. Porque, al final, nuestro compromiso es ayudar a construir un futuro mejor para cada jugador, dentro y fuera de la cancha, donde el baloncesto se convierte en el puente hacia una vida de éxitos.
            </p>
        </div>
    </div>
</div>

    <div class="fondo3">
        
    </div>
    <div class="fondo4">
        <div style="text-align:center;padding-top:10px"><img style="width:60%" src="./img/equipos.png"></div>
        <div style="width: 90%; color:black; margin-left: 5%;"><hr></div>
        <div class="slider">
            <div class="slide-track">
                <!-- Primera copia de las imágenes -->
                <div class="slide"><img src="./img/1.png" alt=""></div>
                <div class="slide"><img src="./img/2.png" alt=""></div>
                <div class="slide"><img src="./img/3.png" alt=""></div>
                <div class="slide"><img src="./img/4.png" alt=""></div>
                <div class="slide"><img src="./img/5.png" alt=""></div>
                <div class="slide"><img src="./img/6.png" alt=""></div>
                <div class="slide"><img src="./img/7.png" alt=""></div>

                <!-- Segunda copia de las imágenes -->
                <div class="slide"><img src="./img/1.png" alt=""></div>
                <div class="slide"><img src="./img/2.png" alt=""></div>
                <div class="slide"><img src="./img/3.png" alt=""></div>
                <div class="slide"><img src="./img/4.png" alt=""></div>
                <div class="slide"><img src="./img/5.png" alt=""></div>
                <div class="slide"><img src="./img/6.png" alt=""></div>
                <div class="slide"><img src="./img/7.png" alt=""></div>

                <!-- Tercera copia de las imágenes -->
                <div class="slide"><img src="./img/1.png" alt=""></div>
                <div class="slide"><img src="./img/2.png" alt=""></div>
                <div class="slide"><img src="./img/3.png" alt=""></div>
                <div class="slide"><img src="./img/4.png" alt=""></div>
                <div class="slide"><img src="./img/5.png" alt=""></div>
                <div class="slide"><img src="./img/6.png" alt=""></div>
                <div class="slide"><img src="./img/7.png" alt=""></div>

                <!-- Cuarta copia de las imágenes -->
                <div class="slide"><img src="./img/1.png" alt=""></div>
                <div class="slide"><img src="./img/2.png" alt=""></div>
                <div class="slide"><img src="./img/3.png" alt=""></div>
                <div class="slide"><img src="./img/4.png" alt=""></div>
                <div class="slide"><img src="./img/5.png" alt=""></div>
                <div class="slide"><img src="./img/6.png" alt=""></div>
                <div class="slide"><img src="./img/7.png" alt=""></div>
            </div>
        </div>

        <div style="width: 90%; color:black; margin-left: 5%; margin-bottom: 3rem;"><hr></div>
        <?php echo $footer?>
    </div>
</body>
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<script>
const carousel = document.querySelector('#myCarousel');
const indicators = carousel.querySelectorAll('.carousel-indicators li');
const slides = carousel.querySelectorAll('.carousel-item');
let currentSlide = 0;

function setSlide(index) {
    slides[currentSlide].classList.remove('active');
    indicators[currentSlide].classList.remove('active');
    currentSlide = index;
    slides[currentSlide].classList.add('active');
    indicators[currentSlide].classList.add('active');
}

// Cambio de diapositiva automático
setInterval(() => {
    const nextIndex = (currentSlide + 1) % slides.length;
    setSlide(nextIndex);
}, 5000);

// Cambiar de diapositiva con los indicadores
indicators.forEach((indicator, index) => {
    indicator.addEventListener('click', () => setSlide(index));
});

</script>
</html>
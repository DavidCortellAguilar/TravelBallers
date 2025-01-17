<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('configuracion.php');
include_once('config.php');

$sql = "SELECT ID_Equipamiento, Nombre_Equipamiento, Tipo_Equipamiento, Precio_Equipamiento, Marca_Equipamiento, Descripcion_Equipamiento, Descuento_Precio, Imagen_Equipamiento FROM equipamiento";
$result = $conn->query($sql);

$tabla = "<div class='container mt-4'><div class='row justify-content-center'>"; // Inicio del contenedor y fila
if ($result->num_rows > 0) {    
    $count = 0;
    // Generar las filas dentro del bucle
    while ($row = $result->fetch_assoc()) {
        if ($count == 4) break;
        $tabla .= "
            <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-stretch'>
                <div class='card shadow-sm' style='border-radius: 20px; max-width: 100%;'>
                    <img src='./" . $row["Imagen_Equipamiento"] . "' alt='Imagen de " . $row["Imagen_Equipamiento"] . "' class='img-fluid img' style='max-height: 200px; object-fit: contain; border-radius:20px;'>
                    <div class='card-body' style='background-color:rgb(227, 227, 227); border-radius: 0 0 20px 20px;'>
                        <h5 class='card-title'>" . $row['Nombre_Equipamiento'] . "</h5>
                        <p>" . $row['Tipo_Equipamiento'] . "</p>
                        <p>" . $row['Marca_Equipamiento'] . "</p>
                        <div style='margin-top: 0px;' class='d-flex justify-content-between align-items-center mt-3'>
                            <a class='btn btn-primary' href='./equipamiento.php'>Ver más</a>
                        </div>
                    </div>
                </div>
            </div>
        ";
        $count++;
    }
}
$tabla .= "</div></div>"; // Cerrar el contenedor y la fila
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

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
    <link rel="stylesheet" href="./css/style-copy.css">

    <style>
        .card {
            width: 18rem;
            height: 100%;
        }
        .card .img {
            height: 200px;
            object-fit: cover;
        }
    </style>
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
    
    
        <div class="container col-xxl-8 px-4 py-5">
            <div style="margin-top: 7%;" class="row">
                <div style="margin-bottom: 15px;">
                    <img style="text-align: center; width:100%" src="./img/quienes.png" alt="Quienes somos">
                </div>
                <p class="lead">
                    Travel Ballers es una empresa dedicada a inspirar a jóvenes jugadores de baloncesto españoles a perseguir sus sueños, combinando su pasión por el deporte con una educación de calidad en Estados Unidos. Ayudamos a estas promesas del baloncesto a conseguir becas en High Schools o Universidades, ofreciendo nuestro apoyo para alcanzar sus metas deportivas y académicas.
                </p>
                <p class="lead">
                Creemos que el baloncesto es más que un deporte: es una herramienta para formar carácter, disciplina y valores. Con nuestra experiencia y red de contactos, guiamos a cada jugador en su camino, asegurándonos de que aprovechen al máximo las oportunidades en el exigente panorama del baloncesto estadounidense.
                </p>
                <p class="lead">
                En resumen, en Travel Ballers nos dedicamos a mucho más que a conseguir becas; estamos aquí para formar líderes, personas seguras de sí mismas, con objetivos claros y herramientas para alcanzarlos. Porque, al final, nuestro compromiso es ayudar a construir un futuro mejor para cada jugador, dentro y fuera de la cancha, donde el baloncesto se convierte en el puente hacia una vida de éxitos. 
                </p>
            </div>
        </div>

        <div style="margin-bottom: 15px;padding-top: 4%;">
            <img style="text-align: center; width:70%; margin-left: 15%;" src="./img/tienda.png" alt="Tienda">
        </div>
        <?php echo $tabla ?>
        <div style="text-align:center;padding-top: 4%;padding-bottom:4%">
            <a class='btn btn-primary' href='./equipamiento.php'><b style="font-size:large">Más Productos</b></a>
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
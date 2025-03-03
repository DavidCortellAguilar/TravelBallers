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
    <title>Contacta</title>

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
        <main>
            <!-- Sección Hero -->
            <section id="hero">
                <div class="hero-content">
                    <h1>Vive la experiencia del mejor Campus de Baloncesto</h1>
                    <p>Mejora tus habilidades con entrenadores profesionales y jugadores de élite.</p>
                    <a href="#pricing" class="btn btn-primary">Inscríbete Ahora</a>
                </div>
            </section>

            <!-- Sección de INFO -->
            <section class="info-section">
                <div class="mar-container2">
                    <p id="Descubrelo" class="btn-border">Nosotros</p>
                </div>
                <h2>Baloncesto es nuestro deporte</h2>
                <div class="info-container">
                    <div class="info-box">
                        <h1>01</h1>
                        <h3>ENTRENAMIENTOS ESPECÍFICOS</h3>
                        <p>Trabajaremos el aprendizaje de diferentes fundamentos técnicos que completaremos con diferentes tipos de competiciones.</p>
                    </div>
                    <div class="info-box">
                        <h1>02</h1>
                        <h3>ELIGE ENTRE VARIAS SEDES</h3>
                        <p>Sedes repartidas por todo el territorio nacional.</p>
                    </div>
                    <div class="info-box">
                        <h1>03</h1>
                        <h3>HÁBITOS SALUDABLES</h3>
                        <p>Se fomentarán hábitos de vida saludable como la actividad física, la alimentación equilibrada y el descanso entre otros.</p>
                    </div>
                    <div class="info-box">
                        <h1>04</h1>
                        <h3>MÁS DE 12 AÑOS DE EXPERIENCIA</h3>
                        <p>Altísimo nivel de fidelización que avala el grado de satisfacción de las miles de familias.</p>
                    </div>
                </div>
            </section>


            <!-- Sección de Entrenamientos -->
            <section id="entrenamientos" style="margin-top: 5rem; margin-bottom: 5rem;">
                <div class="mar-container2">
                    <p style="margin-right: 75%;" id="Descubrelo" class="btn-border-claro">Entrenamientos</p>
                </div>
                <h2>Entrenamientos de Alto Nivel</h2>
                <div class="entrenamientos-grid">
                    <div class="entrenamiento">
                        <h3>Técnica Individual</h3>
                        <p>Desarrolla tu dribbling, tiro y defensa con entrenadores especializados.</p>
                    </div>
                    <div class="entrenamiento">
                        <h3>Juego en Equipo</h3>
                        <p>Aprende a trabajar en equipo y mejora tu toma de decisiones en la cancha.</p>
                    </div>
                    <div class="entrenamiento">
                        <h3>Preparación Física</h3>
                        <p>Sesiones de entrenamiento físico para mejorar tu resistencia y fuerza.</p>
                    </div>
                </div>
            </section>

            <!-- Sección de Inscripción -->
            <section class="pricing" id="pricing">
                <div class="mar-container2">
                    <p id="Descubrelo" class="btn-border">Planes</p>
                </div>
                <h2>Elige tu Plan</h2>
                <div class="pricing-container">

                    <!-- Plan Básico -->
                    <div class="plan">
                        <h3>Mañanas</h3>
                        <p class="price">99.99€</p>
                        <ul>
                            <li>✅ 100 Plazas</li>
                            <li>✅ Horario:  9:00 - 13:00</li>
                            <li>✅ Charlas con jugadores</li>
                            <li>❌ Comida incluida</li>
                        </ul>
                        <a href="" class="btn btn-primary">Contratar</a>
                    </div>

                    <!-- Plan Pro -->
                    <div class="plan destacado">
                        <h3>Interno</h3>
                        <p class="price">149.99€</p>
                        <ul>
                            <li>✅ 50 Plazas</li>
                            <li>✅ Experiencia dia completo</li>
                            <li>✅ Charlas con jugadores</li>
                            <li>✅ Comida incluida</li>
                        </ul>
                        <a href="" class="btn btn-primary">Contratar</a>
                    </div>

                    <!-- Plan Premium -->
                    <div class="plan">
                        <h3>Tardes</h3>
                        <p class="price">99.90€</p>
                        <ul>
                            <li>✅ 100 Plazas</li>
                            <li>✅ Horario:  17:00 - 21:00</li>
                            <li>✅ Charlas con jugadores</li>
                            <li>❌ Comida incluida</li>
                        </ul>
                        <a href="" class="btn btn-primary">Contratar</a>
                    </div>
                </div>
            </section>

            <!-- Sección de Sedes -->
            <section id="sedes" style="margin-top: 5rem; margin-bottom: 5rem;">
                <div class="mar-container2">
                    <p id="Descubrelo" class="btn-border-claro">Sedes</p>
                </div>
                <h2>Sedes Disponibles</h2>
                <div class="sedes-grid">
                    <div class="sede">
                        <img src="./img/pabellon-alcobendas.jpg" alt="Madrid">
                        <h3>Madrid</h3>
                        <p>Del 1 al 7 de julio - Pabellón Municipal de Alcobendas</p>
                    </div>
                    <div class="sede">
                        <img src="./img/pabellon-badalona.jpg" alt="Barcelona">
                        <h3>Barcelona</h3>
                        <p>Del 16 al 22 de julio - Pabellón Municipal de Badalona</p>
                    </div>
                    <div class="sede">
                        <img src="./img/pabellon-godella.jpg" alt="Valencia">
                        <h3>Valencia</h3>
                        <p>Del 1 al 7 de agosto - Pabellón Municipal de Godella</p>
                    </div>
                    <div class="sede">
                        <img src="./img/pabellon-sevilla.jpg" alt="Sevilla">
                        <h3>Sevilla</h3>
                        <p>Del 16 al 22 de agosto - Pabellón Municipal de Dos Hermanas</p>
                    </div>
                </div>
            </section>


            <!-- Sección de Testimonios -->
            <section class="testimonios">
                <div class="mar-container2">
                    <p style="margin-right: 75%;" id="Descubrelo" class="btn-border">Opiniones</p>
                </div>
                <h2>¿Que opinan nuestros jugadores?</h2>
                <div class="comments">
                    <div class="comment">
                        <h3>Rebeca Fernandez</h3>
                        <p>Era mi primera vez en un campus y la experiencia ha sido muy buena, he aprendido mucho y mi familia ha estado notificada de todo, me ha encantado haber podido formar parte de esta experiencia tan buena. He aprendido y mejorado mucho.</p>
                    </div>
                    <div class="comment">
                        <h3>Laura Martínez</h3>
                        <p>Era mi primera vez en un campus y la experiencia ha sido muy buena, he aprendido mucho y mi familia ha estado notificada de todo, me ha encantado haber podido formar parte de esta experiencia tan buena. He aprendido y mejorado mucho.</p>
                    </div>
                    <div class="comment">
                        <h3>Fernando Garcia</h3>
                        <p>Era mi primera vez en un campus y la experiencia ha sido muy buena, he aprendido mucho y mi familia ha estado notificada de todo, me ha encantado haber podido formar parte de esta experiencia tan buena. He aprendido y mejorado mucho.</p>
                    </div>
                </div>
            </section>
        </main>
        <?php echo $footer ?>
    </div>
</body>
</html>
<?php
include_once('config.php');

$current_page = basename($_SERVER['PHP_SELF']);

$stroke_color = ($current_page == "login.php" || $current_page == "registrar.php") ? "red" : "currentColor";

$nav = '
<nav class="navbar navbar-expand-lg" id="Home" aria-label="Eleventh navbar example">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <img style="width: 150px; height: 150px;" src="./img/logo.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample09" aria-controls="navbarsExample09" aria-expanded="false" aria-label="Toggle navigation">
            <img style="width: 50px; height: 50px;" src="./img/55003.png" alt="Toggle Menu">
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample09">
            <ul style="gap:15px" class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link ' . ($current_page == "index.php" ? "active1" : "") . ' menu" href="index.php"><b>Home</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . ($current_page == "buscar_universidad.php" ? "active1" : "") . ' menu" href="buscar_universidad.php"><b>Buscar Universidad</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . ($current_page == "Equipos.php" ? "active1" : "") . ' menu" href="Equipos.php"><b>Equipos</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . ($current_page == "equipamiento.php" ? "active1" : "") . ' menu" href="equipamiento.php"><b>Equipamiento Deportivo</b></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link ' . ($current_page == "contacta.php" ? "active1" : "") . ' menu" href="contacta.php"><b>Contacta</b></a>
                </li>
            </ul>
            <div class="group">';

                if (isset($_SESSION['Nombre_Usuario'])) {
                    $nav .= '<a class="menu" href="Carrito.php"><img src="./img/shopping-bag.svg"></a>';
                }

                if (isset($_SESSION['Nombre_Usuario'])) {
                    $nav .= ' <a class="menu" href="perfil.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="' . $stroke_color . '" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2"> 
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path> 
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path> 
                    </svg>
                </a>';
                } else {
                    $nav .= ' <a class="menu" href="login.php">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="' . $stroke_color . '" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2"> 
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path> 
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path> 
                    </svg>
                </a>';
                }

                if ($current_page !== "login.php" && $current_page !== "registrar.php" && isset($_SESSION['Nombre_Usuario'])) {
                    $nav .= '
                        <a class="menu" href="CerrarSesion.php">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                <path d="M15 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M21 12h-13l3 -3"></path>
                                <path d="M11 15l-3 -3"></path>
                            </svg> 
                        </a>
                    ';
                }
            $nav .= '</div>
        </div>
    </div>
</nav>
';

// Footer HTML
$footer = '
<footer class="footer">
    <div class="footer-container">
        <div class="footer-logo">
            <img src="./img/logo.png" alt="TRAVEL BALLERS" class="footer-logo-image">
        </div>
        <div class="footer-social">
            <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
            <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
        </div>
    </div>
    <div class="footer-bottom">
        <nav class="footer-nav">
            <ul>
                <li><a href="#">Aviso Legal</a></li>
                <li><a href="#">Política de Cookies</a></li>
            </ul>
        </nav>
        <p>&copy; 2024 Travel Ballers. Todos los derechos reservados.</p>
    </div>
</footer>';
?>

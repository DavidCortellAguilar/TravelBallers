<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('configuracion.php');
include_once('config.php');

// Verificar si se ha pasado un ID en la URL
if(isset($_GET['ID_Equipo'])){
    $ID_Equipo = $_GET['ID_Equipo'];

    $sql = "SELECT * FROM jugadores j JOIN equipos e ON j.ID_Equipo = e.ID_Equipo WHERE j.ID_Equipo = '$ID_Equipo'";
    $result = $conn->query($sql);

    $tabla = "<div class='container mt-4'><div class='row justify-content-center'>"; // Inicio del contenedor y fila
    if ($result->num_rows > 0) {    
        // Generar las filas dentro del bucle
        while ($row = $result->fetch_assoc()) {
            $tabla .= "
                <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-stretch'>
                    <div class='card shadow-sm' style='border-radius: 20px; max-width: 100%;'>
                        <img src='./" . $row["Foto_Jugador"] . "' alt='Imagen de " . $row["Foto_Jugador"] . "' class='img-fluid' style='max-height: 200px; object-fit: contain;'>
                        <div class='card-body' style='background-color:rgb(227, 227, 227); border-radius: 0 0 20px 20px;'>
                            <h5 class='card-title'>" . $row['Nombre_Jugador'] . "</h5>
                            <p class='card-text'>Nombre Equipo: <span class='price'>" . $row['Nombre_Equipo'] . "</span></p>
                            <p class='card-text'>Posición: " . $row['Posicion_Jugador'] . "</p>
                            <p class='card-text'>Dorsal: " . $row['Dorsal'] . "</p>
                            <p class='card-text'>Edad: " . $row['Edad'] . " años</p>
                            <p class='card-text'>Nacionalidad: " . $row['Nacionalidad'] . "</p>
                            <p class='card-text'>Altura: " . $row['Altura'] . " cm</p>
                            <p class='card-text'>Peso: " . $row['Peso'] . " kg</p>
                        </div>
                    </div>
                </div>
            ";
        }
    }
    $tabla .= "</div></div>"; // Cerrar el contenedor y la fila
}
$equipoBanners = [
    "1" => "./logos_equipos/KentukyBanner.png",
    "2" => "./logos_equipos/northCarolinaBanner.png",
    "3" => "./logos_equipos/utahStateBanner.png",
    "4" => "./logos_equipos/floridaBanner.png",
    "5" => "./logos_equipos/uclaBanner.png",
    "6" => "./logos_equipos/arizonaBanner.png",
    "7" => "./logos_equipos/dukeBanner.png",
];

$imgBanner = isset($equipoBanners[$ID_Equipo]) 
    ? "<img style='width:70%; margin-left:15%' src='" . $equipoBanners[$ID_Equipo] . "'>" 
    : ""; // Por defecto, vacío si no se encuentra el ID

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantilla</title>
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
    <style>
        table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse:collapse;
        width: 100%;
        color:black;
    }

    table td, th {
        border: 1px solid #ddd;
        padding: 8px;
        width: 20%;
        white-space: nowrap;
    }

    table tr:hover {
        background-color: #ddd;
    }

    table th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: skyblue;
        color: white;
    }
    </style>
</head>
<body>
<span class="ir-arriba"><img style="width: 60px" src="./img/arriba.png"></span>
<div class="fondo1">
        <?php echo $nav ?>
        <?php echo $imgBanner ?>
        <div class="container py-5 container-fluid">
            <?php echo $tabla ?>
            <br>
            <div class="d-grid mt-3" style="text-align: center;">
                <a style="color:white; text-decoration:none" href="Equipos.php"><button type="button" class="btn btn-danger">Salir</button></a>
            </div>
        </div>
        <?php echo $footer ?>
    </div>
</body>
</html>
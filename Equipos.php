<?php
include_once('configuracion.php');
include_once('config.php');

if (isset($_SESSION['ID_Usuario'])) {
    $ID_Usuario = $_SESSION['ID_Usuario'];
} else {
    $ID_Usuario = null; // O cualquier valor predeterminado
}

$sql = "SELECT 
            e.ID_Equipo, 
            e.Nombre_Equipo AS Nombre, 
            e.Logo_Equipo AS Logo, 
            e.Ciudad_Equipo AS Ciudad, 
            COUNT(j.ID_Jugador) AS Cantidad_Jugadores,
            COUNT(f.ID_Fav_Equipo) AS Favorito
        FROM equipos e
        LEFT JOIN jugadores j ON j.ID_Equipo = e.ID_Equipo
        LEFT JOIN favoritos_equipos f ON f.ID_Fav_Equipo = e.ID_Equipo AND f.ID_Fav_Usuario = ?
        GROUP BY e.ID_Equipo, e.Nombre_Equipo, e.Logo_Equipo, e.Ciudad_Equipo";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ID_Usuario);
$stmt->execute();
$result = $stmt->get_result();

$tabla = "<div class='container mt-4'><div class='row justify-content-center'>"; // Inicio del contenedor y fila
if ($result->num_rows > 0) {    
    // Generar las filas dentro del bucle
    while ($row = $result->fetch_assoc()) {
        $corazonSrc = $row['Favorito'] > 0 ? './img/Corazon-lleno.svg' : './img/Corazon-vacio.svg';
        $tabla .= "
            <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-stretch'>
                <div class='card shadow-sm' style='border-radius: 20px; max-width: 100%;'>
                    <img src='./" . $row["Logo"] . "' alt='Imagen de " . $row["Nombre"] . "' class='img-fluid' style='max-height: 200px; object-fit: contain;'>
                    <div class='card-body' style='background-color:rgb(227, 227, 227); border-radius: 0 0 20px 20px;'>
                        <h5 class='card-title'>" . $row['Nombre'] . "</h5>
                        <p class='card-text'>Nº Jugadores: <span class='price'>" . $row['Cantidad_Jugadores'] . "</span></p>
                        <p style='margin-bottom: 0px;' class='card-text'>📍Ciudad: " . $row['Ciudad'] . "</p>
                        <div style='margin-top: 0px;' class='d-flex justify-content-between align-items-center mt-3'>
                            <a href='plantilla.php?ID_Equipo=" . $row['ID_Equipo'] . "' class='equipo d-flex justify-content-center align-items-center mt-3'>
                                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-info-circle' width='52' height='52' viewBox='0 0 24 24' stroke-width='1.5' stroke='#00abfb' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                                    <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                                    <path d='M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0' />
                                    <path d='M12 9h.01'/>
                                    <path d='M11 12h1v4h1'/>
                                </svg>
                            </a>
                            <img class='corazon' src='$corazonSrc' data-id-equipo='" . $row['ID_Equipo'] . "' alt=''>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
}
$tabla .= "</div></div>"; // Cerrar el contenedor y la fila
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipos</title>

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
        .corazon {
            margin-right: 20%;
            margin-top: 15px;
        }

        .equipo{
            margin-left: 20%;
        }
    </style>
</head>
<body>
    <span class="ir-arriba"><img style="width: 60px" src="./img/arriba.png"></span>
    <div class="fondo1">
        <?php echo $nav ?>
        <?php echo $tabla ?>
        <?php echo $footer ?>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    document.querySelectorAll('.corazon').forEach(img => {
        img.addEventListener('click', () => {
            const ID_Equipo = img.getAttribute('data-id-equipo');
            const isLiked = img.getAttribute('src') === './img/Corazon-lleno.svg';
            const newSrc = isLiked ? './img/Corazon-vacio.svg' : './img/Corazon-lleno.svg';

            // Actualizar la imagen inmediatamente
            img.setAttribute('src', newSrc);

            // Enviar la solicitud AJAX
            $.ajax({
                url: 'favoritos_equipos.php',
                type: 'POST',
                data: { ID_Equipo: ID_Equipo },
                success: function(response) {
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
</html>
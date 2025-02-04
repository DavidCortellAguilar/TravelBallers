<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('configuracion.php');
include_once('config.php');

if (isset($_SESSION['ID_Usuario'])) {
    $ID_Usuario = $_SESSION['ID_Usuario'];
} else {
    $ID_Usuario = null; // O cualquier valor predeterminado
}

    $sql2="SELECT * FROM usuarios WHERE ID_Usuario='$ID_Usuario'";

    $result2 = $conn->query($sql2);

    if($result2->num_rows > 0) {
        $row2 = $result2->fetch_assoc();

        $Nombre = $row2["Nombre_Usuario"];
        $Email = $row2["Email"];
        $Fecha = $row2["Fecha_Nacimiento"];
        $Imagen = "<img src='" . $row2["Imagen_Usuario"] . "' alt='Imagen de " . $row2["Nombre_Usuario"] . "' class='img-fluid' style='max-height: 400px; object-fit: contain; border-radius: 20px;'>";
    }

// Consulta SQL para obtener los equipos favoritos del usuario
$sql = "SELECT 
            e.ID_Equipo, 
            e.Nombre_Equipo AS Nombre, 
            e.Logo_Equipo AS Logo, 
            e.Ciudad_Equipo AS Ciudad, 
            COUNT(j.ID_Jugador) AS Cantidad_Jugadores
        FROM equipos e
        INNER JOIN favoritos_equipos f ON f.ID_Fav_Equipo = e.ID_Equipo
        LEFT JOIN jugadores j ON j.ID_Equipo = e.ID_Equipo
        WHERE f.ID_Fav_Usuario = ?
        GROUP BY e.ID_Equipo";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ID_Usuario);
$stmt->execute();
$result = $stmt->get_result();

$equiposFavoritos = "<div class='container mt-4'><div class='row justify-content-center'>"; // Inicio del contenedor y fila
if ($result->num_rows > 0) {    
    // Generar las filas dentro del bucle
    while ($row = $result->fetch_assoc()) {
        $equiposFavoritos .= "
            <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-stretch'>
                <div class='card shadow-sm' style='border-radius: 20px; max-width: 100%;'>
                    <img src='./" . $row["Logo"] . "' alt='Imagen de " . $row["Nombre"] . "' class='img-fluid' style='max-height: 200px; object-fit: contain;'>
                    <div class='card-body' style='background-color:rgb(227, 227, 227); border-radius: 0 0 20px 20px;'>
                        <h5 class='card-title'>" . $row['Nombre'] . "</h5>
                        <p class='card-text'>Nº Jugadores: <span class='price'>" . $row['Cantidad_Jugadores'] . "</span></p>
                        <p style='margin-bottom: 0px;' class='card-text'>📍Ciudad: " . $row['Ciudad'] . "</p>
                    </div>
                </div>
            </div>
        ";
    }
} else {
    $equiposFavoritos .= "<p style='color:white'>No tienes equipos marcados como favoritos.</p>";
}
$equiposFavoritos .= "</div></div>"; // Cerrar el contenedor y la fila



// Consulta SQL para obtener el equipamiento favorito del usuario
$sqlEquipamiento = "SELECT 
            e.ID_Equipamiento, 
            e.Nombre_Equipamiento AS Nombre, 
            e.Imagen_Equipamiento AS Imagen, 
            e.Tipo_Equipamiento AS Tipo, 
            e.Precio_Equipamiento AS Precio, 
            e.Marca_Equipamiento AS Marca,
            e.Descuento_Precio AS Descuento_Precio
        FROM equipamiento e
        INNER JOIN favoritos_equipamiento f ON f.ID_Fav_Equipamiento = e.ID_Equipamiento
        WHERE f.ID_Fav_Usuario_Equipa = ?";
$stmtEquipamiento = $conn->prepare($sqlEquipamiento);
$stmtEquipamiento->bind_param("i", $ID_Usuario);
$stmtEquipamiento->execute();
$resultEquipamiento = $stmtEquipamiento->get_result();

$equipamientoFavorito = "<div class='container mt-4'><div class='row justify-content-center'>"; // Inicio del contenedor y fila
if ($resultEquipamiento->num_rows > 0) {
    while ($row = $resultEquipamiento->fetch_assoc()) {
        $precioOriginal = $row['Precio'];
        $precioDescuento = $precioOriginal - ($precioOriginal * ($row['Descuento_Precio'] / 100));
        $precioMostrar = $row['Descuento_Precio'] > 0
            ? "<span style='text-decoration: line-through; color: black;'>{$precioOriginal}€</span> <span style='color: red;'>{$precioDescuento}€</span>"
            : "{$precioOriginal}€";

        $equipamientoFavorito .= "
            <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-stretch'>
                <div class='card shadow-sm responsive-equipamiento' style='border-radius: 20px; height: 400px;'>
                    <img src='./" . $row["Imagen"] . "' alt='Imagen de " . $row["Nombre"] . "' class='img-fluid img' style='max-height: 200px; object-fit: contain; border-radius:20px;'>
                    <div class='card-body' style='background-color:rgb(227, 227, 227); border-radius: 0 0 20px 20px;'>
                        <h5 class='card-title'>" . $row['Nombre'] . "</h5>
                        <p>" . $row['Tipo'] . "</p>
                        <p>" . $row['Marca'] . "</p>
                        <div style='margin-top: 0px;' class='d-flex justify-content-between align-items-center mt-3'>
                            <p style='font-size:20px; margin-top:15px; margin-left:10%;font-weight: bold;'>" . $precioMostrar . "</p>
                        </div>
                    </div>
                </div>
            </div>
        ";
    }
} else {
    $equipamientoFavorito .= "<div class='col-12 text-center'><p style='color:white'>No tienes equipos marcados como favoritos.</p></div>";
}
$equipamientoFavorito .= "</div></div>"; // Cerrar el contenedor y la fila
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>

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

        <!-- CONTENIDO PÁGINA -->
        <div class="profile-container">
            <div id="g1" class="grid-imagenes">
                <?php echo $Imagen ?>
            </div>
            <div class="profile-details">
                <h2><?php echo $Nombre ?></h2>
                <p><?php echo $Email ?></p>
                <p><?php echo $Fecha ?></p>
            </div>
        </div>

        <div style="text-align:center;padding-top:10px"><img style="width:60%" src="./img/equipos_favoritos.png"></div>
        <?php echo $equiposFavoritos ?>
        <div style="text-align:center;padding-top:10px"><img style="width:60%" src="./img/equipamiento_favorito.png"></div>
        <?php echo $equipamientoFavorito ?>
        <?php echo $footer ?>
    </div>
</body>
</html>
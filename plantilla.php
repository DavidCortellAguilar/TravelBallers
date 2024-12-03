<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('configuracion.php');

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballers";

// Establecer conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_error);
}

// Verificar si se ha pasado un ID en la URL
if(isset($_GET['ID_Equipo'])){
    $ID_Equipo = $_GET['ID_Equipo'];

    $sql = "SELECT * FROM jugadores j JOIN equipos e ON j.ID_Equipo = e.ID_Equipo WHERE j.ID_Equipo = '$ID_Equipo'";
    $result = $conn->query($sql);

    $tabla = "";
    if ($result->num_rows > 0) {
        $tabla .= "<table>
                    <thead>
                    <tr>
                        <th>Foto Jugador</th>
                        <th>Nombre Jugador</th>
                        <th>Equipo</th>
                        <th>Posición</th>
                        <th>Dorsal</th>
                        <th>Edad</th>
                        <th>Nacionalidad</th>
                        <th>Altura</th>
                        <th>Peso</th>
                    </tr>
                    </thead>
                    <tbody>";
        
    // Generar las filas dentro del bucle
    while ($row = $result->fetch_assoc()) {
        $tabla .= "<tr>
                    <td style='padding:0px;'><img src='./" . $row["Foto_Jugador"] . "' alt='Imagen de " . $row["Foto_Jugador"] . "' class='img-fluid'></td>
                    <td>" . $row['Nombre_Jugador'] . "</td>
                    <td>" . $row['Nombre_Equipo'] . "</td>
                    <td>" . $row['Posicion_Jugador'] . "</td>
                    <td>Nº " . $row['Dorsal'] . "</td>
                    <td>" . $row['Edad'] . " años</td>
                    <td>" . $row['Nacionalidad'] . "</td>
                    <td>" . $row['Altura'] . " cm</td>
                    <td>" . $row['Peso'] . " kg</td>
                </tr>";
    }

    // Cierre del cuerpo de la tabla y la tabla
    $tabla .= "</tbody></table>";
}
}
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
    <script src="scroll.js"></script>
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
        <div class="container py-5">
            <div class="card shadow-sm">
            <?php echo $tabla ?>
            </div>
        </div>
        <?php echo $footer ?>
    </div>
</body>
</html>
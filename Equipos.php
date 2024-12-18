<?php
include_once('configuracion.php');
include_once('config.php');

    $sql = "SELECT e.ID_Equipo, e.Nombre_Equipo AS Nombre, e.Logo_Equipo AS Logo, e.Ciudad_Equipo AS Ciudad, (SELECT COUNT(*) FROM jugadores j WHERE j.ID_Equipo = e.ID_Equipo) AS Cantidad_Jugadores FROM equipos e";
    $result = $conn->query($sql);

    $tabla = "";
if ($result->num_rows > 0) {
    $tabla .= "<table>
                <thead>
                <tr>
                    <th>Logo Equipo</th>
                    <th>Nombre Equipo</th>
                    <th>Ciudad</th>
                    <th>Cantidad Jugadores</th>
                    <th>Ver Plantilla</th>
                </tr>
                </thead>
                <tbody>";
    
    // Generar las filas dentro del bucle
    while ($row = $result->fetch_assoc()) {
        $tabla .= "<tr class='fila-principal' data-id='" . $row['ID_Equipo'] . "'>
                    <td><img src='./" . $row["Logo"] . "' alt='Imagen de " . $row["Logo"] . "' class='img-fluid'></td>
                    <td>" . $row['Nombre'] . "</td>
                    <td>" . $row['Ciudad'] . "</td>
                    <td>" . $row['Cantidad_Jugadores'] . " Jugadores</td>
                    <td><a href='plantilla.php?ID_Equipo=" . $row['ID_Equipo'] . "'>
                        <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-info-circle' width='52' height='52' viewBox='0 0 24 24' stroke-width='1.5' stroke='#00abfb' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                            <path stroke='none' d='M0 0h24v24H0z' fill='none'/>
                            <path d='M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0' />
                            <path d='M12 9h.01'/>
                            <path d='M11 12h1v4h1'/>
                        </svg>
                    </a></td>
                </tr>";
    }

    // Cierre del cuerpo de la tabla y la tabla
    $tabla .= "</tbody></table>";
}


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
        table {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        color:black;
    }

    table td, th {
        border: 1px solid #ddd;
        padding: 8px;
        width: 20%;
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
        <div class="container py-5 table-responsive">
            <div class="card shadow-sm">
            <?php echo $tabla ?>
            </div>
        </div>
        <?php echo $footer ?>
    </div>
</body>
</html>
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
                        <th>ID Jugador</th>
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
                    <td>" . $row['ID_Jugador'] . "</td>
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
</head>
<body>
    <?php echo $tabla ?>
</body>
</html>
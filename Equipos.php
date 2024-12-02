<?php
include_once('configuracion.php');

//Datos conexión base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ballers";

//Establecer conexión
$conn = new mysqli($servername, $username, $password, $dbname);

//Verificar conexión
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_error);
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
    <script src="scroll.js"></script>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="fondo1">
        <?php echo $nav ?>
        <div class="container py-5">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="text-center mb-4">EQUIPOS</h1>
                    <div class="d-flex justify-content-center gap-2 mb-4">
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer ?>
    </div>
</body>
</html>
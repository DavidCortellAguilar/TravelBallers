<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once('configuracion.php');

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "David";
$password = "12345";
$dbname = "ballers";

// Establecer conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if($conn->connect_error){
    die("Conexión fallida: ".$conn->connect_error);
}

// Consulta a la tabla 'roles'
$sql = "SELECT ID_Rol, Nombre_Rol FROM roles";
$result = $conn->query($sql);
$Roles = "";

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error en la consulta: " . $conn->error);
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preload" href="style.css" as="style">
    <link href="style.css" rel="stylesheet">
</head>
 
<body>
<div class="contenedor sombra p-4 rounded ">
        <h1 class="text-center">
            <img src="./img/logo2.png" alt="Descripción de la imagen" width="300" height="200">
        </h1>
        <h1>Iniciar Sesión</h1>
            <div class="card-body">
                <form action="enviarDatos.php" method="post">
                    <div class="mb-3">
                        <label for="producto" class="form-label"><b>Email</b></label>
                        <input type="Email" id="Email" class="input" placeholder="Introduce el email"
                            name="Email"/>
                    </div>
 
                    <div class="mb-3">
                        <label for="producto" class="form-label"><b>Contraseña</b></label>
                        <input type="password" id="pass" class="form-control input" placeholder="Introduce la contraseña"
                            name="pass"/>
                    </div>
 
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary w-100">Iniciar Sesión</button></br>
                    </div>
                </form>
            </div>
            <p class="sign-up-label">
                No tienes Cuenta?<span style="margin-left: 10px;" class="sign-up-link"><a href="Formulario.php">Registrate</a></span>
            </p>
</div>
</body>
</html>
 
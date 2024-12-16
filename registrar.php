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
    <title>Registrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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
    <link rel="stylesheet" href="./css/login.css">
    
    <style>
        html, body {
            height: 100%;
            width: 100%;
            background-image: url(./img/fondo.png);
            background-size: cover;
            background-position: center;
            flex: 1 1 25%;
            min-height: 100%;
        }
        .contenedor {
            max-width: 40rem;
            margin: 3rem auto;
        }
        .sombra {
            box-shadow: 0px 5px 15px 0px rgba(112,112,112,0.48);
            background-color: black;
            padding: 2rem;
            border-radius: 1rem;
        }
        h1{
            text-align: center;
            color:black;
        }
        label {
            color: black;
            font-size: 20px;
        }
        .input {
            border: none;
            padding: 1rem;
            border-radius: 1rem;
            background: #e8e8e8;
            transition: 0.3s;
        }
        .input:focus {
            outline-color: #e8e8e8;
            background: #e8e8e8;
            transition: 0.3s;
        }
        .select {
            padding: .5rem;
        }
    </style>
</head>

<body>
        <?php echo $nav ?>
        <div class="contenedor sombra p-4 rounded bg-light">
            <h1 class="text-center">
                <img src="./img/logo.png" alt="Descripción de la imagen" width="300" height="200">
            </h1>
            <h1>REGISTRARME</h1><br>
                <div class="card-body">
                    <form action="enviarRegistro.php" method="post">
                        <div class="mb-3">
                            <label class="form-label"><b>Nombre</b></label>
                            <input type="text" name="Nombre" id="Nombre" class="form-control input" placeholder="Introduce tu nombre"/>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label"><b>Email</b></label>
                            <input type="Email" name="Email" id="Email" class="form-control input" placeholder="Introduce el email" name="Email"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label"><b>Contraseña</b></label>
                            <input type="text" name="Pass" id="Pass" class="form-control input" placeholder="Introduce la contraseña" name="Pass"/>
                        </div>

                        <div class="d-grid" style="margin: bottom 0px;">
                            <button type="submit" class="btn btn-primary w-25">Registrarme</button>
                        </div>
                    </form>
                    <hr style="border:1px solid black; margin: 30px">
                    <h3>¿Ya tienes cuenta?</h3>
                    <button type="button" class="btn btn-success w-25"><a style="text-decoration:none; color:white" href="login.php">Iniciar Sesion</a></button>
                </div>
        </div>
        <?php echo $footer ?>
</body>
</html>


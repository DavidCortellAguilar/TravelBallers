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
    <title>Contacta</title>

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
        <div class="container py-5">
            <div class="card" style="background-color: transparent; border: none;">
                <h1 style="margin:5px; text-align:center; color: white;">CONTÁCTANOS</h1><br>
                <div class="card-body" style="color: white;">
                    <form action="enviarContacta.php" method="post">
                        <div class="mb-3">
                            <label for="producto" class="form-label" style="color: white;"><b>Nombre</b></label>
                            <input type="text" id="Nombre" class="form-control input" placeholder="Introduce el Nombre" name="Nombre"/>
                        </div>

                        <div class="mb-3">
                            <label for="producto" class="form-label" style="color: white;"><b>Email</b></label>
                            <input type="Email" id="Email" class="form-control input" placeholder="Introduce el Email" name="Email"/>
                        </div>

                        <div class="mb-3">
                            <label for="producto" class="form-label" style="color: white;"><b>Mensaje</b></label>
                            <input type="text" id="Mensaje" class="form-control input" placeholder="Introduce el Mensaje" name="Mensaje"/>
                        </div>

                        <div class="d-grid" style="margin: bottom 0px;">
                            <button type="submit" class="btn btn-primary w-25">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>
<?php echo $footer ?>
</body>
</html>
<?php
include_once('configuracion.php');
include_once('config.php');

if (isset($_SESSION['ID_Usuario'])) {
    $ID_Usuario = $_SESSION['ID_Usuario'];
} else {
    $ID_Usuario = null; // O cualquier valor predeterminado
}

$sql = "SELECT 
            e.ID_Equipamiento,
            e.Nombre_Equipamiento,
            e.Tipo_Equipamiento,
            e.Precio_Equipamiento,
            e.Marca_Equipamiento,
            e.Descripcion_Equipamiento,
            e.Descuento_Precio,
            e.Imagen_Equipamiento,
            COUNT(f.ID_Fav_Equipamiento) AS Favorito
        FROM equipamiento e
        LEFT JOIN favoritos_equipamiento f ON f.ID_Fav_Equipamiento = e.ID_Equipamiento AND f.ID_Fav_Usuario_Equipa = ?
        GROUP BY 
            e.ID_Equipamiento, 
            e.Nombre_Equipamiento, 
            e.Tipo_Equipamiento, 
            e.Precio_Equipamiento, 
            e.Marca_Equipamiento, 
            e.Descripcion_Equipamiento, 
            e.Descuento_Precio, 
            e.Imagen_Equipamiento";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $ID_Usuario);
$stmt->execute();
$result = $stmt->get_result();

$tabla = "<div class='container mt-4'><div class='row justify-content-center'>"; // Inicio del contenedor y fila
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $corazonSrc = $row['Favorito'] > 0 ? './img/Corazon-lleno.svg' : './img/Corazon-vacio.svg';
        $precioOriginal = $row['Precio_Equipamiento'];
        $precioDescuento = $precioOriginal - ($precioOriginal * ($row['Descuento_Precio'] / 100));
        $precioMostrar = $row['Descuento_Precio'] > 0
            ? "<span style='text-decoration: line-through; color: black;'>{$precioOriginal}€</span> <span style='color: red;'>{$precioDescuento}€</span>"
            : "{$precioOriginal}€";

        $tabla .= "
            <div class='col-12 col-sm-6 col-md-4 col-lg-3 mb-4 d-flex justify-content-center align-items-stretch'>
                <div class='card shadow-sm' style='border-radius: 20px; max-width: 100%;'>
                    <img src='./" . $row["Imagen_Equipamiento"] . "' alt='Imagen de " . $row["Nombre_Equipamiento"] . "' class='img-fluid img' style='max-height: 200px; object-fit: contain; border-radius:20px;'>
                    <div class='card-body' style='background-color:rgb(227, 227, 227); border-radius: 0 0 20px 20px;'>
                        <h5 class='card-title'>" . $row['Nombre_Equipamiento'] . "</h5>
                        <p>" . $row['Tipo_Equipamiento'] . "</p>
                        <p>" . $row['Marca_Equipamiento'] . "</p>
                        <p style='margin-bottom: 0px;'>" . $row['Descripcion_Equipamiento'] . "</p>
                        <div style='margin-top: 0px;' class='d-flex justify-content-between align-items-center mt-3'>
                            <p style='font-size:20px; margin-top:15px; margin-left:10%;font-weight: bold;'>" . $precioMostrar . "</p>
                            <button type='button' class='btn' id='btnCarrito'>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='green' stroke-linecap='round' stroke-linejoin='round' width='32' height='32' stroke-width='2'>
                                <path d='M6.331 8h11.339a2 2 0 0 1 1.977 2.304l-1.255 8.152a3 3 0 0 1 -2.966 2.544h-6.852a3 3 0 0 1 -2.965 -2.544l-1.255 -8.152a2 2 0 0 1 1.977 -2.304z'></path>
                                <path d='M9 11v-5a3 3 0 0 1 6 0v5'></path>
                                </svg>
                            </button>
                            <img class='corazon' src='$corazonSrc' data-id-equipamiento='" . $row['ID_Equipamiento'] . "' alt=''>
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
    <title>Equipamiento</title>

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
    <link rel="stylesheet" href="./css/style-copy.css">
    <style>
        .corazon {
            margin-right: 20%;
            margin-top: 5px;
        }

        .corazon:hover {
            cursor:pointer;
        }

        .card {
            width: 18rem;
            height: 100%;
        }
        .card .img {
            height: 200px;
            object-fit: cover;
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
            const ID_Equipamiento = img.getAttribute('data-id-equipamiento');
            const isLiked = img.getAttribute('src') === './img/Corazon-lleno.svg';
            const newSrc = isLiked ? './img/Corazon-vacio.svg' : './img/Corazon-lleno.svg';

            // Actualizar la imagen inmediatamente
            img.setAttribute('src', newSrc);

            // Enviar la solicitud AJAX
            $.ajax({
                url: 'favoritos_equipamiento.php',
                type: 'POST',
                data: { ID_Equipamiento: ID_Equipamiento, isLiked: !isLiked },
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
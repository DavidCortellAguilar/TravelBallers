<?php
include 'config.php';
include 'configuracion.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>

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
        <?php echo $nav; ?>
        <div class="container mt-5" style="margin-bottom:5%">
            <h2 class="text-center mb-4"><img style="width: 100%;" src="./img/carrito.png" alt="carrito"></h2>
            <div class="row">
                <div class="col-md-8">
                    <?php if (empty($_SESSION['carrito'])): ?>
                        <div class="alert alert-warning text-center">El carrito está vacío</div>
                    <?php else: ?>
                        <div class="card p-3">
                            <?php foreach ($_SESSION['carrito'] as $id => $producto): ?>
                                <div class="row align-items-center border-bottom py-3">
                                    <div class="col-md-2 text-center">
                                        <img src="<?= htmlspecialchars($producto['imagen']); ?>" class="img-fluid rounded" alt="<?= htmlspecialchars($producto['nombre']); ?>" style="max-width: 80px;">
                                    </div>
                                    <div class="col-md-4">
                                        <h5 class="text-primary"> <?= htmlspecialchars($producto['nombre']); ?> </h5>
                                        <p class="mb-1"><?= number_format($producto['precio'], 2); ?>€</p>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <input type="number" value="<?= htmlspecialchars($producto['cantidad']); ?>" min="1" class="form-control w-50 d-inline cantidad" data-id="<?= $id; ?>">
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <p class="mb-0 font-weight-bold total-<?= $id; ?>"><?= number_format($producto['precio'] * $producto['cantidad'], 2); ?>€</p>
                                    </div>
                                    <div class="col-md-1 text-center">
                                        <a href="eliminar_carrito.php?id=<?= $id; ?>" class="text-danger">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h4>Resumen del pedido</h4>
                        <p>Subtotal: <span class="float-right" id="subtotal"><?= number_format(array_sum(array_map(fn($p) => $p['precio'] * $p['cantidad'], $_SESSION['carrito'] ?? [])), 2); ?>€</span></p>
                        <hr>
                        <p class="font-weight-bold">Total: <span class="float-right" id="total"><?= number_format(array_sum(array_map(fn($p) => $p['precio'] * $p['cantidad'], $_SESSION['carrito'] ?? [])), 2); ?>€</span></p>
                        <a href="./checkout_carrito.php"><button style="width: 100%;" class="btn btn-primary">Finalizar compra</button></a>
                        <p class="text-center mt-2"><i class="fas fa-lock"></i> Pago seguro</p>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
    </div>
    <script>
        $(document).ready(function() {
            $('.cantidad').on('change', function() {
                let id = $(this).data('id');
                let cantidad = $(this).val();
                $.ajax({
                    url: 'actualizar_carrito.php',
                    type: 'POST',
                    data: {id: id, cantidad: cantidad},
                    success: function(response) {
                        let data = JSON.parse(response);
                        $('.total-' + id).text('$' + data.total_producto);
                        $('#subtotal').text('$' + data.subtotal);
                        $('#total').text('$' + data.total);
                    }
                });
            });
        });
    </script>
</body>
</html>
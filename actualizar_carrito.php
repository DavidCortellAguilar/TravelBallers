<?php
include 'config.php';

if (isset($_POST['id'], $_POST['cantidad'])) {
    $id = $_POST['id'];
    $cantidad = max(1, intval($_POST['cantidad'])); // Asegurar que sea mínimo 1

    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad'] = $cantidad;
    }

    $subtotal = array_sum(array_map(fn($p) => $p['precio'] * $p['cantidad'], $_SESSION['carrito']));
    $total_producto = $_SESSION['carrito'][$id]['precio'] * $cantidad;

    echo json_encode([
        'subtotal' => number_format($subtotal, 2),
        'total' => number_format($subtotal, 2),
        'total_producto' => number_format($total_producto, 2)
    ]);
}
?>

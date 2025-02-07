<?php
include 'config.php';

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM equipamiento WHERE ID_Equipamiento = $id");

if ($row = $result->fetch_assoc()) {
    $precio_final = $row['Precio_Equipamiento'] * (1 - $row['Descuento_Precio'] / 100);

    if (isset($_SESSION['carrito'][$id])) {
        $_SESSION['carrito'][$id]['cantidad']++;
    } else {
        $_SESSION['carrito'][$id] = [
            'nombre' => $row['Nombre_Equipamiento'],
            'tipo' => $row['Tipo_Equipamiento'],
            'marca' => $row['Marca_Equipamiento'],
            'imagen' => $row['Imagen_Equipamiento'],
            'precio' => $precio_final,
            'cantidad' => 1
        ];
    }
}

header("Location: carrito.php");
?>

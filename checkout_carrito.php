<?php
include 'config.php';

echo "<h2>Compra realizada</h2>";
$_SESSION['carrito'] = []; // Vaciar el carrito después de la compra
echo "<a href='index.php'>Volver a la tienda</a>";
?>

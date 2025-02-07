<?php
include 'config.php';

$id = $_GET['id'];

if (isset($_SESSION['carrito'][$id])) {
    unset($_SESSION['carrito'][$id]);
}

header("Location: carrito.php");
?>

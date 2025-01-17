<?php
include_once('configuracion.php');
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $ID_Usuario = $_SESSION['ID_Usuario'];
    $ID_Equipo = $_POST['ID_Equipo'];
    $isLiked = $_POST['isLiked'];

    if ($isLiked) {
        // Agregar a favoritos
        $sql = "INSERT INTO favoritos_equipos (ID_Fav_Usuario, ID_Fav_Equipo) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $ID_Usuario, $ID_Equipo);
    } else {
        // Eliminar de favoritos
        $sql = "DELETE FROM favoritos_equipos WHERE ID_Fav_Usuario = ? AND ID_Fav_Equipo = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $ID_Usuario, $ID_Equipo);
    }

    if ($stmt->execute()) {
        echo "Success";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
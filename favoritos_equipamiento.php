<?php
include_once('configuracion.php');
include_once('config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_SESSION['ID_Usuario'])) {
        die("Usuario no autenticado");
    }
    $ID_Usuario = $_SESSION['ID_Usuario'];
    $ID_Equipamiento = $_POST['ID_Equipamiento'];

    // Verificar si el registro ya existe
    $sql = "SELECT * FROM favoritos_equipamiento WHERE ID_Fav_Usuario_Equipa = ? AND ID_Fav_Equipamiento = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $ID_Usuario, $ID_Equipamiento);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Eliminar de favoritos
        $sql = "DELETE FROM favoritos_equipamiento WHERE ID_Fav_Usuario_Equipa = ? AND ID_Fav_Equipamiento = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $ID_Usuario, $ID_Equipamiento);
    } else {
        // Agregar a favoritos
        $sql = "INSERT INTO favoritos_equipamiento (ID_Fav_Usuario_Equipa, ID_Fav_Equipamiento) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $ID_Usuario, $ID_Equipamiento);
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
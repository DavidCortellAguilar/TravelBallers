<?php
include_once('configuracion.php');
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = $_POST['Nombre'];
    $Email = $_POST['Email'];
    $Pass = $_POST['Pass'];
    $Fecha = $_POST['Fecha'];
    $ID_Rol = 2; // Asegúrate de que el tipo de dato sea correcto

    // Preparar consulta SQL
    $sql = "INSERT INTO usuarios (Nombre_Usuario, Email, Contraseña, Fecha_Nacimiento, ID_Rol)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssi", $Nombre, $Email, $Pass, $Fecha, $ID_Rol);

        // Ejecutar Consulta
        if ($stmt->execute()) {
            echo "<script>alert('¡El usuario ha sido creado!'); window.location.href='login.php';</script>";
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }

        // Cerrar Declaración
        $stmt->close();
    } else {
        echo "Error al preparar la consulta: " . $conn->error;
    }
}

// Cerrar la conexión
$conn->close();
?>
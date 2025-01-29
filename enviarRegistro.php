<?php
include_once('configuracion.php');
include_once('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Nombre = $_POST['Nombre'];
    $Email = $_POST['Email'];
    $Pass = $_POST['Pass'];
    $Fecha = $_POST['Fecha'];
    $ID_Rol = 2;
    $archivo = $_FILES['archivo']['name'];

    if (isset($archivo) && $archivo != "") {
        //Obtenemos algunos datos necesarios sobre el archivo
        $tipo = $_FILES['archivo']['type'];
        $tamano = $_FILES['archivo']['size'];
        $temp = $_FILES['archivo']['tmp_name'];
    
        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 2000000))) {
            echo '<div><b>Error. La extensión o el tamaño de los archivos no es correcta.<br/>
            - Se permiten archivos .gif, .jpg, .png. y de 2MB como máximo.</b></div>';
            $imagenGuardarBBDD = './img/img_usuarios/default.webp'; // Imagen por defecto
        } else {
            if (move_uploaded_file($temp, './img/img_usuarios/'.$archivo)) {
                chmod('./img/img_usuarios/'.$archivo, 0777);
                $imagenGuardarBBDD = './img/img_usuarios/'.$archivo;
            } else {
                echo '<div><b>Error al subir la imagen.</b></div>';
                $imagenGuardarBBDD = './img/img_usuarios/default.webp'; // Imagen por defecto si falla la subida
            }
        }
    } else {
        // Si no se sube ninguna imagen, usar la imagen por defecto
        $imagenGuardarBBDD = './img/img_usuarios/default.webp';
    }
    

    // Preparar consulta SQL
    $sql = "INSERT INTO usuarios (Nombre_Usuario, Email, Contraseña, Fecha_Nacimiento, ID_Rol, Imagen_Usuario)
            VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssssis", $Nombre, $Email, $Pass, $Fecha, $ID_Rol, $imagenGuardarBBDD);

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
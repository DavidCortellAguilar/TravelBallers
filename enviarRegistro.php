<?php
include_once('configuracion.php');
include_once('config.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Nombre = $_POST['Nombre'];
    $Email = $_POST['Email'];
    $Pass = $_POST['Pass'];
    $ID_Rol = "2";

    //Preparar consulta SQL
    $sql = "INSERT INTO usuarios (Nombre_Usuario, Email, Contraseña, ID_Rol)
                VALUES (?,?,?,?)";

    $stmt = $conn->prepare($sql);

    if($stmt){
        $stmt->bind_param("sssi", $Nombre, $Email, $Pass, $ID_Rol);
    
        //Ejecutar Consulta
        if ($stmt->execute()) {
            header("Location: registrar.php");
            echo "alert('¡El usuario ha sido creado!')";
        }
        
        //Cerrar Declaración
        $stmt->close();
    }else{
        echo "Error al preparar la consulta: ".$conn->error;
    }
}

//Cerrar la conexión
$conn->close();

?>
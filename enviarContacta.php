<?php
include_once('configuracion.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Email = $_POST['Email'];
    $Nombre = $_POST['Nombre'];
    $Mensaje = $_POST['Mensaje'];

//Preparar consulta SQL
$sql = "INSERT INTO contacto (Nombre, Correo, Mensaje)
VALUES (?,?,?)";

$stmt = $conn->prepare($sql);

if($stmt){
$stmt->bind_param("sss", $Nombre, $Email, $Mensaje);

//Ejecutar Consulta
if ($stmt->execute()) {
    echo "alert('¡El usuario ha sido creado!')";
    header("Location: contacta.php");
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
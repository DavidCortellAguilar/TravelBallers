<?php
include_once('configuracion.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $Email = $_POST['email'];
    $Password = $_POST['pass'];

    $Pass = md5($Password);

    $sql = "SELECT Nombre_Usuario, ID_Rol FROM usuarios WHERE Email='$Email' AND Password='$Pass'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["Nombre_Usuario"] = $row["Nombre_Usuario"];
        $_SESSION["ID_Rol"] = $row["ID_Rol"];
        header("Location: almacen.php");
    }
}
?>
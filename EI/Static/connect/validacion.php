<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['correo'];
    $contrasena = $_POST['password'];

    $sql = "SELECT * FROM cliente WHERE email = '$usuario' AND contra = '$contrasena';";
    $execute = mysqli_query($conexion,$sql);
    $row = mysqli_fetch_assoc($execute);
    echo $row['email'];
    echo $row['contra'];
    if (($row['email'] == $usuario) && ($row['contra'] == $contrasena)) {
        // Inicio de sesión exitoso
        
        $_SESSION['email'] = $usuario;
        $_SESSION['contra'] = $contrasena;
        header("location: ../../index.php"); // Página de bienvenida o página después de iniciar sesión
    } else {
        // Credenciales incorrectas
        
        echo "<script>alert
        ('Nombre de usuario o contraseña incorrectos.'); 
        window.location.href = '../../login.php';</script>";
    }
}
?>
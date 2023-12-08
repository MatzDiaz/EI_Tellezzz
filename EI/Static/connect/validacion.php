<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['correo'];
    $contrasena = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
    $result = $conexion->query($sql);

    if ($result->num_rows == 1) {
        // Inicio de sesión exitoso
        $_SESSION['loggedin'] = true;
        $_SESSION['usuario'] = $usuario;
        header("location: ../../admin.php"); // Página de bienvenida o página después de iniciar sesión
    } else {
        // Credenciales incorrectas
        echo "<script>alert
        ('Nombre de usuario o contraseña incorrectos.'); 
        window.location.href = '../../login.php';</script>";
    }
}
?>
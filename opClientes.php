<?php
    session_start();
    include 'Static/connect/conexion.php';

    $id = $_GET['id'];

    if(isset($_POST['btnRegistrar'])){
        $nom = $_POST['nombrer'];
        $ape = $_POST['apellidor'];
        $tel = $_POST['telefonor'];
        $cor = $_POST['emailr'];
        $con = $_POST['contrasenar'];
        $gen = $_POST['lsexor'];
        mysqli_query($conexion, "INSERT INTO cliente (nombre, apellido, email, contra, telefono, Genero)
          VALUES ('$nom','$ape','$tel','$cor','$con','$gen');");
            if($sql == true){
                echo '<script>alert("Cambios realizados");
                window.location = "admClientes.php";</script>';
                header("location: admClientes.php");
            }else{
                echo '<script>alert("Fallo");
                window.location = "admClientes.php";</script>';
                header("location: admClientes.php");
            } 
    }

    if(isset($_POST['btnGuardar'])){
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $tel = $_POST['telefono'];
        $cor = $_POST['email'];
        $con = $_POST['contrasena'];
        $gen = $_POST['lsexo'];
        mysqli_query($conexion, "UPDATE cliente SET nombre = '$nom', apellido = '$ape', 
        contra = '$con', Telefono = '$tel', Genero = '$gen' email = '$cor' WHERE idCliente = '$id'");
            if($sql == true){
                echo '<script>alert("Cambios realizados");
                window.location = "admClientes.php";</script>';
                header("location: admClientesphp");
            }else{
                echo '<script>alert("Fallo");
                window.location = "admClientes.php";</script>';
                header("location: admClientes.php");
            } 
    }

    if(isset($_POST['btnEliminar'])){
        mysqli_query($conexion, "DELETE FROM clinete WHERE idCliente = '$id'");
            if($sql == true){
                echo '<script>alert("Cambios realizados");
                window.location = "admClientes.php";</script>';
                header("location: admClientes.php");
            }else{
                echo '<script>alert("Falló");
                window.location = "admClientes.php";</script>';
                header("location: admClientes.php");
            }
    }
?>
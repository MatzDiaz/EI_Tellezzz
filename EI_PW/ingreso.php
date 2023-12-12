<?php

session_start();
include 'Static/connect/conexion.php';

$nom = $_POST['nombre'];
$ape = $_POST['apellido'];
$tel = $_POST['telefono'];
$cor = $_POST['email'];
$con = $_POST['contrasena'];
$gen = $_POST['lsexo'];
//var_dump($nom, $ape, $tel, $cor, $con, $gen);
$sql=mysqli_query($conexion, "INSERT INTO cliente (nombre, apellido, email, contra, telefono, Genero)
    VALUES ('$nom','$ape','$cor','$con','$tel','$gen')");
    if($sql == true){?>
        <? include'includes/headerClien.php' ?> 
        <?php
        echo '<script>alert("Registrado con éxito  ");</script>';
        echo '<script>window.location = "index.php";</script>';
    }else{
        echo '<script>alert("Fallo al actualizar");</script>';
        echo '<script>window.location = "registro.php";</script>';
    } 
?>
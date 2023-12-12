<?php
    session_start();
    include 'Static/connect/conexion.php';

    if(isset($_POST['btnRegistrar'])){
        $idSer = $_POST["servicio"];
        $idCli =$_POST["cliente"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];        
        
       // var_dump($idSer, $idCli, $fecha, $hora);       
        $con= mysqli_query($conexion,"INSERT INTO citas (idCliente, idServicios, fecha, hora)
        VALUES ('$idSer','$idCli','$fecha','$hora')");
        if($con){
            echo "<script>window.onload = function() { alert('Se agregó la cita correctamente.'); window.location.href = 'admCitas.php'; };</script>";
        }else{
            echo "<script>window.onload = function() { alert('No se agregó la cita correctamente.'); window.location.href = 'admCitas.php'; };</script>";
        }  
    }
    
    if(isset($_POST['btnGuardar'])){
        $idSer = $_POST["servicio"];
        $esta =$_POST["estado"];
        $fecha = $_POST["fecha"];
        $hora = $_POST["hora"];
        $id = $_POST["idCl"];

       // var_dump($idSer, $esta, $fecha, $hora, $id);       
        $con= mysqli_query($conexion,"UPDATE citas SET idServicios='$idSer', fecha='$fecha',
        hora = '$hora', estado = '$esta' WHERE idCita = '$id'");
        if($con){
            echo "<script>window.onload = function() { alert('Se actualizó la cita correctamente.'); window.location.href = 'admCitas.php'; };</script>";
        }else{
            echo "<script>window.onload = function() { alert('No se agregó la cita correctamente.'); window.location.href = 'admCitas.php'; };</script>";
        }
           
    }

    if(isset($_POST['btnEliminar'])){
        $id = $_POST['idC'];
        $sql = mysqli_query($conexion, "DELETE FROM citas WHERE idCita = '$id'");
        if($sql){
            echo '<script>alert("Eliminación exitosa"); 
            window.location = "admCitas.php";</script>';
        } else {
            echo '<script>alert("Falló");
             window.location = "admCitas.php";</script>';
        }
    } 

    
?>
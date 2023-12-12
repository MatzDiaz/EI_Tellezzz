<?php
    session_start();
    include 'Static/connect/conexion.php';

    if(isset($_POST['btnRegistrar'])){
        $nom = $_POST['nombreS'];
        $pre = $_POST['precioS'];

        //var_dump($nom, $ape, $tel, $cor, $con, $gen);
        $sql=mysqli_query($conexion, "INSERT INTO servicios (especialidad, precio)
          VALUES ('$nom','$pre')");
           if($sql == true){
                echo '<script>alert("Servicio registrado con éxito  ");</script>';
                echo '<script>window.location = "admServicios.php";</script>';
            }else{
                echo '<script>alert("Fallo al actualizar");</script>';
                echo '<script>window.location = "admServicios.php";</script>';
            } 
    }

    if(isset($_POST['btnGuardar'])){
        $nom = $_POST['nombre'];
        $pre = $_POST['precio'];
        $id = $_POST['idP'];
        //var_dump($nom, $ape, $tel, $cor, $con, $gen);

        $con= mysqli_query($conexion,"UPDATE servicios SET especialidad='$nom', precio='$pre'
        WHERE idServicios = '$id'");
        if ($con) {
            echo '<script>alert("Actualización exitosa");</script>';
            echo '<script>window.location = "admServicios.php";</script>';
        } else {
            echo '<script>alert("Fallo al actualizar");</script>';
            echo '<script>window.location = "admServicios.php";</script>';
        }
    }

    if(isset($_POST['btnEliminar'])){
        $id = $_POST['idPre'];
        $sql = mysqli_query($conexion, "DELETE FROM Servicios WHERE idServicios = '$id'");
        if($sql){
            echo '<script>alert("Eliminación  exitosa"); 
            window.location = "admServicios.php";</script>';
        } else {
            echo '<script>alert("Falló");
             window.location = "admServicios.php";</script>';
        }
    }  
?>
<?php
    session_start();
    include 'Static/connect/conexion.php';

    if(isset($_POST['btnRegistrar'])){
        $nom = $_POST['nombrer'];
        $ape = $_POST['apellidor'];
        $tel = $_POST['telefonor'];
        $cor = $_POST['emailr'];
        $con = $_POST['contrasenar'];
        $gen = $_POST['lsexor'];
        //var_dump($nom, $ape, $tel, $cor, $con, $gen);
        $sql=mysqli_query($conexion, "INSERT INTO cliente (nombre, apellido, email, contra, telefono, Genero)
          VALUES ('$nom','$ape','$cor','$con','$tel','$gen')");
           if($sql == true){
                echo '<script>alert("Cliente registrado con éxito  ");</script>';
                echo '<script>window.location = "admClientes.php";</script>';
            }else{
                echo '<script>alert("Fallo al actualizar");</script>';
                echo '<script>window.location = "admClientes.php";</script>';
            } 
    }

    if(isset($_POST['btnGuardar'])){
        $nom = $_POST['nombre'];
        $ape = $_POST['apellido'];
        $tel = $_POST['telefono'];
        $cor = $_POST['email'];
        $con = $_POST['contrasena'];
        $id = $_POST['idCl'];

        //var_dump($nom, $ape, $tel, $cor, $con, $gen);
        

        $con= mysqli_query($conexion,"UPDATE cliente SET nombre='$nom', apellido='$ape',
        contra = '$con', telefono = '$tel', email = '$cor' WHERE idCliente = '$id'");
        if ($con) {
            echo '<script>alert("Actualización exitosa");</script>';
            echo '<script>window.location = "admClientes.php";</script>';
        } else {
            echo '<script>alert("Fallo al actualizar");</script>';
            echo '<script>window.location = "admClientes.php";</script>';
        }
    }

    if(isset($_POST['btnEliminar'])){
        $id = $_POST['idC'];
        $sql = mysqli_query($conexion, "DELETE FROM cliente WHERE idCliente = '$id'");
        if($sql){
            echo '<script>alert("Eliminación exitosa"); 
            window.location = "admClientes.php";</script>';
        } else {
            echo '<script>alert("Falló");
             window.location = "admClientes.php";</script>';
        }
    }  
?>
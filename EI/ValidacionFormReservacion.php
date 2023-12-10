<?php
include 'conexion.php';
include '../../Usertype.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe los datos del formulario
    $servicio = $_POST["servicio"];
    $precio = $_POST["precio"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $idSer = $_POST["idSer"];

    echo "$servicio, $precio, $fecha, $hora, $idSer";

    // Evita la inyección de SQL utilizando sentencias preparadas
    $querry = "SELECT * FROM citas WHERE fecha = ? AND hora = ?";
    $stmt = $conexion->prepare($querry);
    $stmt->bind_param("ss", $fecha, $hora);
    $stmt->execute();
    $result_services = $stmt->get_result();

    if ($result_services->num_rows == 1) {
        echo "<script>alert('Lo sentimos ya hay una reservación para ese día y hora. Favor de cambiar la hora o el día.'); 
        window.location.href = '../../ServiciosClient.php';</script>";
    } else {
        // Asegúrate de que $idUser esté definido antes de usarlo
        $idUser = isset($idUser) ? $idUser : ''; // Ajusta esto según tu lógica de obtención del ID del usuario

        $query = "INSERT INTO citas (idCliente, idServicios, fecha, hora) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conexion->prepare($query);
        $stmt_insert->bind_param("ssss", $idUser, $idSer, $fecha, $hora);
        $stmt_insert->execute();
        echo "<script>alert('Cita agendada correctamente .'); 
        window.location.href = '../../login.php';</script>";
        header("Location:../../ServiciosClient.php");
    }
}
?>

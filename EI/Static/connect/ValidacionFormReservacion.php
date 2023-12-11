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
        $query = "SELECT hora FROM citas WHERE hora BETWEEN '08:00:00' AND '19:00:00' AND hora NOT IN (SELECT hora FROM citas WHERE fecha = ?)";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $dia);
        $stmt->execute();
        $result = $stmt->get_result();

        // Obtener las horas no asignadas
        $horas_no_asignadas = [];
        while ($row = $result->fetch_assoc()) {
            $horas_no_asignadas[] = $row['hora'];
        }

        $mensaje = "Horas disponibles para el día $dia:\n" . implode(', ', $horas_no_asignadas);
        $mensaje_js = str_replace(array("\r", "\n"), '', $mensaje); // Eliminar saltos de línea
        
        echo "<script>alert('Lo sentimos ya hay una reservación para ese día y hora. Favor de cambiar la hora o el día. Horas disponibles: " . htmlspecialchars($mensaje_js, ENT_QUOTES, 'UTF-8') . "'); 
        window.location.href = '../../ServiciosClient.php';</script>";
        
    } else {
        // Asegúrate de que $idUser esté definido antes de usarlo
        $idUser = isset($idUser) ? $idUser : ''; // Ajusta esto según tu lógica de obtención del ID del usuario
        $query = "INSERT INTO citas (idCliente, idServicios, fecha, hora) VALUES (?, ?, ?, ?)";
        $stmt_insert = $conexion->prepare($query);
        $stmt_insert->bind_param("ssss", $idUser, $idSer, $fecha, $hora);
        $stmt_insert->execute();
        
        echo "<script>window.onload = function() { alert('Se agregó la cita correctamente.'); window.location.href = '../../ServiciosClient.php'; };</script>";
    }
}
?>

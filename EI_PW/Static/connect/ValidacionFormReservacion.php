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
        // Crear un array con todas las horas desde las 8 am hasta las 7 pm
        $horas_todas = [];
        for ($h = 8; $h <= 19; $h++) {
            $horaFormato = sprintf('%02d:00:00', $h);
            $horas_todas[] = $horaFormato;
        }

        // Realizar la consulta SQL para obtener las horas agendadas
        $query = "SELECT hora FROM citas WHERE fecha = ? AND hora BETWEEN '08:00:00' AND '19:00:00'";
        $stmt = $conexion->prepare($query);
        $stmt->bind_param("s", $fecha);
        $stmt->execute();
        $resultado_sql = $stmt->get_result();

        // Obtener las horas agendadas
        $horas_agendadas = [];
        while ($row = $resultado_sql->fetch_assoc()) {
            $horas_agendadas[] = $row['hora'];
        }

        // Encontrar las horas no agendadas
        $horas_no_agendadas = array_diff($horas_todas, $horas_agendadas);

        // Convertir el array de horas no agendadas a una cadena
        $horas_no_agendadas_cadena = implode(', ', $horas_no_agendadas);

        // Imprimir o usar la cadena como desees
        echo "<script>alert('Lo sentimos ya hay una reservación para ese día y hora. Favor de cambiar la hora o el día. Horas disponibles para el dia de $fecha: $horas_no_agendadas_cadena'); 
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

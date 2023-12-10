<?php include 'Usertype.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Lista de Servicios</h2>
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>Especialidad</th>
                    <th>Precio</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Static/connect/conexion.php';
                $sql = "SELECT idServicios, especialidad, precio FROM servicios";
                $result = $conexion->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar datos de cada servicio
                    while($row = $result->fetch_assoc()) {?>
                        <tr>
                            <td><?=$row["idServicios"]?></td>
                            <td><?=$row["especialidad"]?></td>
                            <td><?=$row["precio"]?></td>
                            <td>
                                <a href="" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
                                <a href="" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
                        </tr>
                   <?php }
                } else {
                    echo "<tr><td colspan='3'>No hay servicios disponibles</td></tr>";
                }
                $conexion->close();
                ?>
            </tbody>
        </table>
    </div>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>
</html>
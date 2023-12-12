<?php include 'Usertype.php'?>
<?php 
    if(!(isset($_SESSION['email']))){
        header("Location: login.php");
    }
    
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Servicios</title>
  <link rel="stylesheet" href="Static/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<center><h1>Mis reservaciones / citas</h1></center>
    <div class="container  mt-4 ">
        <div class="row  justify-content-center">
           
            <?php
            include 'Static/connect/conexion.php'; 
            $query = 'SELECT idCliente,citas.idServicios,fecha, hora,estado, especialidad FROM citas inner join servicios on citas.idServicios=servicios.idServicios where idCliente = '.$idUser.'';
            $execute = mysqli_query($conexion, $query);
            while ($servicio = mysqli_fetch_assoc($execute)) {
                $id = $servicio['idServicios'];
                $fecha = $servicio['fecha'];
                $hora = $servicio['hora'];
                $estado = $servicio['estado'];
                $NombreSer = $servicio['especialidad'];


                
                ?>

                <div class="col-md-4 servi">
                <h4>Servicio: <?php echo $NombreSer; ?></h4>
                
                <div class="servicio">
                    <p class="align-middle">Fecha y hora: $<?php echo $fecha; ?> , <?php echo $hora; ?>Hr</p>
                </div>
                <div class="reservacion">
                    <p>Estado: $<?php echo $estado; ?></p>
                </div>
                
                </div>

                <?php
            }
            mysqli_close($conexion); // Cerrar la conexión después de usarla
            ?>
            
        </div>
    </div>


</body>
</html>

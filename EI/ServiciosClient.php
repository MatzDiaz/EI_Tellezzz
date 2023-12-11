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

<center><h1>Catálogo de servicios</h1></center>
    <div class="container mt-4">
    <div class="row">
 
        <?php
        include 'Static/connect/conexion.php'; 
        $query = 'SELECT idServicios,especialidad, precio FROM servicios';
        $execute = mysqli_query($conexion, $query);
        while ($servicio = mysqli_fetch_assoc($execute)) {
            $id = $servicio['idServicios'];
            $titulo = $servicio['especialidad'];
            $precio = $servicio['precio'];
            ?>

            <div class="col-md-4 servi">
            <h4><?php echo $titulo; ?></h4>
            <div class="servicio">
                
                <p>Precio: $<?php echo $precio; ?></p>
                
            </div>
            <div class="reservacion">
                <a href="FormReservacion.php?idServicios=<?php echo $id ; ?>">Hacer reservación</a>
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

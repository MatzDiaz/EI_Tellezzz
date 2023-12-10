<?php include 'Usertype.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Aplicación</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
  <link href="css/estilos.css" rel="stylesheet">
</head>
<body class="body">
  <header class="header">
    <h1 class="text-center">Formulario de Registro de Cita</h1>
  </header>
  <?php
    include 'Static/connect/conexion.php'; 
    if(isset($_GET['idServicios'])){
      $ID= $_GET['idServicios'];
      $querry="select * from servicios where idServicios = $ID;";
      $result_services =mysqli_query($conexion,$querry);
      if(mysqli_num_rows($result_services)==1){
          $row= mysqli_fetch_array($result_services);
          $nombre = $row['especialidad'];
          $precio = $row['precio'];
          
      }

    }

  ?>
  <main class="main">
    <div class="container mt-4 w-50" >
      <form name="frm" id="frm" method="POST" action="Static/connect/ValidacionFormReservacion.php">
        <input type="hidden" name="idSer" id="idServ" value="<?php echo $ID; ?>">
        <!-- servicio -->
        <div class="mb-3">
          
          <label for="servicio" class="form-label">Servicios:</label>
          <input type="hidden" name="servicio" id="servicio" value="<?php echo $nombre; ?>">
          <input type="text" name="servicio" id="servicio" class="form-control" value="<?php echo $nombre;?>" disabled>
          
        </div>

        <!-- precio -->
        <div class="mb-3">
          <label for="precio" class="form-label">Precio:</label>
          <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio;?>" disabled >
          <input type="hidden" name="precio" id="precio" value="<?php echo $precio; ?> " readonly>

        </div>

        <!-- dia -->
        <div class="mb-3">
          <label for="fecha" class="form-label">Selecciona una fecha para la cita:</label>
          <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>">
          <p class="alert alert-danger d-none" id="tel">Ingresa el número de teléfono válido!!</p>
        </div>

        <!-- hora -->
        <label for="hora" class="form-label">Selecciona una hora:</label>
        <select name="hora" id="hora">
          <?php
          // Genera las opciones desde las 8 AM hasta las 7 PM
          for ($hora = 8; $hora <= 19; $hora++) {
              // Ajusta el formato de las horas (puedes usar 'h' para formato de 12 horas si lo prefieres)
              $horaFormato = sprintf('%02d:00:00', $hora);
              echo "<option name='horaS' id='horaS' class='form-control' value=\"$horaFormato\">$horaFormato</option>";
          }
          ?>
        </select>
        <div class="mb-3">
          <input type="submit" value="Enviar Datos" class="btn btn-primary" >
          <a href="ServiciosClient.php"  class="btn btn-primary">Regresar</a>
          <p class="alert alert-success d-none" id="btn">Gracias por contestar la encuesta!!</p>
        </div>
      </form>
    </div>
  </main>
</body>
<script type="text/javaScript" src="Static/js/validaciones.js"></script>
</html>
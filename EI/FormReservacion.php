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
      <form name="frm" id="frm" >
        
        <!-- servicio -->
        <div class="mb-3">
          <label for="nombre" class="form-label">Servicios:</label>
          <input type="text" name="servicio" id="servicio" class="form-control" value="<?php echo $nombre;?>" disabled>
          
        </div>

        <!-- precio -->
        <div class="mb-3">
          <label for="apellido" class="form-label">Precio:</label>
          <input type="text" name="precio" id="precio" class="form-control" value="<?php echo $precio;?>" disabled>
          
        </div>

        <!-- dia -->
        <div class="mb-3">
          <label for="fecha" class="form-label">Selecciona una fecha a partir de hoy:</label>
          <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>">
          <p class="alert alert-danger d-none" id="tel">Ingresa el número de teléfono válido!!</p>
        </div>

        <!-- Email -->
        <div class="mb-3">
          <label for="email" class="form-label">E-mail:</label>
          <input type="text" name="email" id="email" class="form-control">
          <p class="alert alert-danger d-none" id="mail">Ingresa el correo válido!!</p>
        </div>

        <!-- Contra -->
        <div class="mb-3">
          <label for="contrasena" class="form-label">Contraseña:</label>
          <input type="text" name="contrasena" id="contrasena" class="form-control" onchange="frm.direccion.value=frm.direccion.value.toUpperCase()">
          <p class="alert alert-danger d-none" id="dir">Ingresa la contraseña!!</p>
        </div>

        <div class="mb-3">
          <label for="sexo" class="form-label">Género:</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="lsexo" id="lsexo1" value="Mujer">
            <label class="form-check-label" for="lsexo1">Mujer</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="lsexo" id="lsexo2" value="Hombre">
            <label class="form-check-label" for="lsexo2">Hombre</label>
          </div>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="lsexo" id="lsexo3" value="Otro">
            <label class="form-check-label" for="lsexo3">Otro</label>
          </div>
          <p class="alert alert-danger d-none" id="s">Selecciona tu género!!</p>
        </div>

        <div class="mb-3">
          <input type="button" value="Enviar Datos" class="btn btn-primary" onclick="validacion()">
          <p class="alert alert-success d-none" id="btn">Gracias por contestar la encuesta!!</p>
        </div>
      </form>
    </div>
  </main>
</body>
<script type="text/javaScript" src="Static/js/validaciones.js"></script>
</html>
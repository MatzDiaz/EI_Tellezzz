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
    <h1 class="text-center">Formulario de Registro</h1>
  </header>
  <main class="main">
    <div class="container mt-4 w-50" >
      <form name="frm" id="frm" method="POST" action="php/alta.php">
        
        <!-- Nombre -->
        <div class="mb-3">
          <label for="nombre" class="form-label">Nombre:</label>
          <input type="text" name="nombre" id="nombre" class="form-control" onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
          <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
        </div>

        <!-- Apellido -->
        <div class="mb-3">
          <label for="apellido" class="form-label">Apellido:</label>
          <input type="text" name="apellido" id="apellido" class="form-control" onchange="frm.apellido.value=frm.apellido.value.toUpperCase()">
          <p class="alert alert-danger d-none" id="app">Ingresa el apellido válido!!</p>
        </div>

        <!-- Teléfono -->
        <div class="mb-3">
          <label for="telefono" class="form-label">Teléfono:</label>
          <input type="text" name="telefono" id="telefono" class="form-control" onkeypress="if(event.keyCode<48 || event.keyCode >57){ event.returnValue=false; }">
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
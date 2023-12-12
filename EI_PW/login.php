<?php include 'Usertype.php'?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Inicio de Sesión</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="Static/css/styles.css">
  <script src="Static/js/validacion.js"></script>
</head>
<body>

<div class="container w-50">
  <form method="POST" name="frm1" id="formulario" action="Static/connect/validacion.php">
    <!-- Correo -->
    <h2 class="mt-4 mb-3">Iniciar sesión</h2>
    <div class="mb-3">
      <label for="correo" class="form-label">Usuario</label>
      <input type="text" name="correo" id="correo" class="form-control" placeholder="Usuario" onchange="validarCorreo()">
      <div id="errorCor" class="text-sm alert alert-danger mt-1" style="display: block;">
        El administrador no puede quedar vacío
      </div>
    </div>

    <!-- Contraseña -->
    <div class="mb-3">
      <label for="password" class="form-label">Contraseña</label>
      <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" oninput="validarPass()">
      <div id="errorPas" class="alert alert-danger mt-1" style="display: block;">
        La contraseña debe tener de 7 a 14 caracteres y solo puede contener números, letras, # y @. No se permiten puntos ni guiones bajos.
      </div>
    </div>

    <!-- Botón -->
    <div class="mb-3">
      <!-- Llama a la función validarCampos() al hacer clic en el botón -->
      <input type="submit" value="Enviar Datos" id="boton" class="btn btn-primary" onclick="validarCampos()">
      <div id="btnEnviar" class="alert alert-success mt-1" style="display: none;">
        Datos correctos
      </div>
    </div>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

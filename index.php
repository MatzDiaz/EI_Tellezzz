<?php include 'Usertype.php'?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenida a la Barbería</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Encabezado con Carrusel de Imágenes -->
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="Static/img/corte1.jpg" height="500" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="Static/img/corte2.jpg" height="500" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="Static/img/corte3.jpg" height="500" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
</header>

<!-- Mensaje de Bienvenida -->
<section class="container mt-4">
  <div class="row">
    <div class="col-12 text-center">
      <h1>Bienvenido a Barberia UPEMOR</h1>
      <p>Somos un equipo de barberos apasionados por ofrecer los mejores cortes de cabello y estilos de barba.</p>
      <p>Nuestro compromiso es brindarte un servicio de calidad y hacerte lucir y sentir genial.</p>
      <img src="Static/img/barberia.jpg" class="d-block w-100"></img>
    </div>
  </div>
</section>

<section class="container mt-4">
    <h2 class="text-center">Consejos de Cuidado del Cabello y la Barba</h2>
    <div class="row">
        <div class="col-md-6">
        <div class="card mb-3">
            <img src="Static/img/jabon.png" height="200" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">Consejo 1: Lavar el cabello correctamente</h5>
            <p class="card-text">Asegúrate de utilizar el champú adecuado y enjuagar completamente el cabello para mantenerlo limpio y saludable.</p>
            </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="card mb-3">
            <img src="Static/img/hidrata.png" height="200" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">Consejo 2: Hidratar la barba</h5>
            <p class="card-text">Aplica aceites o bálsamos para mantener la barba suave y evitar la sequedad y el picor.</p>
            </div>
        </div>
        </div>
    </div>
</sectrion>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

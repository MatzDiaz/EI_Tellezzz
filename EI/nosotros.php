<?php include'includes/header.php' ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Barbería UPEMOR</title>
  <link rel="stylesheet" href="Static/css/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-md-6">
        <article class="article p-4">
            <h2>Historia de Barbería UPEMOR</h2>
            <p>Abrimos nuestras puertas en 1980 con el objetivo de ofrecer cortes de cabello a la moda, explorando estilos únicos desde los 80 para que nuestros clientes luzcan un look original, creado por quienes formamos parte de Barbería Cuernavaca.</p>
            <p>Es crucial mencionar que hemos acumulado una amplia experiencia a lo largo de nuestra trayectoria, siempre comprometidos a brindar calidad y elegancia a cada cliente que nos visita.</p>

            <h2>Nuestros Servicios</h2>
            <p>En Barbería UPEMOR, ofrecemos una amplia gama de servicios, incluyendo:</p>
            <ul>
            <li>Cortes de cabello modernos y clásicos.</li>
            <li>Afeitado de barba y mantenimiento.</li>
            <li>Asesoramiento de estilos y cuidado capilar.</li>
            </ul>
        </article>
    </div>
    <div class="col-md-6">
        <article class="article p-4">
        <!-- Contenido del segundo artículo -->
            <img src="Static/img/estilista.png" width="60" height="60"></img><h2>Nuestra Diferenciación</h2>
            <p>Lo que nos distingue de nuestra competencia es la precisión y exactitud en nuestros cortes de cabello y barba. Contamos con un equipo de última generación que nos permite realizar cortes de manera eficiente y precisa.</p>
            <p>Nuestro enfoque va más allá, sugerimos a nuestros clientes un look diferente, uno que les permita expresar una nueva identidad.</p>
        </article>
    </div>
  </div>

    <div class="container mt-4">
        <div class="row">
        <div class="col-md-6">
            <h3><i class="bi bi-telephone"></i> Teléfono</h2>
            <p>777-534-7330</p>
            <p>777-216-4480</p>

            <h3><i class="bi bi-envelope"></i> Email</h2>
            <p>barber@upemor.edu.mx</p>

            <h3><i class="bi bi-clock"></i> Horario</h2>
            <p>
            <strong>Lun.-Sab.</strong> 09:00 - 20:00<br>
            <strong>Dom.</strong> 10:00 - 18:00
            </p>

            <h3><i class="bi bi-geo-alt"></i> Dirección</h2>
            <p>
            P.º CUAUHNÁHUAC 566, LOMEAS DEL TEXCAL<br>
            JIUTEPEC, MOR, C.P. 62574
            </p>
        </div>

        <div class="col-md-6 map" id="map" >
            <h3>Mapa UPEMOR</h3>
            <img src="Static/img/mapa.png" class="imgM"></img>
        </div>
        </div>
    </div>
</div>
<script src="Static/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=initMap()" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

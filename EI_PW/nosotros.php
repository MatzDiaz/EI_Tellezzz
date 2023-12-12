<?php include 'Usertype.php'?>
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
            <img src="Static/img/estilista.png" width="60" height="60"></img><h2>Nuestra Diferencia</h2>
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
            AV.º CUAUHNÁHUAC 566, LOMAS DEL TEXCAL<br>
            JIUTEPEC, MOR, C.P. 62574
            </p>
        </div>

        <div class="col-md-6 map" id="map" >
            <h3>Mapa UPEMOR</h3>
            <iframe class="imgM" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3774.9391500921024!2d-99.14288538893545!3d18.88978048220293!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ce7436090d122b%3A0x2acb88c1b5c1452a!2sUniversidad%20Polit%C3%A9cnica%20del%20Estado%20de%20Morelos!5e0!3m2!1ses-419!2smx!4v1702080926828!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
        </div>
        </div>
    </div>
</div>
<script src="Static/js/mapa.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=initMap()" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

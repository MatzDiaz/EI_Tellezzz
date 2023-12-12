function initMap() {
    // Coordenadas de la UPEMOR
    var upemorCoords = { lat: 18.885525, lng: -99.219556 };

    // Crea un mapa nuevo en el contenedor con id="map"
    var map = new google.maps.Map(document.getElementById('map'), {
      center: upemorCoords,
      zoom: 15 // Nivel de zoom inicial
    });

    // Crea un marcador en la ubicación de la UPEMOR
    var marker = new google.maps.Marker({
      position: upemorCoords,
      map: map,
      title: 'Universidad Politécnica del Estado de Morelos (UPEMOR)'
    });
  }
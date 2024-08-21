<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Resourses/Css/mapa.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/><script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
    <title>Publicar</title>
</head>
<body>
    <header>

    </header>
    <h1> Formulario para crear un Anuncio</h1><br>
    <h2> vamos a crear un Anuncio</h2><br>
   
    

    <form action="/publicar"  id="formulario" method="POST" >
        <!-- id de usuario -->
        
        <label for="map">Ubicación:</label>
        <div id="map" style="height: 400px;"></div><br>
            <input type="hidden" id="latitud" name="latitud">
            <input type="hidden" id="longitud" name="longitud">
            <input type="submit" value="Guardar">      
    </form>
   
   <script>
            var map = L.map('map').setView([51.505, -0.09], 13);
            var popup = L.popup();
            function onMapClick(e) {
            popup
            .setLatLng(e.latlng)
            .setContent("Has clickeado en la ubicacion con coordenadas " + e.latlng.toString())
            .openOn(map);}
            map.on('click', onMapClick);
            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'}).addTo(map);

            map.on('click', function(e) {
            var latitud = e.latlng.lat.toFixed(6);
            var longitud = e.latlng.lng.toFixed(6);
            document.getElementById('latitud').value = latitud;
            document.getElementById('longitud').value = longitud;});
    </script>
</body>
</html>
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
    <h1>Formulario para editar Anuncio</h1><br>
    <h3>Datos de la ubicación</h3>
    <div>
        <p>Latitud: <?=$formulario['latitud'] ?></p>
        <p>Longitud: <?=$formulario['longitud'] ?></p>
    </div>

    <form action="/publicacion/<?=$formulario['id_formulario']?>/actualizar" id="formulario" method="POST">
    <label for="sector">Seleccione o ingrese un sector:</label>
<input type="text" value="<?=$formulario['sector'] ?>" id="sector" name="sector" list="ubicaciones" onclick="showSuggestions()">
<datalist id="ubicaciones">
    <option value="Guanujo">
    <option value="Universidad">
    <option value="Mantilla">
    <option value="Alpachaca">
    <option value="El Dorado">
    <option value="Floresta">
    <option value="Primero de Mayo">
    <option value="Trigales">
    <option value="Los Tanques">
    <option value="Indio Guaranga">
    <option value="Empresa Eléctrica">
    <option value="Montufar">
    <option value="Colinas">
    <option value="El Terminal">
    <option value="La Guitarra">
    <option value="La Playa">
    <option value="Laguacoto">
    <option value="9 de Octubre">
    <option value="5 de Junio">
    <option value="La Merced">
    <option value="Juan XIII">
    <option value="Fausto Basante">
    <option value="Cruz Roja">
    <option value="Parque Industrial">
    <option value="Chalata">
    <option value="Tomabela">
    <option value="Joyocoto">
    <option value="Vinchoa">
    <option value="Casipamba">
    <option value="Peñon">
    <option value="San Bartolo">
    <option value="Bellavista">
    <option value="El Cortijo">
    <option value="Loma del Calvario">
    <option value="Negroyaco">
</datalist><br>

        <label for="map">Ubicación:</label>
        <div id="map" style="height: 400px;"></div><br>
        <input type="hidden" id="latitud" name="latitud" value="<?=$formulario['latitud'] ?>">
        <input type="hidden" id="longitud" name="longitud" value="<?=$formulario['longitud'] ?>">
        <input type="submit" value="Guardar">
    </form>

    <script>
    var initialLat = <?=$formulario['latitud']?>; // Obtener latitud inicial desde PHP
    var initialLng = <?=$formulario['longitud']?>; // Obtener longitud inicial desde PHP

    var map = L.map('map').setView([initialLat, initialLng], 13);
    var popup = L.popup();

    function onMapClick(e) {
        popup
            .setLatLng(e.latlng)
            .setContent("Has clickeado en la ubicación con coordenadas " + e.latlng.toString())
            .openOn(map);

        // Mover el marcador al lugar donde se hizo clic
        marker.setLatLng(e.latlng);
        document.getElementById('latitud').value = e.latlng.lat.toFixed(6);
        document.getElementById('longitud').value = e.latlng.lng.toFixed(6);
    }

    map.on('click', onMapClick);

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);

    // Agregar un marcador inicial con la ubicación actual
    var marker = L.marker([initialLat, initialLng], { draggable: false }).addTo(map);
    </script>
    <script>
        function showSuggestions() {
            const ubicacionInput = document.getElementById("sector");
            const ubicacionesDatalist = document.getElementById("formulario");
            ubicacionInput.setAttribute("list", "formulario");
            ubicacionesDatalist.style.display = "display";
        }
    </script>
    
</body>
</html>
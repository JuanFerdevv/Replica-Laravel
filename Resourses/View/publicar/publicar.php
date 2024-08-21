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
    
    

    <form action="/perfil/<?=$perfil['usuario_id']?>/crear_anuncio/post"  id="formulario" method="POST" >
    <fieldset>
    <label for="tipo_inmueble">Tipo de Inmueble:</label>
        <select id="tipo_inmueble" name="tipo_inmueble" required>
            <option value="habitacion_estudiantil">Habitacion estudiantil</option>
            <option value="departamento">Departamento</option>
            <option value="casa">Casa</option>
            <option value="mini Departamento">Mini Departamento</option>
        </select><br><br>
    </fieldset>
    <fieldset>
    <label for="nombre_calle">Nombre de la Calle:</label>
        <input type="text" id="nombre_calle" name="nombre_calle" required><br><br>
    </fieldset>
    <fieldset>
    <label for="referencias">Referencias:</label>
        <textarea id="referencias" name="referencias" required></textarea><br><br>
    </fieldset>
    <fieldset>
    <label for="sector">Seleccione o ingrese una ubicación:</label>
        <select id="sector" name="sector" required>
            <option value="Guanujo">
            <option value="Guanujo">Guanujo</option>
            <option value="Universidad">Universidad</option>
            <option value="Mantilla">Mantilla</option>
            <option value="Alpachaca">Alpachaca</option>
            <option value="El Dorado">El Dorado</option>
            <option value="Floresta">Floresta</option>
            <option value="Primero de Mayo">Primero de Mayo</option>
            <option value="Trigales">Trigales</option>
            <option value="Los Tanques">Los Tanques</option>
            <option value="Indio Guaranga">Indio Guaranga</option>
            <option value="Empresa Eléctrica">Empresa Eléctrica</option>
            <option value="Montufar">Montufar</option>
            <option value="Colinas">Colinas</option>
            <option value="El Terminal">El Terminal</option>
            <option value="La Guitarra">La Guitarra</option>
            <option value="La Playa">La Playa</option>
            <option value="Laguacoto">Laguacoto</option>
            <option value="9 de Octubre">9 de Octubre</option>
            <option value="5 de Junio">5 de Junio</option>
            <option value="La Merced">La Merced</option>
            <option value="Juan XIII">Juan XIII</option>
            <option value="Fausto Basante">Fausto Basante</option>
            <option value="Cruz Roja">Cruz Roja</option>
            <option value="Parque Industrial">Parque Industrial</option>
            <option value="Chalata">Chalata</option>
            <option value="Tomabela">Tomabela</option>
            <option value="Joyocoto">Joyocoto</option>
            <option value="Vinchoa">Vinchoa</option>
            <option value="Casipamba">Casipamba</option>
            <option value="Peñon">Peñon</option>
            <option value="San Bartolo">San Bartolo</option>
            <option value="Bellavista">Bellavista</option>
            <option value="El Cortijo">El Cortijo</option>
            <option value="Loma del Calvario">Loma del Calvario</option>
            <option value="Negroyaco">Negroyaco</option>
        </select><br><br>  
        </fieldset> 
        <div>
            <input type="hidden" value="<?=$perfil['usuario_id']?>" type="text" name="usuario_id" id="usuario_id">
        </div>
        <fieldset>
        <label for="map">Ubicación:</label>
        <fieldset>
        <div id="map" style="height: 400px;"></div><br>
            <input type="hidden" id="latitud" name="latitud">
            <input type="hidden" id="longitud" name="longitud">

            <fieldset>
            <legend>Servicios Básicos:</legend>
            <input type="checkbox" name="servicios_basicos[]" value="agua"> Agua<br>
            <input type="checkbox" name="servicios_basicos[]" value="luz"> Luz<br>
            <input type="checkbox" name="servicios_basicos[]" value="ducha_caliente"> Ducha Caliente<br>
            <input type="checkbox" name="servicios_basicos[]" value="internet"> Internet<br>
        </fieldset>

        <fieldset>
            <legend>Servicios Adicionales:</legend>
            <input type="checkbox" name="servicios_adicionales[]" value="se_permite_mascotas"> Se Permite Mascotas<br>
            <input type="checkbox" name="servicios_adicionales[]" value="parqueadero"> Parqueadero<br>
            <input type="checkbox" name="servicios_adicionales[]" value="tv"> TV<br>
            <input type="checkbox" name="servicios_adicionales[]" value="closet"> Closet<br>
            <input type="checkbox" name="servicios_adicionales[]" value="muebles_cocina"> Muebles de Cocina<br>
        </fieldset>

        <fieldset>
            <legend>Antigüedad del Inmueble:</legend>
            <input type="radio" name="antiguedad" value="nuevo"> Nuevo<br>
            <input type="radio" name="antiguedad" value="anios"> Años <input type="number" name="anios" min="1"><br>
        </fieldset>

        <fieldset>
            <legend>Garantía:</legend>
            <input type="radio" name="garantia" value="si"> Sí <input type="text" name="garantia_texto"><br>
            <input type="radio" name="garantia" value="no"> No<br>
        </fieldset>

        <label for="pago_mensual">Pago Mensual:</label>
        <input type="text" name="pago_mensual"><br><br>

       <!--  <div>
            <input type="hidden" value="<?=$perfil['id']?>" type="text" name="usuario_id" id="usuario_id">
        </div> -->

        <fieldset>
            <legend>Descripción del Inmueble:</legend>
            <label for="titulo">Título:</label>
            <input type="text" name="titulo"><br>
            <label for="descripcion">Descripción:</label><br>
            <textarea name="descripcion" rows="4" cols="50"></textarea>
        </fieldset>
            <input type="submit" value="Guardar">      
    </form>
   
   <script>
            var map = L.map('map').setView([-1.571269,  -79.006827], 13);
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
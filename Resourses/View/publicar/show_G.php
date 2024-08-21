<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <link rel="stylesheet" href="/Assets/estilos/mapa.css">
    <link rel="stylesheet" href="/Assets/estilos/sliderPGeneral.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/><script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>
     <script src="/Assets/Js/sliderGeneral.js" defer></script>
     <script src="https://kit.fontawesome.com/e7ae999fb6.js" crossorigin="anonymous"></script>
    <title>Ubicación exacta</title>
   
</head>
<header>

<nav class="navbar">
    <a href="/" class="logo">
        <img src="/Assets/Imagenes/Group.png" alt="Alquileres Guaranda">
    </a>
   <ul class="navlinks" id="navlinks">
        
        <li><a href="/busca_tu_anuncio">Buscar</a></li>
        <li><a class="btn" href="/login"><button>Ingresar</button></a></li>
   </ul> 
   
<div class="menu" id="menu">
    <i class="fa-solid fa-bars"></i>
</div>

</nav>
</header>
<?php foreach ($formulario as $datos): ?>
<body>
    
    <h3><?=$datos['titulo'] ?><br></h3>

        <a class="regresar" href="/publicaciones">
        <i class="fa-solid fa-arrow-left"></i>
       
        </a><br><br>
        
        
       
                <div class="wrapper">
                    <i id="left" class="fa-solid fa-angle-left"></i>
                    <div class="carousel">
                    <?php if (!empty($datos['ruta_archivo'])): ?>
                        <?php $rutas_archivos = $datos['ruta_archivo']; ?>
                        <?php foreach ($rutas_archivos as $ruta): ?>
                            <?php if (!empty($ruta)): ?>
                                <img src="/<?php echo $ruta; ?>" width="300" height="300" alt="Imagen">
                            <?php else: ?>
                                <p>No hay imágenes disponibles</p>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </div>
                    <i id="right" class="fa-solid fa-angle-right"></i>
                 </div>
             
                 <!-- <?=$perfil['celular']?> -->
                <div class=" wasap">     
                <p><a href="https://wa.me/593<?=$perfil['celular'] ?>" target="_blank">Chatea conmigo en WhatsApp</a></p>
                <i class="fa-brands fa-whatsapp"></i>
                </div>    
                <div class="textos"> 
                <h2>Tipo de inmueble: <?php echo ucwords(str_replace('_', ' ', $datos['tipo_inmueble'])); ?></h2>
                <h2>Pago mensual: $<?=$datos['pago_mensual'] ?><br></h2>
                <h2>Sector del inmueble: <?=$datos['sector'] ?><br></h2>
                <h2>Servicios basicos:</h2>    <p><?php echo str_replace('_', ' ', $datos['servicios_basicos']); ?></p>
                <h2>Servicios adicicionales:</h2>    <p><?php echo str_replace('_', ' ', $datos['servicios_adicionales']); ?></p>
                <h2>Descripcion del inmueble:</h2> 
                    <p><?php echo ucwords($datos['descripcion']); ?></p>
                <h2>Nombres de las calles:</h2>    <p><?=$datos['nombre_calle'] ?></p>
                  
                <h2>Referencias: </h2>    <p> <?=$datos['referencias'] ?><br></p>
                    <p>Ubicación: <br></p>
                </div>
            <div id="map" ></div><br>
    <script>
        var latitud = <?=$datos['latitud'] ?>;
        var longitud = <?=$datos['longitud'] ?>;
        
        var map = L.map('map').setView([latitud, longitud], 15);
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 17,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        // Agrega un marcador en la ubicación
        L.marker([latitud, longitud]).addTo(map);
    </script>
     <?php endforeach ?>

    
    
        
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <link rel="stylesheet" href="/Assets/estilos/busca_tu_anuncio.css">
    <title>Busca tu anuncio</title>
</head>
<header>    

<nav class="navbar">
    <a href="/" class="logo">
        <img src="/Assets/Imagenes/Group.png" alt="Alquileres Guaranda">
    </a>
   <ul class="navlinks" id="navlinks">
        <li><a href="/busca_tu_anuncio">Buscar</a></li>
        <!-- <li><a href="/publicaciones">Publicar Anuncio</a></li>  -->
        <li><a class="btn" href="/login"><button>Ingresar</button></a></li>
   </ul> 
   
<div class="menu" id="menu">
    <i class="fa-solid fa-bars"></i>
</div>

</nav>
</header>
<body>
    <h1 style="text-align: center; margin-top:  50px;">¡Busca tu anuncio ideal!</h1>
    
    <div class="fcuest">
    <form  action="/busca_tu_anuncio" method="post" class="flex">
    <input
      class="peer h-full w-full rounded-md border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-3 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
      placeholder=" "
    />
    <button type="submit">Buscar</button>
    </form >
    </div>

    <div class="contenedor2">
    <form class="fcuest2" action="/busca_tu_anuncio" method="post" class="flex">
    <select id="tipo_inmueble" name="tipo_inmueble">
        <option value="">Tipo de inmueble</option>
        <option value="habitacion_estudiantil">habitacion estudiantil</option>
        <option value="casa">casa</option>
        <option value="departamento">departamento</option>
    </select >

    <select id="sector" name="sector">
        <option value="">Seleccione sector</option>
        <option value="universidad">Universidad</option>
        <option value="guanujo">Guanujo</option>
        <option value="colinas">colinas</option>
    </select >

    <select id="precio" name="sector">
        <option value="">Seleccione precio</option>
        <option value="universidad">Menor a Mayor</option>
        <option value="guanujo">Mayor a Menor</option>
    </select >

    <button type="submit">Buscar</button>
        </form >

  </div>
 
    <?php foreach ($join as $inmueble): ?>
        <div class="contenedor">
        
            <div class="carta"></div>
                    <figure>
                        <?php if (!empty($inmueble['ruta_archivo'][0])): ?>
                            <img src="<?php echo $inmueble['ruta_archivo'][0]; ?>" alt="Imagen" style="width: 300px; height: 300px;">
                        <?php else: ?>
                            <p>No hay imágenes disponibles</p>
                        <?php endif; ?>
                    </figure>
                <div class="contenido">
                
                    <a href="/publicaciones/<?= $inmueble['id_formulario']?>">
                    <h2><?php echo ucwords($inmueble['titulo']); ?></h2></a>
                    
                <h2><?php echo ucwords(str_replace('_', ' ', $inmueble['tipo_inmueble'])); ?></h2>
                <h2>$<?php echo $inmueble['pago_mensual']; ?></h2>
                <h3>Sector: <?php echo ucwords($inmueble['sector']); ?></h3>
                <p><?php echo str_replace('_', ' ', $inmueble['servicios_basicos']); ?></p>
                <p><?php echo str_replace('_', ' ', $inmueble['servicios_adicionales']); ?></p>
                <p><?php echo ucwords($inmueble['descripcion']); ?></p>
                </div>
                
                
            </div>
        </div>
        <?php endforeach; ?>   
    </div>
 
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <link rel="stylesheet" href="/Assets/estilos/anuncio_perfil.css">
    <title>Mi perfil</title>
</head>
<body>
<header>

<nav class="navbar">
    <a href="/" class="logo">
        <img src="/Assets/Imagenes/Group.png" alt="Alquileres Guaranda">
    </a>
   <ul class="navlinks" id="navlinks">
        <li><a href="/busca_tu_anuncio">Buscar</a></li>
        <li><a href="/perfil/<?=$perfil['usuario_id'] ?>/crear_anuncio">Publicar Anuncio</a></li> 
      
                <!-- Mostrar el nombre del usuario y un enlace a su perfil si ha iniciado sesión -->
                
           
                <!-- Mostrar el botón de inicio de sesión si no ha iniciado sesión -->
                <li><a class="btn" href="/login"><button>Ingresar</button></a></li>
            
   </ul> 
   
<div class="menu" id="menu">
    <i class="fa-solid fa-bars"></i>
</div>

</nav>
</header>


    <a href="/">Ir a pagina principal</a><br>
    

    
        <div class="titulo">
    <br><h2 class="titulo">Tus publicaciones</h2><br>
    </div>

    


    <div class="contenedor1">
        <a href="/perfil/<?=$perfil['usuario_id'] ?>/crear_anuncio">Crear Anuncio</a><br><br>
    </div>
    <?php foreach ($join as $inmueble): ?>
    <div class="contenedor">
        
        <div class="carta"></div>
                <figure>
                    <?php if (!empty($inmueble['ruta_archivo'][0])): ?>
                        <img src="/<?php echo $inmueble['ruta_archivo'][0]; ?>" alt="Imagen" style="width: 300px; height: 300px;">
                    <?php else: ?>
                        <p>No hay imágenes disponibles</p>
                    <?php endif; ?>
                </figure>
            <div class="contenido">
            
                <a href="/perfil/<?= $inmueble['usuario_id']?>/anuncio/<?= $inmueble['id_formulario']?>">
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


    <style>
    .item-container {
        display: flex;
        margin-bottom: 20px;
    }

    .image-container {
        float: left;
        margin-right: 20px;
    }

    .text-container {
        flex: 1;
    }
</style>
   
    
      
</body>

</html>
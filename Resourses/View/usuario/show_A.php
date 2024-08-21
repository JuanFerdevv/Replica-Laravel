<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
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
        <li><a href="/publicaciones">Publicar Anuncio</a></li> 
        <li><a class="btn" href="/login"><button>Ingresar</button></a></li>
   </ul> 
   
<div class="menu" id="menu">
    <i class="fa-solid fa-bars"></i>
</div>

</nav>
</header>
    <a href="/perfil">Ir a lista</a>
    

    <h1>detalles del perfil de usuario</h1>
    <a href="/perfil/<?= $perfil['id'] ?>/edit">editar informacion</a><br>
    

    <p>nombre: <?=$perfil['nombre'] ?> </p>
    <p>apellido <?=$perfil['apellido'] ?> </p>
    <p>email <?=$perfil['email'] ?> </p>
    <p>cedula <?=$perfil['cedula'] ?> </p>
    <p>celular <?=$perfil['celular'] ?> </p>
    <p>contraseña <?=$perfil['contrasena'] ?> </p>

    <form action="/perfil/<?= $perfil['id'] ?>/delete" method="POST">
        <button>eliminar</button>
    </form>

    <h1>Lista de publicaciones</h1>
    <!-- <a href="/perfil/<?=$perfil['id']?>/all_anuncios">Todos mis anuncios</a><br> -->

    <a href="/perfil/<?=$perfil['id']?>/publicar">Crear Anuncio</a>
   
   

    <ul> 
        <?php foreach($result as $model): ?>
            <li>
                <a href="/perfil/<?=$model['usuario_id'] ?>/ubicacion/<?=$model['id'] ?>">
                    <?=$model['sector'] ?><br>
                    <?=$model['tipo_inmueble'] ?><br>
                    <?=$model['nombre_calle'] ?><br>
                    <?=$model['referencias'] ?><br>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
    <ul> 
        <?php foreach($medias as $MediaModel): ?>
            <li>
                <a href="/perfil/ubicacion/<?=$MediaModel['usuario_id'] ?>">
                    <?=$MediaModel['file_name'] ?><br>
                    
                </a>
            </li>
        <?php endforeach ?>
    </ul>
        <?php foreach($inmueble as $inmuebleModel): ?>
                <li>
                    <a href="/perfil/ubicacion/<?=$inmuebleModel['usuario_id'] ?>">
                        <?=$inmuebleModel['titulo'] ?><br>
                        
                    </a>
                </li>
        <?php endforeach ?>
    
</body>
</html>
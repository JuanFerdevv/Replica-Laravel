<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <title>Busca tu Anuncio</title>
</head>
<body>
    <header>
    <nav class="navbar">
        <a href="/" class="logo">
            <img src="/Assets/Imagenes/Group.png" alt="Alquileres Guaranda">
        </a>
        <ul class="navlinks" id="navlinks">
                <li><a href="/busca_tu_anuncio">Buscar</a></li>
                <li><a href="/publicar">Publicar Anuncio</a></li> 
                <li><a class="btn" href="/login"><button>Ingresar</button></a></li>
        </ul> 
        <div class="menu" id="menu">
            <i class="fa-solid fa-bars"></i>
        </div>

    </nav>    
    </header>
<Main>
<ul> 
        <?php foreach($ubicacion as $Ubicaciones): ?>
            <li>
                <a href="publicaciones/<?=$Ubicaciones['id']?>">
                    <?=$Ubicaciones['id'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</Main>


</body>
</html>
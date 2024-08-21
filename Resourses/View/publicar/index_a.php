<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <title>Document</title>
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
<body>
    <h1 style="text-align: center; margin-top: 50px;">¡Busca tu anuncio ideal!</h1>
    
    <a href="/publicar/crear">Crear anuncio</a><br><br>
    <ul> 
        <?php foreach($formulario as $formulario): ?>
            <li>
                <a href="/publicaciones/<?=$formulario['id_formulario']?>">
                    <?=$formulario['titulo'] ?><br>
                </a>
                <?=$formulario['tipo_inmueble'] ?><br>
                <?=$formulario['pago_mensual'] ?><br>
                <?=$formulario['sector'] ?><br>
                <?=$formulario['servicios_basicos'] ?><br>
            </li><br><br>
        <?php endforeach ?>
    </ul>
</body>
</html>
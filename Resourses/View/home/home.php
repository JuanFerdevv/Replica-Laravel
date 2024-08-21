<?php
session_start();?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <link rel="stylesheet" href="/Assets/estilos/last.css">
    <link rel="stylesheet" href="/Assets/estilos/footer.css">
    <link rel="stylesheet" href="/Assets/estilos/Estilo_ingresar.css">
    <link rel="stylesheet" href="/Assets/estilos/mediaQueries.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="/Assets/estilos/slider.css">
    <!-- <script src="/Assets/Js/last.js" defer ></script> -->
    <!-- <script src="/Assets/Js/slider.js" defer></script> -->
    
    
    <title>Alquileres Guaranda</title>
</head> 
<body>
<header>    

    <nav class="navbar">
        <a href="/" class="logo">
            <img src="/Assets/Imagenes/Group.png" alt="Alquileres Guaranda">
        </a>
        <ul class="navlinks" id="navlinks">
            <li><a href="/busca_tu_anuncio">Buscar</a></li>
            <!-- <li><a href="/publicar/<?php echo $_SESSION['usuario_id']; ?>">Publicar Anuncio</a></li> -->
            <li><a class="btn" href="/login"><button>Ingresar</button></a></li>
        </ul> 
   
        <div class="menu" id="menu">
        <i class="fa-solid fa-bars"></i>
        </div>

    </nav>
</header>
<?php
if (isset($_SESSION['nombre'])) {
    $nombreUsuario = $_SESSION['nombre'];
    echo "¡Hola, $nombreUsuario!";
} else {
    // Código para mostrar contenido cuando el usuario no ha iniciado sesión
}
?>


    <div class="wrapper">
        <h3>Publicaciones destacadas</h3>
        <i id="left" class="fa-solid fa-angle-left"></i>
        <div class="carousel">
        <?php
            $contador = 0; // Inicializa el contador

            foreach ($home as $home):
                if ($contador < 4): // Verifica si el contador es menor que 4
                    if (!empty($home['ruta_archivo'][0])):
            ?>
                        <a href="/publicaciones/<?=$home['id_formulario'] ?>">
                            <img src="/<?php echo $home['ruta_archivo'][0]; ?>" alt="Img" draggable="false">
                        </a>
            <?php
                    else:
            ?>
                        <p>No hay imágenes disponibles</p>
            <?php
                    endif;
                    $contador++; 
                endif;
            endforeach;
        ?>
        </div>
        <i id="right" class="fa-solid fa-angle-right"></i>
    </div>


    
   
    <body>
    <div class="wrapper2">
    <h3>Ultimas publicaciones</h3>
    <i id="izq" class="fa-solid fa-angle-left"></i>
    <ul class="carousel2">
        <?php
        $contador = 0; // Initialize the counter

        foreach ($last as $home):
            if ($contador < 10): // Check if the counter is less than 10
        ?>
        <li class="card2">
            <?php if (!empty($home['ruta_archivo'][0])): ?>
            <div class="img">
                <a href="/publicaciones/<?= $home['id_formulario'] ?>">
                    <img src="/<?= $home['ruta_archivo'][0]; ?>" alt="Img" draggable="false">
                </a>
            </div>
            <?php else: ?>
                <p>No hay imágenes disponibles</p>
            <?php endif; ?>
            <span>$<?= $home['pago_mensual'] ?></span>
            <span><?php echo ucwords(str_replace('_', ' ', $home['tipo_inmueble'])); ?></span>
            <span><?= $home['sector'] ?></span>
            <!-- <span><?= $home['id_formulario'] ?></span> -->
        </li>
        <?php
                $contador++;
            endif;
        endforeach;
        ?>
    </ul>
    <i id="der" class="fa-solid fa-angle-right"></i>
</div>

   
<footer class="footer-distributed">

<div class="footer-left">
    <h3>Alquileres<span>Guaranda</span></h3>

 

    <p class="footer-company-name">Copyright © 2023 <strong>Juan Calvache </strong> All rights reserved</p>
</div>

<div class="footer-center">
    <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Juan </span>
            Calvache</p>
    </div>

    <div>
        <i class="fa fa-phone"></i>
        <p>+593 099387823</p>
    </div>
    <div>
        <i class="fa fa-envelope"></i>
        <p><a href="jucalvache@mailes.ueb.edu.ec">jucalvache@mailes.ueb.edu.ec</a></p>
    </div>
</div>
<div class="footer-right">
    <p class="footer-company-about">
        <span>Sobre el proyecto</span>
        <strong>Alquileres Guaranda</strong> es un proyecto con el fin de ayudar a la comunidad de la ciudad de Guaranda
        
    </p>
   
</div>
</footer>

</body>
</html>
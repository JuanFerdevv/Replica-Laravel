<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <link rel="stylesheet" href="/Assets/estilos/Estilo_ingresar.css">
    <title>Inicia Sesion</title>
</head>
<body>
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
    <div id="alert-container"></div>
            <?php if (isset($error)) : ?>
        <script>
            alert("<?php echo $error; ?>");
        </script>
        <?php endif; ?>

    <form action="/loginP" method="post">
        <a href="/">Volver</a><br>
        <h1>¡Bienvenido!</h1><br>
        <h2>Ingresa a tu cuenta y accede a tus anuncios</h2>
        <label>Ingresa tu e-mail</label><br>
        <input type="text" name="email" placeholder="correo electonico"><br>
        <label>Ingresa tu contraseña</label><br>
        <input type="password" name="contrasena" placeholder="contraseña" ><br>
        <a href="#">¿olvidaste tu contraseña?</a><br>
        
        <input class="button" type="submit" value="ingresar" name="login" >
        

        <h1>¿No tiener una cuenta?!</h1>

    <a  href="/registrate">!Registrate¡</a>


    </form>
</body>
</html>
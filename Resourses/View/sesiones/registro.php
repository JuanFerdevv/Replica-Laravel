<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Assets/estilos/header.css">
    <link rel="stylesheet" href="/Assets/estilos/estilo_registro.css">
    <link rel="stylesheet" href="/Assets/estilos/alerts.css">
    <title>Registrate</title>
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

<form action="/registrate" method="POST">
        <a href="/">Volver</a><br>
        <h1>Crea tu cuenta</h1>

        <label>Nombre:</label><br>
        <input type="text" name="nombre" required><br>

        <label>Apellido:</label><br>
        <input type="text" name="apellido" required><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br>

        <label>Cédula de Identidad:</label><br>
        <input type="text" name="cedula" required><br>

        <label>Celular:</label><br>
        <input type="text" name="celular" required><br>

        <label>Contraseña:</label><br>
        <input type="password" name="contrasena" required><br>
        
        <label>Confirmar Contraseña:</label><br>
        <input type="password" name="confirmar_contrasena" required><br>

        <input class="button" type="submit" value="registro" >   
    </form>

</body>
</html>
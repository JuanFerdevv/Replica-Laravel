<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>formulario para crear usuario</h1>
    <form action="/perfil" method="POST">
    
        <div>
            <label for="">nombres</label>
            <input type="text" name="nombre" id="name">
        </div>
        <div>
            <label for="">apellido</label>
            <input type="text" name="apellido" id="apellido">
        </div>
        <div>
            <label for="">email</label> 
            <input type="text" name="email" id="email">
        </div>
        <div>
            <label for="">cedula</label>
            <input type="text" name="cedula" id="cedula">
        </div>
        <div>
            <label for="">celular</label>
            <input type="text" name="celular" id="celular">
        </div>
        <div>
            <label for="">contraseña</label>
            <input type="text" name="contrasena" id="contrasena">
        </div>
        
        <button type="submit">Crear</button>

    </form>
</body>
</html>
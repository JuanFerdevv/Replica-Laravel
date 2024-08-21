<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Editar datos del usuario</h1>
    <form action="/perfil/<?= $perfil['id'] ?>/actualizar" method="POST">
    
        <div>
            <label for="">nombres</label>
            <input value="<?=$perfil['nombre']?>" type="text" name="nombre" id="name">
        </div>
        <div>
            <label for="">apellido</label>
            <input value="<?=$perfil['apellido'] ?>" type="text" name="apellido" id="apellido">
        </div>
        <div>
            <label for="">email</label> 
            <input value="<?=$perfil['email'] ?>" type="text" name="email" id="email">
        </div>
        <div>
            <label for="">cedula</label>
            <input value="<?=$perfil['cedula'] ?>" type="text" name="cedula" id="cedula">
        </div>
        <div>
            <label for="">celular</label>
            <input value="<?=$perfil['celular'] ?>" type="text" name="celular" id="celular">
        </div>
        <div>
            <label for="">contraseña</label>
            <input value="<?=$perfil['contrasena'] ?>" type="text" name="contrasena" id="contrasena">
        </div>
        
        <button type="submit">Crear</button>

    </form>
</body>
</html>
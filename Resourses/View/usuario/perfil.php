<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Todos los perfiles</h1>

    <form action="/perfilP" method="post" class="flex">
     
    <input name="search"
      class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-pink-500 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
      placeholder=" "
    />

    <button type="submit">Buscar</button>
</form>

    <a href="/perfil/nuevo_usuario">Crear usuario</a>
    <ul> 
        <?php foreach($perfil as $Usuarios): ?>
            <li>
                <a href="/perfil/<?=$Usuarios['usuario_id']?>">
                    <?=$Usuarios['nombre'] ?><br>
                    <?=$Usuarios['apellido'] ?><br>
                   <br><br>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>
</html>
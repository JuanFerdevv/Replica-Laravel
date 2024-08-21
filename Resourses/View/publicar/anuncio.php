<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Aqui se muestran todos los anuncios</h1>
    <h1>Lista de Anuncios</h1>
    <ul>
        <?php foreach ($ubicacion as $model): ?>
            <li>
                <p>Título: <?= $model['id'] ?></p>
                <p>Descripción: <?= $model['usuario_id'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>
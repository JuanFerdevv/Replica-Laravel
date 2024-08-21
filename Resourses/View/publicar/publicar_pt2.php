<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>formulario Pt2</h1>
    <h1>Comparte Fotos de tu Inmueble</h1>
    numero formulario: <?=$formulario['id_formulario']?><br>
    id usuario:<?=$formulario['usuario_id']?>
    <?=$formulario['sector']?>
    <p>Por favor, sube fotos en formato JPG, PNG o JPEG.</p>

    <form action="/perfil/<?=$formulario['id_formulario']?>/post2/<?=$formulario['usuario_id']?>" method="POST" enctype="multipart/form-data">
    <fieldset>
        <label for="file_data">Selecciona archivos:</label>
        <input type="file" name="file[]" multiple><br><br>
   
        <input type="hidden" value="<?=$formulario['id_formulario']?>" name="id_formulario">

        <input type="hidden" value="<?=$formulario['usuario_id']?>" name="usuario_id">
    
    <input type="submit" value="Subir Archivos">
    </fieldset>
</form>


</body>
</html>
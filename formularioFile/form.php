<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form enctype="multipart/form-data" action="./validacionfile.php" method="POST">
    <input type="hidden" name="MAX_FILE_SIZE" name="file" value="30000"/>
    <input name="fichero_usuario" type="file" />
    <input type="submit" value="Enviar fichero" />
</form>
</body>
</html>
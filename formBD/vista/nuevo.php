<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

include '../modelo/bd.php';

?>
<form enctype="multipart/form-data" action="nuevo.php" method="POST">
 
<label for="name">Nombre:</label>
<input type="text" name="nombre" id="nombre"/><br/>

<input type="hidden" name="MAX_FILE_SIZE" value="90000" />
  Enviar este fichero <input name="img" type="file" /><br/>

<input type="submit" value="Enviar datos" />
</form>
<?php
if(isset($_POST['nombre']) && isset($_FILES['img'])){
$nombre = $_POST['nombre'];
$imagen = base64_encode(file_get_contents($_FILES['img']['tmp_name']));

$datos['nombre']= $nombre;
$datos['img'] = $imagen;
}


var_dump($datos);

newAlum($datos);
header('Location: listado.php');
?>

</body>
</html>
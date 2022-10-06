<?php
require 'validar.php';
?>
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
$nombre = $_POST['nombre'];
$nombre = $_POST['edad'];
$errores = [];
if (validacion($nombre)){
     $errores['nombre'] = "nombre vacio";
}
if (validacion($edad)){
     $errores['edad'] = "campo edad vacio";
}



?>
<form name="input" method="post">
    <input type="text" name="nombre>" />
          <?php
               if (isset($_POST['nombre']) && empty($_POST['nombre']))
              
          ?><br />
    <input type="text" name="color"/>
          <?php
               if (isset($_POST['color']) && empty($_POST['color']))
                    echo "<span style='color:red'> Debe introducir un color!!</span>"
          ?><br />
    <input type="submit" value="Enviar" name="enviar"/>



     </form>
</body>
</html>
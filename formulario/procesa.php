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
$modulos = $_POST['modulos'];
print "Nombre: ".$nombre."<br/>";
foreach($modulos as $modulo)
{
    print "modulo ".$modulo."<br/>";
}
?>

    
</body>
</html>
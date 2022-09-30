<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leer ficheros</title>
</head>
<body>
<?php
$fichero="datos.txt";
$nombre = $_GET['n'];
$ape1 = $_GET['a1'];
$ape2= $_GET['a2'];
$s = file_get_contents($fichero);

$s .= "\n$nombre; $ape1; $ape2";
file_put_contents($fichero,$s);

print "El fichero contiene<br/>" .$s. "<br/>";
$array = explode("\n",$s);

var_dump($array);
foreach($array as $arr){
   // $aux = explode(";",$arr);
//var_dump($aux);

    $asoc[explode(";",$arr)[0]] = explode(";",$arr)[1];
    $asoc[explode(";",$arr)[0]] .= explode(";",$arr)[2];
}
echo "<br/>";
var_dump($asoc);
?>
</body>
</html>

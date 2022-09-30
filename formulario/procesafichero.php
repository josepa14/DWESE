<?php
$id = $_GET['id'];
$nombre= $_GET['nombre'];
$fichero = 'fichero.php';
// Abre el fichero para obtener el contenido existente
$actual = file_get_contents($fichero);
// Añade una nueva persona al fichero
$actual .= "\n$id;$nombre";
var_dump($actual);
// Escribe el contenido al fichero
file_put_contents($fichero, $actual);
$arr=explode("\n",$actual);
foreach($arr as $v)
{
    $asoc[explode(";",$v)[0]] = explode (";",$v)[1];
}
var_dump($asoc);
?>
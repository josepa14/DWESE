<?php

if(isset  ( $_POST["nombre"])){
    $nombre=$_POST["nombre"];
}
if(isset($_FILES["fichero"])){
    $fichero = $_FILES["fichero"]["name"];
}

$respuesta = new stdClass();
$respuesta->nombre=$nombre;
$respuesta->fichero=$fichero;

echo json_encode($respuesta);



?>
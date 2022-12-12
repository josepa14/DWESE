<?php
include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
header('Content-Type: application/json');

   $respuesta = ControllerUsuario::obtenerUno($_GET['idParticipante']);
$lista=[];

    $id=$respuesta->getId();
    $name=$respuesta->getName();
    $login=$respuesta->getLogin();
    $pass=$respuesta->getPass();
    $correo=$respuesta->getCorreo();
    $localizacion=$respuesta->getLocalizacion();
    $imagen=$respuesta->getImagen();
    $rol=$respuesta->getRol();
    $lista = array('id'=> "$id",
    'name'=>"$name",
    'login'=>"$login",
    'pass'=>"$pass",
    'correo'=>"$correo",
    'localizacion'=>"$localizacion",
    'imagen'=>"$imagen",
    'rol'=>"$rol");
    echo json_encode($lista);
?>

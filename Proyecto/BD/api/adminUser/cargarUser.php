<?php
include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
header('Content-Type: application/json');

    $respuesta = ControllerUsuario::leerTodos();



$list[] ='';

for ($i = 0; $i < count($respuesta); $i++) {
    $id=$respuesta[$i]->getId();
    $name=$respuesta[$i]->getName();
    $login=$respuesta[$i]->getLogin();
    $pass=$respuesta[$i]->getPass();
    $correo=$respuesta[$i]->getCorreo();
    $localizacion=$respuesta[$i]->getLocalizacion();
    $imagen=$respuesta[$i]->getImagen();
    $rol=$respuesta[$i]->getRol();

    $list[$i] = array('id'=> "$id",
    'name'=>"$name",
    'login'=>"$login",
    'pass'=>"$pass",
    'correo'=>"$correo",
    'localizacion'=>"$localizacion",
    'imagen'=>"$imagen",
    'rol'=>"$rol");
}

echo json_encode($list);
?>
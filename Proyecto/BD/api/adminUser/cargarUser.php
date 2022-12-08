<?php
include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
header('Content-Type: application/json');

    $respuesta = ControllerUsuario::leerTodos();



$list[] ='';

for ($i = 0; $i < count($respuesta); $i++) {
    $list[$i] = ['id'=> $respuesta[$i]->getId(),
    'name'=>$respuesta[$i]->getName(),
    'login'=> $respuesta[$i]->getLogin(),
    'pass'=>$respuesta[$i]->getPass(),
    'correo'=>$respuesta[$i]->getCorreo(),
    'localizacion'=> $respuesta[$i]->getLocalizacion(),
    'imagen'=> $respuesta[$i]->getImagen(),
    'rol'=>$respuesta[$i]->getRol()];
}
$datos= json_encode($list);

echo $datos;
?>
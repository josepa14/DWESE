<?php
include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
$datos = json_decode(file_get_contents("php://input"));
if (!$datos) {
    http_response_code(500);
    exit;
}

$usuario = new Usuario($datos->nombre,$datos->login,$datos->password,$datos->correo,$datos->localizacion,$datos->imagen,$datos->rol);

$usuario->setName($datos->nombre);
$usuario->setLogin($datos->login);
$usuario->setPass($datos->password);
$usuario->setCorreo($datos->correo);
$usuario->setLocalizacion($datos->localizacion);
$usuario->setImagen($datos->imagen);
$usuario->setRol($datos->rol);
$respuesta = ControllerUsuario::registrar($usuario);

echo json_encode($respuesta);

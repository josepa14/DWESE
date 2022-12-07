<?php
$datos = json_decode(file_get_contents("php://input"));
if (!$datos) {
    http_response_code(500);
    exit;
}

$usuario = new Usuario($datos->nombre,$datos->login,$datos->password,$datos->correo,$datos->setLocalizacion,$datos->imagen,$datos->rol);

$usuario->setName($datos->nombre);
$usuario->setLogin($datos->login);
$usuario->setPass($datos->password);
$usuario->setCorreo($datos->correo);
$usuario->setLocalizacion($datos->setLocalizacion);
$usuario->setImagen($datos->imagen);
$usuario->setRol($datos->rol);
    $respuesta = ControllerUsuario::registrar($usuario);

echo json_encode($respuesta);

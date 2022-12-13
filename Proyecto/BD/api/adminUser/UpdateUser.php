<?php
include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';

    $id=$_POST["idE"];
    $name=$_POST["nombreE"];
    $login=$_POST["loginE"];
    $pass=$_POST["passE"];
    $correo=$_POST["correoE"];
    $localizacion=$_POST["localizacionE"];
    $imagen=$_POST["imagenE"];
    $rol=$_POST["rolE"];
    
    $usuario = new Usuario($id,$name,$login,$pass,$correo,$localizacion,$imagen,$rol);

    $respuesta = ControllerUsuario::actualizar($id,$usuario);

?>

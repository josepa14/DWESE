<?php
if(!Login::UsuarioEstaLogueado() || Sesion::leer("user")->getRol() == "user"){
    header("location:?menu=incio");
}
echo "<h1>Manejo de usuarios</h1>";

$usuarios = new RepoUsuario();
echo "<pre>";
var_dump($usuarios->getAll());
echo "</pre>";

echo "<h1>Manejo de concursos</h1>";

?>


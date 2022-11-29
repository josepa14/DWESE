<?php
if(!Login::UsuarioEstaLogueado() || Sesion::leer("user")->getRol() == "user"){
    header("location:?menu=incio");
}
echo "<h1>Manejo de usuarios</h1>";

echo "<h1>Manejo de concursos</h1>";

?>


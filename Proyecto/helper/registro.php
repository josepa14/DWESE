<?php
class Registro{

    public static function registrar(Usuario $usuario){
        $ru = new RepoUsuario;
        $ru->insertUser($usuario);
    }
}
?>
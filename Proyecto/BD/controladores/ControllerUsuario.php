<?php

class ControllerUsuario{
 
    public static function registrar(Usuario $usuario){
        $ru = new RepoUsuario;
        if ($ru->insertUser($usuario))
            return true;
        return false;
    }
    public static function borrar($id){
        $ru = new RepoUsuario;
        $ru->borrarUser($id);
    }
    public static function leerTodos()
    {
        $usuarios = new RepoUsuario();
        $cantidad = $usuarios->getAll();
        return $cantidad;
    }
}   

?>
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
    public static function leerTodos(){
        $usuarios = new RepoUsuario();
        $cantidad = $usuarios->getAll();
        return $cantidad;
    }
   public static function obtenerUno($id){
        $ru = new RepoUsuario;
        $usuario = $ru->getById($id);
        return $usuario;
   }
   public static function actualizar($id,Usuario $usuario){
        $ru = new RepoUsuario;
        $usuario = $ru->updateUser($id,$usuario);
        return $usuario;
   }
}

?>
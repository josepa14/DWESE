<?php
class Login
{
    public static function Identifica(string $usuario,string $contrasena,bool $recuerdame)
    {
        //existe el usuario? damelo, pero esta logeado? vale, continua con la sesion activa pues
       $user = Self::ExisteUsuario($usuario,$contrasena);
       if($user != null){
        Sesion::escribir('user', $user);  //valor todo el objeto y la clave es el nombre del usuario
       }

    
    }

    private static function ExisteUsuario(string $usuario,string $contrasena=null)
    {
       // ControllerUsuario::obtenerUno($usuario,$contrasena)
        $ru = new RepoUsuario();
        $user = $ru->getUser($usuario,$contrasena);
       if($user->getLogin() == $usuario){
        return $user;
       }
       else
       return null;          
    }

    public static function UsuarioEstaLogueado()
    {
       return Sesion::leer('user');
    }
}
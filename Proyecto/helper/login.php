<?php
class Login
{
    public static function Identifica(string $usuario,string $contrasena,bool $recuerdame)
    {
        //existe el usuario? damelo, pero esta logeado? vale, continua con la sesion activa pues
       $user = Self::ExisteUsuario($usuario,$contrasena);
       if($user != null){
        Sesion::escribirSesion($user->getlogin(), $user);  //valor todo el objeto y la clave es el nombre del usuario
        setcookie('user',$user->getLogin());
       }

    
    }

    private static function ExisteUsuario(string $usuario,string $contrasena=null)
    {
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
        //voy a mirar la sesion a ver si esta logeado, si no? creo la sesion
        //Sesion::existeSesion();
    }
}
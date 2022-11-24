<?php
class Login
{
    public static function Identifica(string $usuario,string $contrasena,bool $recuerdame)
    {
        //existe el usuario? damelo, pero esta logeado? vale, continua con la sesion activa pues
        ExisteUsuario($usuario,$contrasena);

        $ru = new RepoUsuario();
        $usuario = $ru->getUser($usuario,$contrasena);
        Sesion::iniciar();
        return $usuario;
    }

    private static function ExisteUsuario(string $usuario,string $contrasena=null)
    {
        $ru = new RepoUsuario();
        $user = $ru->getUser($usuario,$contrasena);
       if($user->getLogin() == $usuario){
        return true;
       }
       else
       return false;          
    }

    public static function UsuarioEstaLogueado()
    {
        //voy a mirar la sesion a ver si esta logeado, si no? creo la sesion
        //Sesion::existeSesion();
    }
}
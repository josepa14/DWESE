<?php
class Sesion
{
    public static function iniciar()
    {
        session_start();
    }

    public static function leer(string $clave)
    {
        if  (Self::existe($clave)){
            return $_SESSION[$clave];
        }
    }

    public static function existe(string $clave)
    {
        if (isset($_SESSION["$clave"])){
            return true;
         }
         return false;
    }

    public static function escribir($clave,$valor)
    {
        $_SESSION["$clave"]=$valor;
    }

    public static function eliminar($clave)
    {
        
        session_destroy();
    }
}
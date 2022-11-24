<?php
class Sesion
{
    public static function iniciar()
    {
        session_start();
    }

    public static function leer(string $clave)
    {
    //voy a mirar a ver si esta la sesion activa
    }

    public static function existe(string $clave)
    {
    //voy a kirar si la sesion existe y no esta vacia
    }

    public static function escribir($clave,$valor)
    {
      //  $_SESSION['$login'] igual valor
    }

    public static function eliminar($clave)
    {
        //voy a destruir la sesion X
        session_destroy($clave);
    }
}
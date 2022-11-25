<?php
class Sesion{
    public static function iniciarSesion(){
        session_start();
    }

    public static function leerSesion(string $clave){
        if  (Self::existeSesion($clave)){
            return $_SESSION[$clave];
        }

        
    }
    public static function existeSesion(string $clave){
         if (isset($_SESSION[$clave])){
            return true;
         }
         return false;
    }
    public static function escribirSesion($clave,$valor){
        
        $_SESSION["$clave"]=$valor;
    }
    public static function eliminarSesion($clave){
        unset($_SESSION["$clave"]);
    }
}
?>
<?php
class Sesion{
    public static function iniciarSesion(){
        session_start();
    }

    public static function leerSesion(string $clave){
        
    }
    public static function existeSesion(string $clave){
          //isset de la sesion return true o false
    }
    public static function escribirSesion($clave,$valor){
      //para guardar el nombre de la session del usuario
    }
    public static function eliminarSesion($clave){
        //hacer unset "$sesion unset"
    }
}
?>
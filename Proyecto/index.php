<?php

class Principal
{
    public static function main()
    {
        require_once './cargadores/cargador.php';
        require_once './helper/sesion.php';
        Sesion::iniciar();
        require_once './Vistas/Principal/layout.php';
      
    }
}
Principal::main();
?>

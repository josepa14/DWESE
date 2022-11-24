<?php
class Principal
{
    public static function main()
    {
        include './cargadores/cargador.php';
        require_once './helper/sesion.php';
        require_once './Vistas/Principal/layout.php';
    }
}
Principal::main();
?>

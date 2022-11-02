<?php

spl_autoload_register('micargador');

function micargador($clase){
    if (file_exists($_SERVER['DOCUMENT_ROOT'].'/training/10.Cargadores/Clases/'.$clase.'.php')){
    include $_SERVER['DOCUMENT_ROOT'].'/training/10.Cargadores/Clases/'.$clase.'.php';
    }
    else{

        echo '<h1>No se encuentra la clase</h1>';
    }
}

?>
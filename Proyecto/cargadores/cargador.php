<?php

spl_autoload_register('micargador');

function micargador($clase)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/helper/' . $clase . '.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/helper/' . $clase . '.php';
    }
}

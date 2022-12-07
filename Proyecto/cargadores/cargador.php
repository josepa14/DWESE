<?php

spl_autoload_register('micargador');

function micargador($clase)
{
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/BD/' . $clase . '.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/BD/' . $clase . '.php';
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/helper/' . $clase . '.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/helper/' . $clase . '.php';
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/BD/repositorios/' . $clase . '.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/BD/repositorios/' . $clase . '.php';
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/modelos/' . $clase . '.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/modelos/' . $clase . '.php';
    }
    if (file_exists($_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/BD/controladores/' . $clase . '.php')) {
        include $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/BD/controladores/' . $clase . '.php';
    }
}

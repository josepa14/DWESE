<?php
if (isset($_GET['menu'])) {
    if ($_GET['menu'] == "inicio") {
        require_once 'index.php';
    }
    if ($_GET['menu'] == "login") {
        require_once './Vistas/Login/autentifica.php';
    }
    if ($_GET['menu'] == "cerrarsesion") {
        require_once './Vistas/Login/cerrarsesion.php';
     
    }
    if ($_GET['menu'] == "concursos") {
        require_once './Vistas/concursos/listadoConcursos.php';
     
    }
    if ($_GET['menu'] == "listadoanimales") {
        require_once './Vistas/Mantenimiento/listadoanimales.php';
     
    }
    if ($_GET['menu'] == "listadovacunas") {
        require_once './Vistas/Mantenimiento/listadovacunas.php';
    
    }
    if ($_GET['menu'] == "administracion") {
        require_once './Vistas/Administracion/administracion.php';
    
    }
    if ($_GET['menu'] == "registro") {
        require_once './Vistas/Registro/registra.php';
    
    }

    

    
}

    
    //Añadir otras rutas

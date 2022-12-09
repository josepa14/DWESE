<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
Sesion::iniciar();
if (!Login::UsuarioEstaLogueado() || Sesion::leer("user")->getRol() != "admin") {
    header("location: #");
} else {
    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        http_response_code(201);
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            ControllerUsuario::borrar($id);
        }
    }
    
}

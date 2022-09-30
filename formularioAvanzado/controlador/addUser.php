<?php
include '../helpers/datos.php';

$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
$admin= $_POST['admin'];
if ($admin !== "true"){
    $admin = "false";
}

agregarUsuario($nombre,$pass,$admin);
//header('Location: http://localhost/training/formularioAvanzado/vista/formAdmin.php');


?>
<?php
include '../helpers/datos.php';




$nombre = $_POST['nombre'];
$pass = $_POST['pass'];
$esAdmin=autenticarUser($nombre,$pass);

print($esAdmin);
        if($esAdmin === "true"){
            header('Location: http://localhost/training/formularioAvanzado/vista/formAdmin.php');
        }
        elseif($esAdmin==="false"){
            header('Location: http://localhost/training/formularioAvanzado/vista/vistaUser.html');  
        }
echo "<h3>user o email incorrecto</h3>";
?>
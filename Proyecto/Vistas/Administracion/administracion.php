<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
if (!Login::UsuarioEstaLogueado() || Sesion::leer("user")->getRol() != "admin") {
    header("location:?menu=incio");
}
echo '<script src="javascript/mantenimiento.js"></script>';
echo '  <div class="c-admin">
<a href="#" id="c-btn-toggle" class="c-btn-toggle">Administrar usuarios</a>   
<section class="c-seccionToggle">
    <table class="c-tabla">
        <tr id="insertar" class="insertar">
    
            <td><input type="text" id="nombre" name="nombre" placeholder="nombre"/></td>
            <td><input type="text" id="login" name="login" placeholder="usuario"/></td>
            <td><input type="text" id="password" name="password" placeholder="password"/></td>
            <td><input type="text" id="correo" placeholder="email"/></td>
            <td><input type="text" id="localizacion"/></td>
            <td><input type="text" id="imagen"/></td>
            <td>   
                <select name="rol" id="rol">
                <option value="admin">Admin</option>
                <option value="user" selected="selected">Usuario</option> 
                </select>
            </td>
            <td><input type="button" id="guardar" value="Guardar Nuevo"/></td>
        </tr>
    </table>
<div id="editable2"></table></section>

        <a href="#" id="c-btn-toggle2" class="c-btn-toggle">Administrar Concursos</a>  
            <section class="c-seccionToggle">';

        require "vistas/administracion/tablaConcursos.php";
echo ' </section></div>';
//fin tabla primera y ahora empiezo ejemplo tabla segunda

//https://www.youtube.com/watch?v=41HExhmyRaM&list=PLoRfWwOOv4jyR6jOLZY5biv5H0Qguq8Ea&index=4&ab_channel=FacultadAutodidacta


?>
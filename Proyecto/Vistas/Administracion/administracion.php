<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
if(!Login::UsuarioEstaLogueado() || Sesion::leer("user")->getRol() != "admin"){
    header("location:?menu=incio");
}
echo "<h1>Manejo de usuarios</h1>";


echo '<script src="javascript/mantenimiento.js"></script>';
echo '
        <a href="#" id="btn-toggle" class="btn-toggle">Administrar usuarios</a>   
        <section class="seccionToggle">
            <table>
                <tr id="insertar">
                    <td><input type="text" id="id" name="id" disabled/></td>
                    <td><input type="text" id="nombre" name="nombre"/></td>
                    <td><input type="text" id="login" name="login"/></td>
                    <td><input type="text" id="password" name="password"/></td>
                    <td><input type="text" id="correo"/></td>
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
        <div id="editable2"></table></section>';
//fin tabla primera y ahora empiezo ejemplo tabla segunda

//https://www.youtube.com/watch?v=41HExhmyRaM&list=PLoRfWwOOv4jyR6jOLZY5biv5H0Qguq8Ea&index=4&ab_channel=FacultadAutodidacta





echo "<h1>Manejo de concursos</h1>";

?>


<script src="javascript/mantenimiento2.js"></script>
<table id="editable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Login</th>
            <th>Password</th>
            <th>Correo</th>
            <th>Localizacion</th>
            <th>Imagen</th>
            <th>Rol</th>
            <th id="ediccion">Accion</th>
        </tr>
    </thead>
    <tbody id="cuerpo">
        <?php
         include_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
    $cantidad = ControllerUsuario::leerTodos();
        foreach($cantidad as $fila) {

            echo 
            "<tr id='fila".$fila->getId()."'><td> ".$fila->getId().
            "</td><td> ".$fila->getName().
            "</td><td> ".$fila->getLogin().
            "</td><td> ".$fila->getPass().
            "</td><td> ".$fila->getCorreo().
            "</td><td> ".$fila->getLocalizacion().
            "</td><td> ".$fila->getImagen().
            "</td><td> ".$fila->getRol().
            "</td><td><button class='editUser' value=".$fila->getId()." >Editar</button><button class='borrarUser' value=".$fila->getId()." >Borrar</button></td></tr>";
        
        }

?>
    </tbody>

    </table>
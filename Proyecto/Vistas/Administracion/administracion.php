<?php
if(!Login::UsuarioEstaLogueado() || Sesion::leer("user")->getRol() == "user"){
    header("location:?menu=incio");
}
echo "<h1>Manejo de usuarios</h1>";

$usuarios = new RepoUsuario();
$cantidad = $usuarios->getAll();

echo ' <script src="javascript/mantenimiento2.js"></script>
        <table id="editable">
        <thead>
            <tr>
            <th>
                ID                
            </th>
                <th>Nombre
                    <span id="ordenNombreCreciente">^</span>
                    <span id="ordenNombreDeCreciente">v</span>
                
                </th>
                <th >Login
                    <span id="ordenApeCreciente">^</span>
                    <span id="ordenApeDeCreciente">v</span>
                </th>
                <th id="ordApe2">Password
                    <span id="ordenApe2Creciente">^</span>
                    <span id="ordenApe2DeCreciente">v</span>

                </th>
                <th>
                    Correo
                </th>
                <th>
                    Localizacion   
                </th>
                <th>
                    Imagen   
                </th>
                <th>
                    Rol   
                </th>
                <th id="ediccion">
                    Accion   
                </th>
                 
            </tr>
        </thead>
        <tbody id="cuerpo">';
        foreach($cantidad as $fila) {

            echo 
            "<tr><td> ".$fila->getId().
            "</td><td> ".$fila->getName().
            "</td><td> ".$fila->getLogin().
            "</td><td> ".$fila->getPass().
            "</td><td> ".$fila->getCorreo().
            "</td><td> ".$fila->getLocalizacion().
            "</td><td> ".$fila->getImagen().
            "</td><td> ".$fila->getRol().
            "</td></tr>";
        
        }

        echo '</tbody>
        <tfoot>
            <tr id="insertar">
            <td><input type="text" id="id" name="id" disabled/></td>
                <td><input type="text" id="nombre" name="nombre"/></td>
                <td><input type="text" id="login" name="login"/></td>
                <td><input type="text" id="password" name="password"/></td>
                <td><input type="text" id="correo"/></td>
                <td><input type="text" id="localizacion"/></td>
                <td><input type="text" id="Imagen"/></td>
                <td><input type="text" id="Rol"/></td>
            </tr>
            <tr id="editar" style="display:none">
                <td><input  type="text" name="nombre" id="eDnombre"/></td>
                <td><input  type="text" name="apellido1" id="eDapellido1"/></td>
                <td><input  type="text" name="apellido2" id="eDapellido2"/></td>
                <td><input  type="button" name="Editar" value="Editar" id="eDGuardar"/></td>
            </tr>
        </tfoot>
        
        
        
        
        
        
        </table>';
        //fin tabla tabla








echo "<h1>Manejo de concursos</h1>";

?>


<?php

    $valida=new Validacion();
    if(isset($_POST['submit']))
    {
        $valida->Requerido('usuario');
        $valida->Requerido('contrasena');
        //Comprobamos validacion
        if($valida->ValidacionPasada())
        {
            header("location:?menu=inicio");
            //este if no me funciona y no se porque
            if(Login::Identifica($_POST['usuario'],$_POST['contrasena'],
            isset($_POST['recuerdame']) || $_POST['recuerdame'] = false))
            {
                $url=$_GET[''];
                header("location:?menu=inicio");
            }
        }
    }
?>
<div class='g--global'>
    <div class='c-form login-form'>
        <form action='' method='post' novalidate>
            <h2 class='c-form__h1'>Identificate</h2>
            <div class='form-group'>
            <label for="usuario">usuario</label>
                <input type='text' class='form-control' name='usuario' placeholder='Usuario' required='required'>
                <?php  echo '<br>'.$valida->ImprimirError('usuario'); ?>
            </div>
            <div class='form-group'>
            <label for="contrasena">usuario</label>
                <input type='password' class='form-control' name='contrasena' placeholder='Contraseña'
                    required='required'>
                <?php  echo '<br>'.$valida->ImprimirError('contrasena'); ?>
            </div>
            <div class='form-group'>
                <button type='submit' name='submit' class='enviar g--largo'>Logueate</button>
            </div>
            <div class='clearfix'>
                <label class=''>

            </div>
        </form>
        <p class='text-center'>¿Aun no estas registrado? <a href='?menu=registro'><strong>Create una Cuenta</strong></a></p>
    </div>
</div>
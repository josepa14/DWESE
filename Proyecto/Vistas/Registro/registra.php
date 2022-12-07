<?php

    $valida=new Validacion();
    if(isset($_POST['submit']))
    {
        $valida->Requerido('login');
        $valida->Requerido('nombre');
        $valida->Requerido('email');
        $valida->Requerido('pass');
        $usuario = new Usuario('',$_POST['nombre'],$_POST['login'],$_POST['pass'],$_POST['email']);
        //Comprobamos validacion
        var_dump($usuario);
        if($valida->ValidacionPasada())
        {
          ControllerUsuario::registrar($usuario);
            header("location:?menu=inicio");
            //este if no me funciona y no se porque
           
        }else
        print_r("no ha pasado validacion");
    }
?>


<div class="c-form g--margin-left-15">
  <div class="c-form__campos">
    <h1 class="c-form__h1">Registro en el sitio</h1>


    <form action='' method='post' novalidate>

      <p>
        <label for="login">usuario
          <span class="g--obligatorio">*</span>
        </label>
        <input type="text" name="login" id="login" required="obligatorio" placeholder="Escriba un usuario">
      </p>

      <p>
        <label for="nombre">Tu nombre
          <span class="g--obligatorio">*</span>
        </label>
        <input type="text" name="nombre" id="nombre" required="obligatorio" placeholder="Escribe tu nombre">
      </p>

      <p>
        <label for="email">Email
          <span class="g--obligatorio">*</span>
        </label>
        <input type="email" name="email" id="email" required="obligatorio" placeholder="Escribe tu Email">
      </p>
      <p class="campo">
        <label for="pass">Contraseña
          <span class="g--obligatorio">*</span>
        </label>
        <input type="password" name="pass" id="pass" required="obligatorio" placeholder="Escribe tu contraseña">
        <span id="span">Mostrar</span>
      </p>
      <?php
      echo '<script type="text/javascript">
      document.getElementById("span").addEventListener("click", e => {
          const passwordInput = document.getElementById("pass");
          if (e.target.classList.contains("show")) {
            e.target.classList.remove("show");
            e.target.textContent = "Ocultar";
            passwordInput.type = "text";
          } else {
            e.target.classList.add("show");
            e.target.textContent = "Mostrar";
            passwordInput.type = "password";
          }
        });
      </script>';

?>
      <button type="submit" name='submit' id="enviar">
        <p>Enviar</p>
      </button>

      <p class="c-padre__aviso">
        <span class="g--obligatorio"> * </span>los campos son obligatorios.
      </p>

    </form>
  </div>
</div>
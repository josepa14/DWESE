<header>
    <div class="c-menu">
        <nav class="c-menu__izquierda">
            
            <ul class="c-menu__opciones">
             <li><a href="#"><img src="imagenes/logo.png"/></a><li>
                <li class=""><a class="" href="?menu=concursos">Concursos</a></li>
                <?php
               
                if (Sesion::existe("user") && Sesion::leer("user")->getRol() == "admin") {
                    echo '<li>
                        <a href="?menu=administracion">Administracion</a>
                    </li>';
                }

                ?>
                <!-- <li class=""><a class="" href="#" id="">LISTADOS</a>
                    <div class="">
                        <a class="" href="?menu=listadoanimales">ANIMALES</a>
                        <a class="" href="?menu=listadovacunas">VACUNACIONES</a>
                    </div>
                </li> -->
            </ul>
            </nav>
        <div class="c-menu__derecha">
            <?php
            echo '<p>';
            $respuesta =  Sesion::existe("user") ? "Hola bienvenido  <strong><u>" . Sesion::leer('user')->getLogin()
                . "</u></strong> <a href='?menu=cerrarsesion'>Cerrar sesión</a>" : "";
            echo $respuesta;

            ?>

        
                <?php
                $respuesta2 = Sesion::existe('user') ? "" : "<a class='c-menu--resaltado' href='?menu=login'>LOGIN</a>
                <a class='c-menu--resaltado' href='?menu=registro'> REGISTRO</a></p>";
                echo $respuesta2;
                ?>
            

        </div>
</header>
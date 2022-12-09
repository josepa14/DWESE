<header>
    <div class="c-menu">
        <div class="c-menu__izquierda">
            <a href="#">RADIOJAIMITO</a>
            <ul class="">

                <li class=""><a class="" href="?menu=concursos">Concursos <span class="sr-only">(current)</span></a></li>
                <?php
               
                if (Sesion::existe("user") && Sesion::leer("user")->getRol() == "admin") {
                    echo '<li class="">
                        <a class="" href="?menu=administracion">Administracion</a>
                    </li>';
                }

                ?>
                <li class=""><a class="" href="#" id="">LISTADOS</a>
                    <div class="">
                        <a class="" href="?menu=listadoanimales">ANIMALES</a>
                        <a class="" href="?menu=listadovacunas">VACUNACIONES</a>
                    </div>
                </li>
            </ul>
        </div>
        <div class="c-menu__derecha">
            <?php
            $respuesta =  Sesion::existe("user") ? "Hola bienvenido  " . Sesion::leer('user')->getLogin()
                . " <a href='?menu=cerrarsesion'>Cerrar sesión</a>" : "";
            echo $respuesta;
            ?>

            <form>
                <?php
                $respuesta2 = Sesion::existe('user') ? "" : "<a class='' href='?menu=login'>Login </span></a>
                <a class='' href='?menu=registro'> Registro</span></a>";
                echo $respuesta2;
                ?>
                <!--<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>-->
            </form>

        </div>
</header>
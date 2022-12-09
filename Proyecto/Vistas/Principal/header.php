<header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">SANIMAL</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="?menu=concursos">Concursos <span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                    if(Sesion::existe("user")&& Sesion::leer("user")->getRol() == "admin"){
                     echo '<li class="nav-item active">
                        <a class="nav-link" href="?menu=administracion">Administracion <span class="sr-only">(current)</span></a>
                    </li>'; 
                    }
                    
                    ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            LISTADOS
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="?menu=listadoanimales">ANIMALES</a>
                            <a class="dropdown-item" href="?menu=listadovacunas">VACUNACIONES</a>
                        </div>
                    </li>
                </ul>
                <?php
                $respuesta =  Sesion::existe("user")?"Hola bienvenido  ".Sesion::leer('user')->getLogin()
                . " <a href='?menu=cerrarsesion'>Cerrar sesión</a>":"";
                echo $respuesta;
                ?>

                <form class="form-inline my-2 my-lg-0">
                <?php
                $respuesta2 = Sesion::existe('user')?"":"<a class='nav-link' href='?menu=login'>Login <span class='sr-only'>(current)</span></a>
                <a class='nav-link' href='?menu=registro'>Registro <span class='sr-only'>(current)</span></a>"; 
                echo $respuesta2;
                ?>
                    <!--<input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>-->
                </form>
            </div>
        </nav>
    </header>
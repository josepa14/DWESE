
<h1 style="font-size:45px; margin:20px; text-align:center;">Listado concursos</h1>
<?php

$concurso = new RepoConcurso();


#Paginacion
$concursosPorPagina = 1;
$pagina = 1;
if (isset($_GET["pagina"])) {
    $pagina = $_GET["pagina"];
}
$limit = $concursosPorPagina;

$offset = ($pagina - 1) * $concursosPorPagina;
$numerodePaginas = $concurso->contarPaginas();
$paginas = ceil($numerodePaginas / $concursosPorPagina);
$cantidad = $concurso->getAll($limit,$offset);

foreach ($cantidad as $fila) {



    echo '<div class="tarjeta">
        <div class="titulo">' . $fila->getIdConcurso() . ' ' . $fila->getName() . '</div>
            <div class="cuerpo">
                <img src="img/concurso.jpg" alt="muestra">
                    <p><strong>Fecha inicio Inscripcion:</strong> ' . $fila->getFecha_ini_inscrip() . ' </p>
                    <p><strong>Fecha fin Inscripcion: </strong>' . $fila->getFecha_fin_inscrip() . ' </p>
            </div>
        <div class="pie">
        <a href="?menu=concurso&id=' . $fila->getIdConcurso() . '">Ver concurso</a>
        </div>
    </div>';
}
    ?>
    <nav>
    <div class="c-paginacion">
        <div class="">

            <p>Mostrando <?php echo $concursosPorPagina ?> de <?php echo $numerodePaginas ?> concursos disponibles</p>
        </div>
        <div class="">
            <p>Página <?php echo $pagina ?> de <?php echo $paginas ?> </p>
        </div>
    </div>
    <div class="c-paginacion">
    <ul>
        <!-- Si la página actual es mayor a uno, mostramos el botón para ir una página atrás -->
        <?php if ($pagina > 1) { ?>
            <li>
                <a href="?menu=concursos&pagina=<?php echo $pagina - 1 ?>">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php } ?>

        <!-- Mostramos enlaces para ir a todas las páginas. Es un simple ciclo for-->
        <?php for ($x = 1; $x <= $paginas; $x++) { ?>
            <li class="<?php if ($x == $pagina) echo "active" ?>">
                <a href="?menu=concursos&pagina=<?php echo $x ?>">
                    <?php echo $x ?></a>
            </li>
        <?php } ?>
        <!-- Si la página actual es menor al total de páginas, mostramos un botón para ir una página adelante -->
        <?php if ($pagina < $paginas) { ?>
            <li>
                <a href="?menu=concursos&pagina=<?php echo $pagina + 1 ?>">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php } ?>
    </ul>
    </div>
</nav>
        





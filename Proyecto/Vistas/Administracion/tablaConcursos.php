<table id="editable" class="c-tabla">
    <thead class="c-tabla__head">
        <tr>
        <th>ID</th>
            <th>Nombre Concurso</th>
            <th>Descripcion</th>
            <th>Fecha inicial inscripcion</th>
            <th>Fecha final inscripcion</th>
            <th>Fecha inicio concurso</th>
            <th>Fecha Final de concurso</th>
            <th id="ediccion">Accion</th>
        </tr>
    </thead>
    <tbody id="cuerpo"  class="c-tabla__body">
        <?php
         include_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
        $rp = new RepoConcurso();
        $concursos = $rp->getAll();

        foreach ($concursos as $fila) {

            echo
                "<tr id='fila" . $fila->getIdConcurso() . "'><td> " . $fila->getIdConcurso() .
                "</td><td> " . $fila->getName() .
                "</td><td> " . $fila->getDescripcion() .
                "</td><td> " . $fila->getFecha_ini_inscrip().
                "</td><td> " . $fila->getFecha_fin_inscrip() .
                "</td><td> " . $fila->getFecha_ini_con() .
                "</td><td> " . $fila->getFecha_fin_con() .
                "</td><td><button class='editConcurso editar' value=" . $fila->getIdConcurso() . " >Editar
                </button><button class='borrarUser borrar' value=" . $fila->getIdConcurso() . " ><i class='fa fa-trash'></i></button></td></tr>";
        }
            ?>
    </tbody>

    </table>
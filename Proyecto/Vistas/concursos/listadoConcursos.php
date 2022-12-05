
<h1>Listado concursos</h1>
<?php

$concurso = new RepoConcurso();
$cantidad = $concurso->getAll();

echo "<table border=1px>";


foreach($cantidad as $fila) {

    echo "<tr><td> ".$fila->getIdConcurso().
    "</td><td> ".$fila->getName();

}
echo "</td></tr></table>";


?>
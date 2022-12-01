
<h1>Listado concursos</h1>
<?php

$concurso = new RepoConcurso();
$cantidad = $concurso->getAll();
echo "<pre>";
var_dump($cantidad);    
echo "</pre>";
echo "<table border=1px>";

    
for($i=0;$i<count($cantidad);$i++){
    echo "<tr><td> ".$cantidad[$i]->getIdConcurso().
        "</td><td> ".$cantidad[$i]->getName().
        "</td><td> "."</td></tr>";
}

echo "</table>";
echo "<table border=1px>";


foreach($cantidad as $fila) {

    echo "<tr><td> ".$fila->getIdConcurso().
    "</td><td> ".$fila->getName();

}
echo "</td></tr></table>";


?>
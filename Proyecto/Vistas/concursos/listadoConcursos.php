
<h1 style="font-size:45px; margin:20px; text-align:center;">Listado concursos</h1>
<?php

$concurso = new RepoConcurso();
$cantidad = $concurso->getAll();



foreach($cantidad as $fila) {

   
   
    echo '<div class="tarjeta">
        <div class="titulo">'.$fila->getIdConcurso().' '. $fila->getName().'</div>
            <div class="cuerpo">
                <img src="img/concurso.jpg" alt="muestra">
                    <p><strong>Fecha inicio Inscripcion:</strong> '.$fila->getFecha_ini_inscrip().' </p>
                    <p><strong>Fecha fin Inscripcion: </strong>'.$fila->getFecha_fin_inscrip().' </p>
            </div>
        <div class="pie">
        <a href="?menu=concurso&id='.$fila->getIdConcurso().'">Ver concurso</a>
        </div>
    </div>';
        


}

?>


<?php
$rc = new RepoConcurso();
$rp = new RepoParticipantes();
$participantes = $rp->getParticipantesDeConcurso($_GET['id']);
$concurso = $rc->getConcursoById($_GET['id']);

$usuario = Sesion::leer('user')->getId();
$habilitado = TRUE;


echo '<p>' . $concurso->getName() . '</p>';
echo '<p>' . $concurso->getFecha_ini_inscrip() . ' ' . $concurso->getFecha_fin_inscrip() . '</p>';
foreach ($participantes as $fila) {
    echo '<p>' . $fila->getId() . ' ' . $fila->getName() .', Juez; '.$fila->getJuez();'</p>';
    if ($usuario == $fila->getId()) {
        $habilitado = FALSE;
    } else {
    }
}
$hoy = date("Y-m-d");
if ($hoy > $concurso->getFecha_ini_inscrip() && $hoy < $concurso->getFecha_fin_inscrip()) {
    if ($habilitado == TRUE) {
        echo '<form action="?menu=concurso.php method="post">
            <input id="'.$usuario.'" style="display:none;" value="'.$usuario.'"/>
            <input type="button" class="enviar" value="Inscribirme">
            </form>';
    } else {
        echo '<input type="button" class="enviar" value="Ya estoy inscrito">';
    }
} else {
    echo '<input type="button" class="enviar" value="Tiempo agotado para la inscripicon" disabled>';
}

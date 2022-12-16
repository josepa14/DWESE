<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/training/proyecto/cargadores/cargador.php';
if (!Login::UsuarioEstaLogueado()) {
    header("location:?menu=incio");
}
    $rc = new RepoConcurso();
    $rp = new RepoParticipantes();
    $rc = new RepoConcurso();
    $participantes = $rp->getParticipantesDeConcurso($_GET['id']);
    $concurso = $rc->getConcursoById($_GET['id']);
    $usuario = Sesion::leer('user')->getId();
    $habilitado = TRUE;


if (isset($_POST['submit'])) {
    $user = $_POST['submit'];
    $rp->insertarParticipante($user, $concurso->getIdConcurso());
    header("location:?menu=concurso&id=".$concurso->getIdConcurso());

}
if (isset($_POST['eliminar'])) {
    $user = $_POST['eliminar'];
    $rp->anularParticipante($user, $concurso->getIdConcurso());
    header("location:?menu=concurso&id=".$concurso->getIdConcurso());
}
echo '<div class="tarjeta">
            <div class="titulo">' . $concurso->getIdConcurso() . ' ' . $concurso->getName() . '
            </div>
                <div class="cuerpo">
                    <img src="img/concurso.jpg" alt="muestra">
                    <p><strong>Fecha inicio Inscripcion:</strong> ' . $concurso->getFecha_ini_inscrip() . ' </p>
                    <p><strong>Fecha fin Inscripcion: </strong>' . $concurso->getFecha_fin_inscrip() . ' </p>
                    <h1>PARTICIPANTES</h1>
                    <table>';
foreach ($participantes as $fila) {
    echo '<tr><td>Nombre: ' . $fila->getName() . ' </td><td>Contacto: ' . $fila->getCorreo() . '</td><td> Participa como; ' . $fila->getJuez() . '</td></tr>';
    if ($usuario == $fila->getId()) {
        $habilitado = FALSE;
    } else {
    }
}

echo '</table>
                </div>
            <div class="pie">';
$hoy = date("Y-m-d");
if ($hoy > $concurso->getFecha_ini_inscrip() && $hoy < $concurso->getFecha_fin_inscrip()) {
    echo '<form action="" method="post">';
    if ($habilitado == TRUE) {
       
                    echo '<button type="submit" name="submit" class="enviar" value="' . $usuario . '">INSCRIBIRME</input>
            </form>';
    } else {
        echo '<input type="button" class="enviar" value="Ya estoy inscrito">
            <button type="submit" name="eliminar" class="enviar" value="' . $usuario . '">ANULAR SUBSCRIPCION</input>
            </form>';
    }
} else {
    echo '<input type="button" class="enviar" value="Tiempo agotado para la inscripicon" disabled>
            </form>';
}
echo '</div></div>
    </div>';
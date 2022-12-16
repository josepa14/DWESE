<?php
class RepoParticipantes
{
    private $con;

    public function __construct()
    {

        $this->con = BD::getConnection();
    }
    public function getParticipantesDeConcurso($idConcurso)
    {

        $sql = "SELECT usuario.*,participacion.juez FROM `usuario`,`participacion` WHERE usuario.idParticipante = participacion.Usuario_idParticipante AND participacion.Concurso_idConcurso = $idConcurso;";
        $result = $this->con->query($sql);
        $participantes = [];

        $consulta = $result->fetchAll(PDO::FETCH_ASSOC);
        $tamano = count($consulta);
        for ($i = 0; $i < $tamano; $i++) {
            $participantes[$i] = new Participantes(
                $consulta[$i]['idParticipante'],
                $consulta[$i]['name'],
                $consulta[$i]['correo'],
                $consulta[$i]['imagen'],
                $consulta[$i]['juez']
            );
        }
        return $participantes;
    }
    public function insertarParticipante($idParticipante,$idConcurso)
   
    {
        $idcon = $idConcurso;
        $sql = "INSERT INTO `participacion`(`Concurso_idConcurso`, `usuario_idParticipante`) VALUES ('$idParticipante','$idcon')";
        $result = $this->con->query($sql);
       
        return $result;
    }
    public function anularParticipante($idParticipante,$idConcurso)
   
    {
        $sql = "DELETE FROM `participacion` WHERE `usuario_idParticipante` ='$idParticipante' AND `Concurso_idConcurso` ='$idConcurso'";
        $result = $this->con->query($sql);
       
        return $result;
    }
}


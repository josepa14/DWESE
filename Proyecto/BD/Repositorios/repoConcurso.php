<?php
class RepoConcurso
{
    private $con;

    public function __construct()
    {

        $this->con = BD::getConnection();
    }

    public function getAll()
    {

        $sql = "SELECT * FROM `concurso`";
        $result = $this->con->query($sql);
        $concursos = [];

        $consulta = $result->fetchAll(PDO::FETCH_ASSOC);
        $tamano = count($consulta); 
        for ($i = 0; $i < $tamano; $i++) {
            $concursos[$i] = new Concurso(
                $consulta[$i]['idConcurso'],
                $consulta[$i]['name'],
                $consulta[$i]['descripcion'],
                $consulta[$i]['fecha_ini_inscrip'],
                $consulta[$i]['fecha_fin_inscrip'],
                $consulta[$i]['fecha_ini_con'],
                $consulta[$i]['fecha_fin_con']
            );
        }
        return $concursos;
    }
    public function getConcurso($nombre)
    {

        $sql = "SELECT * FROM `concurso` WHERE `name`= '$nombre';";
        $result = $this->con->query($sql);
        $consulta = $result->fetch(PDO::FETCH_ASSOC);
        $tamano = count($consulta);
        if ($tamano > 0) {
            $concurso = new Concurso(
                $consulta['idConcurso'],
                $consulta['name'],
                $consulta['descripcion'],
                $consulta[' fecha_ini_inscrip'],
                $consulta['fecha_fin_inscrip'],
                $consulta['fecha_ini_con'],
                $consulta['fecha_fin_con']);
            return $concurso;
        }
    }
    public function insertUser(Concurso $concurso)
    {
        $name = $concurso->getName();
        $iniins = $concurso->getFecha_ini_inscrip();
        $finins = $concurso->getFecha_fin_inscrip();
        $inicon = $concurso->getFecha_ini_con();
        $fincon = $concurso->getFecha_fin_con();
        $sql = "INSERT INTO `concurso`(`name`, `fecha_ini_inscrip`, `fecha_fin_inscrip`, `fecha_ini_con`, `fecha_fin_con`) 
        VALUES ('$name','$iniins','$finins','$inicon','$fincon');";
        if ($result = $this->con->exec($sql)) {
            return true;
        } else return false;
    }
}

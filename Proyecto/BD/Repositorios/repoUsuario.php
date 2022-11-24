<?php
class RepoUsuario
{
    private $con;

    public function __construct()
    {

        $this->con = BD::getConnection();
    }

    public function getAll()
    {

        $sql = "SELECT * FROM `usuario`";
        $result = $this->con->query($sql);
        $usuarios = [];

        $consulta = $result->fetch(PDO::FETCH_ASSOC);
        $tamano = count($consulta);
        for ($i = 0; $i <= $tamano; $i++) {
            $usuarios[$i] = new Usuario($consulta['idParticipante'],$consulta['name'],
            $consulta['login'],$consulta['password'],$consulta['correo'],
            $consulta['localizacion'],$consulta['imagen'],$consulta['rol']);
        }
        return $usuarios;
    }
    public function getUser($login,$pass)
    {

        $sql = "SELECT * FROM `usuario` WHERE `login`= '$login' and `password`='$pass';";
        $result = $this->con->query($sql);
        $consulta = $result->fetch(PDO::FETCH_ASSOC);
        $tamano = count($consulta);
       if($tamano > 0){
        $user = new Usuario($consulta['idParticipante'],$consulta['name'],
        $consulta['login'],$consulta['password'],$consulta['correo'],
        $consulta['localizacion'],$consulta['imagen'],$consulta['rol']);

        return $user;
       }
    }
}

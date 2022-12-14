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

        $consulta = $result->fetchAll(PDO::FETCH_ASSOC);
        $tamano = count($consulta);
        for ($i = 0; $i < $tamano; $i++) {
            $usuarios[$i] = new Usuario($consulta[$i]['idParticipante'],$consulta[$i]['name'],
            $consulta[$i]['login'],$consulta[$i]['password'],$consulta[$i]['correo'],
            $consulta[$i]['localizacion'],$consulta[$i]['imagen'],$consulta[$i]['rol']);
            
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
    public function getById($id)
    {

        $sql = "SELECT * FROM `usuario` WHERE `idParticipante`= '$id';";
        $result = $this->con->query($sql);
        $consulta = $result->fetch(PDO::FETCH_ASSOC);
        $tamano = count($consulta);
       if($tamano > 0){
        $user = new Usuario($consulta['idParticipante'],$consulta['name'],
        $consulta['login'],$consulta['password'],$consulta['correo'],
        $consulta['localizacion'],$consulta['imagen'],$consulta['rol']);
        return $user;
       } else{
        return 0;
       }
       
    }
    public function insertUser(Usuario $usuario){
        $name = $usuario->getName();
        $login = $usuario->getLogin();
        $pass = $usuario->getPass();
        $correo = $usuario->getCorreo();
        $loc = $usuario->getLocalizacion();
        $img = $usuario->getImagen();
        $rol = $usuario->getRol();
        $sql = "INSERT INTO `usuario`(`name`, `login`, `password`, `correo`, `localizacion`, `imagen`,`rol`) 
        VALUES ('$name','$login','$pass','$correo','$loc','$img','$rol');";
        if($result = $this->con->exec($sql)){
            return true;
        }
        else return false;
       }
       public function borrarUser($id){
        $sql = "DELETE FROM `usuario` WHERE `idParticipante` = $id";
        if($result = $this->con->exec($sql)){
            return true;
        }
        else return false;
       }
       public function updateUser($id,$usuario){

        $name = $usuario->getName();
        $login = $usuario->getLogin();
        $pass = $usuario->getPass();
        $correo = $usuario->getCorreo();
        $loc = $usuario->getLocalizacion();
        $img = $usuario->getImagen();
        $rol = $usuario->getRol();

        $sql = "UPDATE `usuario` SET `name`='$name',`login`='$login',`password`='$pass',`correo`='$correo',
        `imagen`='$img',`rol`='$rol' WHERE `idParticipante` = $id";
        if($this->con->exec($sql)){
            return http_response_code(201);
        }
        else return false;
       }
}


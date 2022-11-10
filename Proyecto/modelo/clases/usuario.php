<?php

Class Usuario{

    private $name;
    private $pass;
    private $rol;
    
    public function __getUser() {
        return $this->user;
    }

    public function __setUser($valor) {
        $this->pass = $valor;
    }

    public function __getPass() {
        return $this->pass;
    }

    public function __setPass($valor) {
        $this->pass = $valor;
    }
    public function __getRol() {
        return $this->rol;
    }

    public function __setRol($valor) {
        $this->rol = $valor;
    }


}

//$registro= BD::getusuariobyid($id)

?>
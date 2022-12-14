<?php
class Concurso{
    protected $idConcurso;
    protected $name;
    protected $descripcion;
    protected $fecha_ini_inscrip;
    protected $fecha_fin_inscrip;
    protected $fecha_ini_con;
    protected $fecha_fin_con;


   	
    
    public function __construct($idConcurso=null,$name,$descripcion,$fecha_ini_inscrip,$fecha_fin_inscrip,$fecha_ini_con,$fecha_fin_con) {
        $this->idConcurso = $idConcurso;
        $this->name = $name;
        $this->descripcion = $descripcion;
        $this->fecha_ini_inscrip = $fecha_ini_inscrip;
        $this->fecha_fin_inscrip = $fecha_fin_inscrip;
        $this->fecha_ini_con = $fecha_ini_con;
        $this->fecha_fin_con = $fecha_fin_con;
    }


    /**
     * Get the value of idConcurso
     */ 
    public function getIdConcurso()
    {
        return $this->idConcurso;
    }

    /**
     * Set the value of idConcurso
     *
     * @return  self
     */ 
    public function setIdConcurso($idConcurso)
    {
        $this->idConcurso = $idConcurso;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of fecha_ini_inscrip
     */ 
    public function getFecha_ini_inscrip()
    {
        return $this->fecha_ini_inscrip;
    }

    /**
     * Set the value of fecha_ini_inscrip
     *
     * @return  self
     */ 
    public function setFecha_ini_inscrip($fecha_ini_inscrip)
    {
        $this->fecha_ini_inscrip = $fecha_ini_inscrip;

        return $this;
    }

    /**
     * Get the value of fecha_fin_inscrip
     */ 
    public function getFecha_fin_inscrip()
    {
        return $this->fecha_fin_inscrip;
    }

    /**
     * Set the value of fecha_fin_inscrip
     *
     * @return  self
     */ 
    public function setFecha_fin_inscrip($fecha_fin_inscrip)
    {
        $this->fecha_fin_inscrip = $fecha_fin_inscrip;

        return $this;
    }

    /**
     * Get the value of fecha_ini_con
     */ 
    public function getFecha_ini_con()
    {
        return $this->fecha_ini_con;
    }

    /**
     * Set the value of fecha_ini_con
     *
     * @return  self
     */ 
    public function setFecha_ini_con($fecha_ini_con)
    {
        $this->fecha_ini_con = $fecha_ini_con;

        return $this;
    }

    /**
     * Get the value of fecha_fin_con
     */ 
    public function getFecha_fin_con()
    {
        return $this->fecha_fin_con;
    }

    /**
     * Set the value of fecha_fin_con
     *
     * @return  self
     */ 
    public function setFecha_fin_con($fecha_fin_con)
    {
        $this->fecha_fin_con = $fecha_fin_con;

        return $this;
    }

        /**
         * Get the value of descripcion
         */ 
        public function getDescripcion()
        {
                return $this->descripcion;
        }

        /**
         * Set the value of descripcion
         *
         * @return  self
         */ 
        public function setDescripcion($descripcion)
        {
                $this->descripcion = $descripcion;

                return $this;
        }
}

?>
<?php
class Participantes
{
    protected $id;
    protected $name;
    protected $correo;
    protected $imagen;
    protected $juez;

    public function __construct($id = null, $name,  $correo, $imagen = null, $juez = FALSE)
    {
        $this->id = $id;
        $this->name = $name;
        $this->correo = $correo;
        $this->imagen = $imagen;
        $this->juez = $juez;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of correo
     */ 
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     *
     * @return  self
     */ 
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of juez
     */ 
    public function getJuez()
    {
        return $this->juez;
    }

    /**
     * Set the value of juez
     *
     * @return  self
     */ 
    public function setJuez($juez)
    {
        $this->juez = $juez;

        return $this;
    }
}

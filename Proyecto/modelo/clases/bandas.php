<?php

class Bandas{
    private $idBandas;
    private $distancia;
    private $frencuencia;
    

    public function __getIdBandas()
    {
        return $this->idBandas;
    }

    public function __setIdBandas($idBandas)
    {
        $this->idBandas = $idBandas;

        return $this;
    }
 
    public function __getDistancia()
    {
        return $this->distancia;
    }
 
    public function __setDistancia($distancia)
    {
        $this->distancia = $distancia;

        return $this;
    }


 
    public function __getFrencuencia()
    {
        return $this->frencuencia;
    }

    public function __setFrencuencia($frencuencia)
    {
        $this->frencuencia = $frencuencia;

        return $this;
    }
}
?>
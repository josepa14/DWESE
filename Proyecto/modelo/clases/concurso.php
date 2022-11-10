<?php

class Concurso{
 private $idConcurso;
 private $nanme;
 private $fecha_ini_inscrip;
 private $fecha_fin_inscrip;
 private $fecha_ini_con;
 private $fecha_fin_con;


 public function __getIdConcurso()
 {
  return $this->idConcurso;
 }


 public function __getNanme()
 {
  return $this->nanme;
 }
 public function __setNanme($nanme)
 {
  $this->nanme = $nanme;
  return $this;
 }


 public function __getFecha_ini_inscrip()
 {
  return $this->fecha_ini_inscrip;
 }
public function __setFecha_ini_inscrip($fecha_ini_inscrip)
 {
  $this->fecha_ini_inscrip = $fecha_ini_inscrip;
  return $this;
 }


 public function __getFecha_fin_inscrip()
 {
  return $this->fecha_fin_inscrip;
 } 
 public function __setFecha_fin_inscrip($fecha_fin_inscrip)
 {
  $this->fecha_fin_inscrip = $fecha_fin_inscrip;
  return $this;
 }

 public function __getFecha_ini_con()
 {
  return $this->fecha_ini_con;
 }

 public function __setFecha_ini_con($fecha_ini_con)
 {
  $this->fecha_ini_con = $fecha_ini_con;

  return $this;
 }

 public function __getFecha_fin_con()
 {
  return $this->fecha_fin_con;
 }

 public function __setFecha_fin_con($fecha_fin_con)
 {
  $this->fecha_fin_con = $fecha_fin_con;
  return $this;
 }
}

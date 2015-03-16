<?php


/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Nomina {
    
    //Properties
    protected $idNomina;
    protected $fkIdEmpleado;
    protected $fechaMes;
    protected $nominaTotal;
    protected $pagada;
    
    //Construct
    function __construct($idNomina, $fkIdEmpleado, $fechaMes, $nominaTotal, $pagada) {
        
        $this->idNomina = $idNomina;
        $this->fkIdEmpleado = $fkIdEmpleado;
        $this->fechaMes = $fechaMes;
        $this->nominaTotal = $nominaTotal;
        $this->pagada = $pagada;
    }
    
    //Methods
    public function getIdNomina() {
        return $this->idNomina;
    }
    
    public function getFkIdEmpleado() {
        return $this->fkIdEmpleado;
    }
    
    public function getFechaMes() {
        return $this->fechaMes;
    }
    
    public function getNominaTotal() {
        return $this->nominaTotal;
    }
    
    public function getPagada() {
        return $this->pagada;
    }
}


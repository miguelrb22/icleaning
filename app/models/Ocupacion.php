<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Ocupacion {
    
    //Properties
    protected $idOcupacion;
    protected $fkIdEmpleado;
    protected $fechaOcupado;
    
    //Construct
    function __construct($idOcupacion, $fkIdempleado, $fechaOcupado) {
        $this->idOcupacion = $idOcupacion;
        $this->fkIdEmpleado = $fkIdempleado;
        $this->fechaOcupado = $fechaOcupado;
    }
    
    //Methods
    public function getIdOcupacion() {
        return $this->idOcupacion;
    }
    
    public function getFkIdEmpleado() {
        return $this->fkIdEmpleado;
    }
    
    public function getFechaOcupado() {
        return $this->fechaOcupado;
    }
}


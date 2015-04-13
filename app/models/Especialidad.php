<?php


/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Especialidad {
    
    //Properties
    protected $idEspecialidad;
    protected $tipoEspecialidad;
    protected $salarioFijo;
    protected $cobroHora;
    
    //Construct
    function __construct($idEspecialidad, $tipoEspecialidad, $salarioFijo, $cobroHora) {
        
        $this->idEspecialidad = $idEspecialidad;
        $this->tipoEspecialidad = $tipoEspecialidad;
        $this->salarioFijo = $salarioFijo;
        $this->cobroHora = $cobroHora;
    }
    
    //Methods
    public function getIdEspecialidad() {
        return $this->idEspecialidad;
    }
    
    public function getTipoEspecialidad() {
        return $this->tipoEspecialidad;
    }
    
    public function getSalarioFijo() {
        return $this->salarioFijo;
    }
    
    public function getCobroHora() {
        return $this->cobroHora;
    }
}

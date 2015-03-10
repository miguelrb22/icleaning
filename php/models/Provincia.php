<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Provincia 
{
    //Properties
    protected $idEspecialidad;
    protected $nombreProvincia;
    
    //Construct
    function __construct($idEspecialidad, $nombreProvincia) {
        
        $this->idEspecialidad = $idEspecialidad;
        $this->nombreProvincia = $nombreProvincia;
    }
    
    //Methods
    public function getIdEspecialidad() {
        return $this->idEspecialidad;
    }
    
    public function getNombreProvincia() {
        return $this->nombreProvincia;
    }
}



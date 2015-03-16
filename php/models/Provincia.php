<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Provincia 
{
    //Properties
    protected $idProvincia;
    protected $nombreProvincia;
    
    //Construct
    function __construct($idProvincia, $nombreProvincia) {
        
        $this->idProvincia = $idProvincia;
        $this->nombreProvincia = $nombreProvincia;
    }
    
    //Methods
    public function getIdProvincia() {
        return $this->idProvincia;
    }
    
    public function getNombreProvincia() {
        return $this->nombreProvincia;
    }
}



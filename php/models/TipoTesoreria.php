<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class TipoTesoreria {
    
    //Properties
    protected $idTipoTesoreria;
    protected $tipoTesoreria;
    
    //Construct
    function __construct($idTipoTesoreria, $tipoTesoreria) {
        
        $this->idTipoTesoreria = $idTipoTesoreria;
        $this->tipoTesoreria = $tipoTesoreria;
    }
    
    //Methods
    public function getIdTipoTesoreria() {
        return $this->idTipoTesoreria;
    }
    
    public function getTipoTesoreria() {
        return $this->tipoTesoreria;
    }
}


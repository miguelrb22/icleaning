<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Zona {
    
    //Properties
    protected $idZona;
    protected $fkIdProvincia;
    protected $nombre;
    
    //Construct
    function __construct($idZona, $fkIdProvincia, $nombre) {
        
        $this->idZona = $idZona;
        $this->fkIdProvincia = $fkIdProvincia;
        $this->nombre = $nombre;
    }
    
    //Methods
    public function getIdZona() {
        return $this->idZona;
    }
    
    public function getFkIdProvincia() {
        return $this->fkIdProvincia;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
}


<?php


/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Factura {
    
    //Properties
    protected $idFactura;
    protected $mes;
    protected $totalImporte;
    protected $pagada;
    protected $idTrabajo;
    
    //Construct
    function __construct($idFactura, $mes, $totalImporte, $pagada, $idTrabajo) {
        
        $this->idFactura = $idFactura;
        $this->mes = $mes;
        $this->totalImporte = $totalImporte;
        $this->pagada = $pagada;
        $this->idTrabajo = $idTrabajo;
    }
    
    //Methods
    public function getIdFactura() {
        return $this->idFactura;
    }
    
    public function getMes() {
        return $this->mes;
    }
    
    public function getTotalImporte() {
        return $this->totalImporte;
    }
    
    public function getPagada() {
        return $this->pagada;
    }
    
    public function getIdTrabajo() {
        return $this->idTrabajo;
    }
    
    public function setIdTrabajo($idTrabajo) {
        $this->idTrabajo = $idTrabajo;
    }
}

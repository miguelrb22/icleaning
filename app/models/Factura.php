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
    
    //Construct
    function __construct($idFactura, $mes, $totalImporte, $pagada) {
        
        $this->idFactura = $idFactura;
        $this->mes = $mes;
        $this->totalImporte = $totalImporte;
        $this->pagada = $pagada;
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
}

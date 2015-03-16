<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Tesoreria {
    
    //Properties
    protected $idTesoreria;
    protected $fkIdTipoTesoreria;
    protected $fkIdFactura;
    protected $fkIdCompra;
    protected $fkIdNomina;
    protected $fechaImporte;
    protected $ingresado;
    protected $importe;
    
    //Construct
    function __construct($idTesoreria, $fkIdTipoTesoreria, $fkIdFactura, $fkIdCompra, $fkIdNomina, $fechaImporte, $ingresado, $importe) {
        
        $this->idTesoreria = $idTesoreria;
        $this->fkIdTipoTesoreria = $fkIdTipoTesoreria;
        $this->fkIdFactura = $fkIdFactura;
        $this->fkIdCompra = $fkIdCompra;
        $this->fkIdNomina = $fkIdNomina;
        $this->fechaImporte = $fechaImporte;
        $this->ingresado = $ingresado;
        $this->importe = $importe;
    }
    
    //Methods
    public function getIdTesoreria() {
        return $this->idTesoreria;
    }
    
    public function getfkIdTipoTesoreria() {
        return $this->fkIdTipoTesoreria;
    }
    
    public function getfkIdFactura() {
        return $this->fkIdFactura;
    }
    
    public function getFkIdCompra() {
        return $this->fkIdCompra;
    }
    
    public function getFkIdNomina() {
        return $this->fkIdNomina;
    }
    
    public function getFechaImporte() {
        return $this->fechaImporte;
    }
    
    public function getIngresado() {
        return $this->ingresado;
    }
    
    public function getImporte() {
        return $this->importe;
    }
}


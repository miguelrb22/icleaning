<?php


/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Compra {
    
    //Properties
    protected $idCompra;
    protected $fkIdEspecialidad;
    protected $fechaCompra;
    protected $precioCompra;
    protected $descripcion;
    
    //Construct
    function __construct($idCompra, $fkIdEspecialidad, $fechaCompra, $precioCompra, $descripcion) {
        
        $this->idCompra = $idCompra;
        $this->fkIdEspecialidad = $fkIdEspecialidad;
        $this->fechaCompra = $fechaCompra;
        $this->precioCompra = $precioCompra;
        $this->descripcion = $descripcion;
    }
    
    //Methods
    public function getIdCompra() {
        return $this->idCompra;
    }
    
    public function getFkIdEspecialidad() {
        return $this->fkIdEspecialidad;
    }
    
    public function getFechaCompra() {
        return $this->fechaCompra;
    }
    
    public function getPrecioCompra() {
        return $this->precioCompra;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
}

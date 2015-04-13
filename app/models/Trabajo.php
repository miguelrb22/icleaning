<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Trabajo {
    
    //Properties
    protected $idTrabajo;
    protected $fkIdCliente;
    protected $fkIdEmpleado;
    protected $valoracion;
    protected $fkIdFactura;
    protected $importeTotal;
    protected $finalizado;
    protected $direccionLugar;
    protected $estimacionHoras;
    protected $gastoTotal;
    protected $importeRecibido;
    protected $fechaInicio;
    protected $fechaFin;
    
    //Consruct
    function __construct($idTrabajo, $fkIdCliente, $fkIdEmpleado, $valoracion, $fkIdFactura, $importeTotal,
                         $finalizado, $direccionLugar, $estimacionHoras, $gastoTotal, $importeRecibido, $fechaInicio, $fechaFin) {
        
        $this->idTrabajo = $idTrabajo;
        $this->fkIdCliente = $fkIdCliente;
        $this->fkIdEmpleado = $fkIdEmpleado;
        $this->valoracion = $valoracion;
        $this->fkIdFactura = $fkIdFactura;
        $this->importeTotal = $importeTotal;
        $this->finalizado = $finalizado;
        $this->direccionLugar = $direccionLugar;
        $this->estimacionHoras = $estimacionHoras;
        $this->gastoTotal = $gastoTotal;
        $this->importeRecibido = $importeRecibido;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFin = $fechaFin;
    }
    
    //Methods
    public function getIdTrabajo() {
        return $this->idTrabajo;
    }
    
    public function getFkIdCliente() {
        return $this->fkIdCliente;
    }
    
    public function getFkIdEmpleado() {
        return $this->fkIdEmpleado;
    }
    
    public function getValoracion() {
        return $this->valoracion;
    }
    
    public function getFkIdFactura() {
        return $this->fkIdFactura;
    }
    
    public function getImporteTotal() {
        return $this->importeTotal;
    }
    
    public function getFinalizado() {
        return $this->finalizado;
    }
    
    public function getDireccionLugar() {
        return $this->direccionLugar;
    }
    
    public function getEstimacionHoras() {
        return $this->estimacionHoras;
    }
    
    public function getGastoTotal() {
        return $this->gastoTotal;
    }
    
    public function getImporteRecibido() {
        return $this->importeRecibido;
    }
    
    public function getFechaInicio() {
        return $this->fechaInicio;
    }
    
    public function getFechaFin() {
        return $this->fechaFin;
    }
}


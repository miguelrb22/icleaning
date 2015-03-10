<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Trabajador {
    
    //Properties
    protected $idEmpleado;
    protected $fkIdEspecialidad;
    protected $fkIdZona;
    protected $nif;
    protected $apellidos;
    protected $nombre;
    protected $telefono;
    protected $email;
    protected $numeroCuenta;
    protected $sip;
    protected $anyosExperiencia;
    protected $fechaUltimoTrabajo;
    protected $horasTrabajadas;
    protected $contrasenya;
    protected $fotoEmpleado;
    protected $descripcion;
    protected $valoracion;
    
    //Construct
    function __construct($idEmpleado, $fkIdEspecialidad, $fkIdZona, $nif, $apellidos, $nombre, $telefono, $email, $numeroCuenta, $sip, $anyosExperiencia, $fechaUltimoTrabajo, $horasTrabajadas, $contrasenya, $fotoEmpleado, $descripcion, $valoracion) {
        
        $this->idEmpleado = $idEmpleado;
        $this->fkIdEspecialidad = $fkIdEspecialidad;
        $this->fkIdZona = $fkIdZona;
        $this->nif =  $nif;
        $this->apellidos = $apellidos;
        $this->nombre = $nombre;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->numeroCuenta = $numeroCuenta;
        $this->sip = $sip;
        $this->anyosExperiencia = $anyosExperiencia;
        $this->fechaUltimoTrabajo = $fechaUltimoTrabajo;
        $this->horasTrabajadas = $horasTrabajadas;
        $this->contrasenya = $contrasenya;
        $this->fotoEmpleado = $fotoEmpleado;
        $this->descripcion = $descripcion;
        $this->valoracion = $valoracion;
    }
    
    //Methods
    public function getIdEmpleado() {
        return $this->idEmpleado;
    }
    
    public function getFkIdEspecialidad() {
        return $this->fkIdEspecialidad;
    }
    
    public function getFkIdZona() {
        return $this->fkIdZona;
    }
    
    public function getNif() {
        return $this->nif;
    }
    
    public function getApellidos() {
        return $this->apellidos;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getNumeroCuenta() {
        return $this->numeroCuenta;
    }
    
    public function getSip() {
        return $this->sip;
    }
    
    public function getAnyosExperiencia() {
        return $this->anyosExperiencia;
    }
    
    public function getFechaUltimoTrabajo() {
        return $this->fechaUltimoTrabajo;
    }
    
    public function getHorasTrabajadas() {
        return $this->horasTrabajadas;
    }
    
    public function getContrasenya() {
        return $this->contrasenya;
    }
    
    public function getFotoEmpleado() {
        return $this->fotoEmpleado;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }
    
    public function getValoracion() {
        return $this->valoracion;
    }
}


<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Cliente {
    
    //Properties
    protected $idCliente;
    protected $dni;
    protected $nombre;
    protected $direccion;
    protected $telefono;
    protected $email;
    protected $fechaRegistro;
    protected $contrasenya;
    protected $fotoCliente;
    protected $apellidos;
    
    //Construct
    function __construct($idCliente, $dni, $nombre, $direccion, $telefono, $email, $fechaRegistro, $contrasenya, $fotoCliente, $apellidos) {
        
        $this->idCliente = $idCliente;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->email = $email;
        $this->fechaRegistro = $fechaRegistro;
        $this->contrasenya = $contrasenya;
        $this->fotoCliente = $fotoCliente;
        $this->apellidos = $apellidos;
    }
    
    //Methods
    public function getIdCliente() {
        return $this->idCliente;
    }
    
    public function getDni() {
        return $this->dni;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getDireccion() {
        return $this->direccion;
    }
    
    public function getTelefono() {
        return $this->telefono;
    }
    
    public function getEmail() {
        return $this->email;
    }
    
    public function getFechaRegistro() {
        return $this->fechaRegistro;
    }
    
    public function getContrasenya() {
        return $this->contrasenya;
    }
    
    public function getFotoCliente() {
        return $this->fotoCliente;
    }
    
    public function getApellidos() {
        return $this->apellidos;
    }
}


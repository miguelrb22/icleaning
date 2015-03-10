<?php

use mysqli;

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package database
 */
class DBAccess
{
    //Properties
    protected $mysqli;
    protected $query;
    protected $result;
    
    //Construct
    function __construct() {
        $this->mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");
    }
    
    //Methods
    //Select
    public function getSelect($sentencia) {
        
        $this->query = $sentencia;
        $this->result = $this->mysqli->query($this->query);
        
        $this->mysqli->close();
        
        return $this->result;
        
    }
    
    //Insert
    public function insert($sentencia) {
        
        $this->query = $sentencia;
        //Codigo para insertar
        
        $this->mysqli->close();
    }
    
    //Update
    public function update($sentencia) {
        
        $this->query = $sentencia;
        //Codigo para actualizar
        
        $this->mysqli->close();
    }
}


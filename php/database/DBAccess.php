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
    function __construct($sentencia) {
        
        $this->mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");
        $this->query = $sentencia;        
        $this->result = $this->mysqli->query($this->query);
        
        $this->mysqli->close();
    }
    
    //Methods
    public function getResult() {
        return $this->result;
    }
}


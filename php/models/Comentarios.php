<?php

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class Comentarios {
    
    //Properties
    protected $idComentario;
    protected $comentario;
    protected $fkIdEmpleado;
    
    //Construct
    function __construct($idComentario, $comentario, $fkIdEmpleado) {
        
        $this->idComentario = $idComentario;
        $this->comentario = $comentario;
        $this->fkIdEmpleado = $fkIdEmpleado;
    }
    
    //Methods
    public function getIdComentario() {
        return $this->idComentario;
    }
    
    public function getComentario() {
        return $this->comentario;
    }
    
    public function getFkIdEmpleado() {
        return $this->fkIdEmpleado;
    }
}


<?php

include_once '../models/Especialidad.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class EspecialidadController {
    
    //Properties
    
    //Constructor
    
    //Methods
    public function getListaEspecialidades() {
        
        $listaEspecialidades = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from especialidad");

        foreach($result as $row){
        
            $especialidad = new Especialidad($row['idespecialidad'], $row['tipo_especialidad'], $row['salario_fijo'], $row['cobro_hora']);
            $listaEspecialidades->addItem($especialidad);   
        }
        
        return $listaEspecialidades;
    }
    
    public function getEspecialidad($idEspecialidad) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from especialidad WHERE idespecialidad=" . $idEspecialidad);
        
        $especialidad = new Especialidad($result['idespecialidad'], $row['tipo_especialidad'], $row['salario_fijo'], $row['cobro_hora']);
        
        return $especialidad;
    }
    
    public function insertEspecialidad($especialidad) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO especialidad ('tipo_especialidad', 'salario_fijo', 'cobro_hora') VALUES (" . 
                          $especialidad->getTipoEspecialidad() . ", " . $especialidad->getSalarioFijo() . ", " . $especialidad->getCobroHora() . ")");
    }
    
    public function updateEspecialidad($especialidad) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE especialidad SET 'tipo_especialidad'=" . $especialidad->getTipoEspecialidad() . ", 'salario_fijo=" . $especialidad->getSalarioFijo() .
                          ", 'cobro_hora=" . $especialidad->getCobroHora() . " WHERE 'idespecialidad'=" . $especialidad->getIdEspecialidad());
    }
    
    public function deleteEspecialidad($especialidad) { 
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM especialidad WHERE 'idespecialidad'=" . $especialidad->getIdEspecialidad());
    }
}

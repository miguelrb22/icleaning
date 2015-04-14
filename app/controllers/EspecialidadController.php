<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

include_once  $path.'/icleaning/app/models/Especialidad.php';
include_once  $path.'/icleaning/app/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class EspecialidadController {
    
    //Properties
    
    //Constructor
    
    //Methods
    
    //Tested
    public function getListaEspecialidades() {
        
        $listaEspecialidad = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from especialidad");

        foreach($result as $row){
        
            $especialidad = new Especialidad($row['idespecialidad'], $row['tipo_especialidad'], $row['salario_fijo'], $row['cobro_hora']); 
            
            array_push($listaEspecialidad, $especialidad);
            
        }
        
        return $listaEspecialidad;
    }
    
    //Tested
    public function getEspecialidad($idEspecialidad) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from especialidad WHERE idespecialidad=" . $idEspecialidad);
        
        foreach($result as $row){
            $especialidad = new Especialidad($row['idespecialidad'], $row['tipo_especialidad'], $row['salario_fijo'], $row['cobro_hora']);  
        }
        
        return $especialidad;
    }
    
    //Tested
    public function insertEspecialidad($especialidad) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO especialidad (tipo_especialidad, salario_fijo, cobro_hora) VALUES ('" . 
                          $especialidad->getTipoEspecialidad() . "', " . $especialidad->getSalarioFijo() . ", " . $especialidad->getCobroHora() . ")");
   
    }
    
    //Tested
    public function updateEspecialidad($especialidad) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE especialidad SET tipo_especialidad='" . $especialidad->getTipoEspecialidad() . "', salario_fijo=" . $especialidad->getSalarioFijo() .
                          ", cobro_hora=" . $especialidad->getCobroHora() . " WHERE idespecialidad=" . $especialidad->getIdEspecialidad());
    }
    
    //Tested
    public function deleteEspecialidad($especialidad) { 
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM especialidad WHERE idespecialidad=" . $especialidad->getIdEspecialidad());
    }
}

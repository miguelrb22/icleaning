<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/app/models/Ocupacion.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/app/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class OcupacionController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaOcupaciones() {
        
        $listaOcupaciones = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from ocupacion");

        foreach($result as $row){
        
            $ocupacion = new Ocupacion($row['idocupacion'], $row['idempleado'], $row['fecha_ocupado']);
            array_push($listaOcupaciones, $ocupacion);   
        }
        
        return $listaOcupaciones;
    }
    
    //Tested
    public function getOcupacion($idOcupacion) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from ocupacion WHERE idocupacion=" . $idOcupacion);
        
        foreach($result as $row){
        
            $ocupacion = new Ocupacion($row['idocupacion'], $row['idempleado'], $row['fecha_ocupado']);
        }
        
        return $ocupacion;
    }


    //Tested
    public function insertOcupacion($ocupacion) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO ocupacion (idempleado, fecha_ocupado) VALUES (" .
                          $ocupacion->getFkIdEmpleado() . ", '" . $ocupacion->getFechaOcupado() . "')");
    }
    
    //Tested
    public function updateOcupacion($ocupacion) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE ocupacion SET idempleado=" . $ocupacion->getFkIdEmpleado() . ", fecha_ocupado='" .
                          $ocupacion->getFechaOcupado() . "' WHERE idocupacion=" . $ocupacion->getIdOcupacion());
        
    }
    
    //Tested
    public function deleteOcupacion($ocupacion) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM ocupacion WHERE idocupacion=" . $ocupacion->getIdOcupacion());
    }
}

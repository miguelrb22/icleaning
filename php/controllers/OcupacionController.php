<?php

include_once '../models/Ocupacion.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class OcupacionController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaOcupaciones() {
        
        $listaOcupaciones = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from ocupacion");

        foreach($result as $row){
        
            $ocupacion = new Ocupacion($row['idocupacion'], $row['empleado_idempleado'], $row['fecha_ocupado']);
            $listaOcupaciones->addItem($ocupacion);   
        }
        
        return $listaOcupaciones;
    }
    
    public function getOcupacion($idOcupacion) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from ocupacion WHERE idocupacion=" . $idOcupacion);
        
        $ocupacion = new Ocupacion($result['idocupacion'], $result['empleado_idempleado'], $result['fecha_ocupado']);
        
        return $ocupacion;
    }
    
    public function insertOcupacion($ocupacion) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO ocupacion ('empleado_idempleado', 'fecha_ocupado') VALUES (" . 
                          $ocupacion->getFkIdEmpleado() . ", " . $ocupacion->getFechaOcupado() . ")");
    }
    
    public function updateOcupacion($ocupacion) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE ocupacion SET 'empleado_idempleado'=" . $ocupacion->getFkIdEmpleado() . ", 'fecha_ocupado'=" .
                          $ocupado->getFechaOcupado() . " WHERE 'idocupacion'=" . $ocupacion->getIdOcupacion());
    }
    
    public function deleteOcupacion($ocupacion) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM ocupacion WHERE 'idocupacion'=" . $ocupacion->getIdOcupacion());
    }
}

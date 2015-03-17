<?php

include_once '../models/TipoTesoreria.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class TipoTesoreriaController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaTipoTesorerias() {
        
        $listaTipoTesorerias = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tipo_tesoreria");

        foreach($result as $row){
        
            $tipoTesoreria = new TipoTesoreria($row['idtipo_tesoreria'], $row['tipo_tesoreria']);
            $listaTipoTesorerias->addItem($tipoTesoreria);   
        }
        
        return $listaTipoTesorerias;
    }
    
    public function getTipoTesoreria($idTipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tipo_tesoreria WHERE idtipo_tesoreria=" . $idTipoTesoreria);
        
        $tipoTesoreria = new TipoTesoreria($result['idtipo_tesoreria'], $result['tipo_tesoreria']);
        
        return $tipoTesoreria;
    }
    
    public function insertTipoTesoreria($tipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO tipo_tesoreria ('tipo_tesoreria') VALUES (" . $tipoTesoreria->getTipoTesoreria() . ")");
    }
    
    public function updateTipoTesoreria($tipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE tipo_tesoreria SET 'tipo_tesoreria'=" . $tipoTesoreria->getTipoTesoreria() . " WHERE 'idtipo_tesoreria'=" . $tipoTesoreria->getIdTipoTesoreria());
    }
    
    public function deleteTipoTesoreria($tipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM tipo_tesoreria WHERE 'idtipo_tesoreria'=" . $tipoTesoreria->getIdTipoTesoreria());
    }
}

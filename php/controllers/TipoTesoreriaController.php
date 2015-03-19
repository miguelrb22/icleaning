<?php

include_once 'php/models/TipoTesoreria.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class TipoTesoreriaController {
    
    //Properties
    
    //Construct
    
    //Methods
    
    //Tested
    public function getListaTipoTesorerias() {
        
        $listaTipoTesorerias = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tipo_tesoreria");

        foreach($result as $row){
        
            $tipoTesoreria = new TipoTesoreria($row['idtipo_tesoreria'], $row['tipo_tesoreria']);
            array_push($listaTipoTesorerias, $tipoTesoreria);
        }
        
        return $listaTipoTesorerias;
    }
    
    //Tested
    public function getTipoTesoreria($idTipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tipo_tesoreria WHERE idtipo_tesoreria=" . $idTipoTesoreria);
        
        foreach($result as $row){
        
            $tipoTesoreria = new TipoTesoreria($row['idtipo_tesoreria'], $row['tipo_tesoreria']);
        }
        
        return $tipoTesoreria;
    }
    
    //Tested
    public function insertTipoTesoreria($tipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO tipo_tesoreria (tipo_tesoreria) VALUES ('" . $tipoTesoreria->getTipoTesoreria() . "')");
    }
    
    //Tested
    public function updateTipoTesoreria($tipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE tipo_tesoreria SET tipo_tesoreria='" . $tipoTesoreria->getTipoTesoreria() . "' WHERE idtipo_tesoreria=" . $tipoTesoreria->getIdTipoTesoreria());
    }
    
    //Tested
    public function deleteTipoTesoreria($tipoTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM tipo_tesoreria WHERE idtipo_tesoreria=" . $tipoTesoreria->getIdTipoTesoreria());
    }
}

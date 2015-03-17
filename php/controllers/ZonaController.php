<?php

include_once '../models/Zona.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class ZonaController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaZonas() {
        
        $listaZonas = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from zona");

        foreach($result as $row){
        
            $zona = new Zona($row['idzona'], $row['provincia_idprovincia'], $row['nombre']);
            $listaZonas->addItem($zona);   
        }
        
        return $listaZonas;
    }
    
    public function getZona($idZona) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from zona WHERE idzona=" . $idZona);
        
        $zona = new Zona($result['idzona'], $result['provincia_idprovincia'], $result['nombre']);
        
        return $zona;
    }
    
    public function insertZona($zona) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO zona ('provincia_idprovincia', 'nombre') VALUES (" . $zona->getFkIdProvincia() . "," . $zona->getNombre() . ")");
    }
    
    public function updateZona($zona) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE zona SET 'provincia_idprovincia'=" . $zona->getFkIdProvincia() . ", 'nombre'=" . $zona->getNombre() . "WHERE 'idzona'=" . $zona->getIdZona());
    }
    
    public function deleteZona($zona) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM 'zona' WHERE 'idzona'=" . $zona->getIdZona());
    }
}

<?php

include_once 'php/models/Zona.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class ZonaController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaZonas() {
        
        $listaZonas = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from zona");

        foreach($result as $row){
        
            $zona = new Zona($row['idzona'], $row['provincia_idprovincia'], $row['nombre']);
            array_push($listaZonas, $zona);
        }
        
        return $listaZonas;
    }
    
    //Tested
    public function getZona($idZona) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from zona WHERE idzona=" . $idZona);
        
        foreach($result as $row){
        
            $zona = new Zona($row['idzona'], $row['provincia_idprovincia'], $row['nombre']);
        }
        
        return $zona;
    }
    
    public function insertZona($zona) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO zona (provincia_idprovincia, nombre) VALUES (" . $zona->getFkIdProvincia() . ",'" . $zona->getNombre() . "')");
    }
    
    //Tested
    public function updateZona($zona) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE zona SET provincia_idprovincia=" . $zona->getFkIdProvincia() . ", nombre='" . $zona->getNombre() . "' WHERE idzona=" . $zona->getIdZona());
    }
    
    //Tested
    public function deleteZona($zona) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM zona WHERE idzona=" . $zona->getIdZona());
    }
}

<?php

include_once '../models/Provincia.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class ProvinciaController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaProvincias() {
        
        $listaProvincias = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from provincia");

        foreach($result as $row){
        
            $provincia = new Provincia($row['idprovincia'], $row['nombre_provincia']);
            $listaProvincias->addItem($provincia);   
        }
        
        return $listaProvincias;
    }
    
    public function getProvincia($idProvincia) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from provincia where idprovincia =" . $idProvincia);
            
        $provincia = new Provincia($result['idprovincia'], $result['nombre_provincia']);
        
        return $provincia;
    }
    
    public function insertProvincia($provincia) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO provincia ('nombre_provincia') VALUES (" . $provincia->getNombreProvincia() . ")");
    }
    
    public function updateProvincia($provincia) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE provincia SET 'nombre_provincia'=" . $provincia->getNombreProvincia() . "WHERE 'idprovincia'=" . $provincia->getIdProvincia());
    }
    
    public function deleteProvincia($provincia) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM provincia WHERE 'idprovincia'=" . $provincia->getIdProvincia());
    }
}


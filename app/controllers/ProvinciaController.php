<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

include_once  $path.'/icleaning/app/models/Provincia.php';
include_once  $path.'/icleaning/app/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class ProvinciaController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaProvincias() {
        
        $listaProvincias = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from provincia");

        foreach($result as $row){
        
            $provincia = new Provincia($row['idprovincia'], $row['nombre_provincia']);
            array_push($listaProvincias, $provincia); 
        }
        
        return $listaProvincias;
    }
    
    //Tested
    public function getProvincia($idProvincia) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from provincia where idprovincia=" . $idProvincia);
            
        foreach($result as $row){
        
            $provincia = new Provincia($row['idprovincia'], $row['nombre_provincia']);
        }
        
        return $provincia;
    }
    
    //Tested
    public function insertProvincia($provincia) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO provincia (nombre_provincia) VALUES ('" . $provincia->getNombreProvincia() . "')");
    }
    
    //Tested
    public function updateProvincia($provincia) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE provincia SET nombre_provincia='" . $provincia->getNombreProvincia() . "' WHERE idprovincia=" . $provincia->getIdProvincia());
    }
    
    //Tested
    public function deleteProvincia($provincia) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM provincia WHERE idprovincia=" . $provincia->getIdProvincia());
    }
}


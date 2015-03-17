<?php

include_once '../models/Nomina.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class NominaController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaNominas() {
        
        $listaNominas = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from nomina");

        foreach($result as $row){
        
            $nomina = new Nomina($row['idnomina'], $row['empleado_idempleado'], $row['fecha_mes'], $row['nomina_total'], $row['pagada']);
            $listaNominas->addItem($nomina);   
        }
        
        return $listaNominas;
    }
    
    public function getNomina($idNomina) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from nomina WHERE idnomina=" . $idNomina);
        
        $nomina = new Nomina($result['idnomina'], $result['empleado_idempleado'], $result['fecha_mes'], $result['nomina_total'], $result['pagada']);
        
        return $nomina;
    }
    
    public function insertNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO nomina ('empleado_idempleado', 'fecha_mes', 'nomina_total', 'pagada') VALUES (" .
                          $nomina->getFkIdEmpleado() . ", " . $nomina->getFechaMes() . ", " . $nomina->getNominaTotal() . ", " . $nomina->getPagada() . ")");
    }
    
    public function updateNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE nomina SET 'empleado_idempleado'=" . $nomina->getFkIdEmpleado() . ", 'fecha_mes'=" . $nomina->getFechaMes() . 
                          ", 'nomina_total'=" . $nomina->getPagada() . " WHERE 'idnomina'=" . $nomina->getIdNomina());
    }
    
    public function deleteNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM nomina WHERE 'idnomina'=" . $nomina->getIdNomina());
    }
}

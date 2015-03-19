<?php

include_once 'php/models/Nomina.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class NominaController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaNominas() {
        
        $listaNominas = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from nomina");

        foreach($result as $row){
        
            $nomina = new Nomina($row['idnomina'], $row['empleado_idempleado'], $row['fecha_mes'], $row['nomina_total'], $row['pagada']);
            array_push($listaNominas, $nomina);   
        }
        
        return $listaNominas;
    }
    
    //Tested
    public function getNomina($idNomina) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from nomina WHERE idnomina=" . $idNomina);
        
        foreach($result as $row){
        
            $nomina = new Nomina($row['idnomina'], $row['empleado_idempleado'], $row['fecha_mes'], $row['nomina_total'], $row['pagada']);  
        }
        
        return $nomina;
    }
    
    public function insertNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO nomina (empleado_idempleado, fecha_mes, nomina_total, pagada) VALUES (" .
                          $nomina->getFkIdEmpleado() . ", '" . $nomina->getFechaMes() . "', " . $nomina->getNominaTotal() . ", '" . $nomina->getPagada() . "')");        
    }
    
    //Tested
    public function updateNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE nomina SET empleado_idempleado=" . $nomina->getFkIdEmpleado() . ", fecha_mes='" . $nomina->getFechaMes() . "', nomina_total=" . $nomina->getNominaTotal() .
                          ", pagada='" . $nomina->getPagada() . "' WHERE idnomina=" . $nomina->getIdNomina());
    }
    
    //Tested
    public function deleteNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM nomina WHERE idnomina=" . $nomina->getIdNomina());
    }
}

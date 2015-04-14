<?php

include_once $_SERVER['DOCUMENT_ROOT'].'/app/models/Nomina.php';
include_once $_SERVER['DOCUMENT_ROOT'].'/app/database/DBAccess.php';

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
        
            $nomina = new Nomina($row['idnomina'], $row['idempleado'], $row['fecha_mes'], $row['nomina_total'], $row['pagada']);
            array_push($listaNominas, $nomina);   
        }
        
        return $listaNominas;
    }
    
    //Tested
    public function getNomina($idNomina) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from nomina WHERE idnomina=" . $idNomina);
        
        foreach($result as $row){
        
            $nomina = new Nomina($row['idnomina'], $row['idempleado'], $row['fecha_mes'], $row['nomina_total'], $row['pagada']);
        }
        
        return $nomina;
    }


    //Tested
    public function insertNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO nomina (idempleado, fecha_mes, nomina_total, pagada) VALUES (" .
                          $nomina->getFkIdEmpleado() . ", '" . $nomina->getFechaMes() . "', " . $nomina->getNominaTotal() . ", '" . $nomina->getPagada() . "')");        
    }
    
    //Tested
    public function updateNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE nomina SET idempleado=" . $nomina->getFkIdEmpleado() . ", fecha_mes='" . $nomina->getFechaMes() . "', nomina_total=" . $nomina->getNominaTotal() .
                          ", pagada='" . $nomina->getPagada() . "' WHERE idnomina=" . $nomina->getIdNomina());
    }
    
    //Tested
    public function deleteNomina($nomina) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM nomina WHERE idnomina=" . $nomina->getIdNomina());
    }
    
    //Tested
    public function getTotalCostesNominas() {
        
        $dbAccess = new DBAccess();
        $countGastosNominas = $dbAccess->getSelect("SELECT sum(nomina_total) 'Total' FROM nomina");
        
        foreach ($countGastosNominas as $countGastosNomina) {
            $totalGastosNominas = $countGastosNomina['Total'];
        }
        
        return $totalGastosNominas;
    }
}
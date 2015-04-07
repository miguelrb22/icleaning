<?php

include_once 'php/models/Factura.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class FacturaController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaFacturas() {
        
        $listaFacturas = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from factura");

        foreach($result as $row){
        
            $factura = new Factura($row['idfactura'], $row['mes'], $row['total_importe'], $row['pagada']);
            array_push($listaFacturas, $factura);
        }
        
        return $listaFacturas;
    }
    
    //Tested
    public function getFactura($idFactura) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from factura WHERE idfactura=" . $idFactura);
        
        foreach($result as $row){
        
            $factura = new Factura($row['idfactura'], $row['mes'], $row['total_importe'], $row['pagada']);
        }
        
        return $factura;
    }
    
    //Tested
    public function insertFactura($factura) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO factura (mes, total_importe, pagada) VALUES ('" .
                          $factura->getMes() . "', " . $factura->getTotalImporte() . ", '" . $factura->getPagada() . "')");
    }
    
    //Tested
    public function updateFactura($factura) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE factura SET mes='" . $factura->getMes() . "', total_importe=" . $factura->getTotalImporte() . 
                          ", pagada='" . $factura->getPagada() . "' WHERE idfactura=" . $factura->getIdFactura());
    }
    
    //Tested
    public function deleteFactura($factura) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM factura WHERE idfactura=" . $factura->getIdFactura());
    }
}

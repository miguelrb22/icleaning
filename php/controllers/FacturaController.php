<?php

include_once '../models/Factura.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class FacturaController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaFacturas() {
        
        $listaFacturas = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from factura");

        foreach($result as $row){
        
            $factura = new Factura($row['idfactura'], $row['mes'], $row['total_importe'], $row['pagada']);
            $listaFacturas->addItem($factura);   
        }
        
        return $listaFacturas;
    }
    
    public function getFactura($idFactura) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from factura WHERE idfactura=" . $idFactura);
        
        $factura = new Factura($result['idfactura'], $row['mes'], $row['total_importe'], $row['pagada']);
        
        return $factura;
    }
    
    public function insertFactura($factura) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO factura ('mes', 'total_importe', 'pagada') VALUES (" .
                          $factura->getMes() . ", " . $factura->getTotalImporte() . ", " . $factura->getPagada() . ")");
    }
    
    public function updateFactura($factura) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE factura SET 'mew'=" . $factura->getMes() . ", 'total_importe'=" . $factura->getTotalImporte() . 
                          ", 'pagada'=" . $factura->getPagada() . " WHERE 'idfactura'=" . $factura->getIdFactura());
    }
    
    public function deleteFactura($factura) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM factura WHERE 'idfactura'=" . $factura->getIdFactura());
    }
}

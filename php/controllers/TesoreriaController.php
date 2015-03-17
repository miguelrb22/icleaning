<?php

include_once '../models/Tesoreria.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class TesoreriaController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaTesoreria() {
        
        $listaTesoreria = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tesoreria");

        foreach($result as $row){
        
            $tesoreria = new Tesoreria($row['idtesoreria'], $row['tipo_tesoreria_idtipo_tesoreria'], $row['factura_idfactura'], $row['compra_idcompra'], 
                                       $row['nomina_idnomina'], $row['fecha_importe'], $row['ingresado'], $row['importe']);
            $listaTesoreria->addItem($tesoreria);   
        }
        
        return $listaTesoreria;
    }
    
    public function getTesoreria($idTesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->getSelect("SELECT * from tesoreria WHERE idtesoreria=" . $idTesoreria);
        
        $tesoreria = new Tesoreria($result['idtesoreria'], $result['tipo_tesoreria_idtipo_tesoreria'], $result['factura_idfactura'], $result['compra_idcompra'],
                                   $result['nomina_idnomina'], $result['fecha_importe'], $result['ingresado'], $result['importe']);
        
        return $tesoreria;
    }
    
    public function insertTesoreria($tesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO tesoreria ('tipo_tesoreria_idtipo_tesoreria, 'factura_idfactura', 'compra_idcompra', 'nomina_idnomina', 'fecha_importe', 'ingresado', 'importe') VALUES (" . 
                          $tesoreria->getfkIdTipoTesoreria() . ", " . $tesoreria->getfkIdFactura() . ", " . $tesoreria->getFkIdCompra() . ", " . $tesoreria->getFkIdNomina() .
                          ", " . $tesoreria->getFechaImporte() . ", " . $tesoreria->getIngresado() . ", " . $tesoreria->getImporte() . ")");
    }
    
    public function updateTesoreria($tesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE tesoreria SET 'tipo_tesoreria_idtipo_tesoreria'=" . $tesoreria->getfkIdTipoTesoreria() . ", 'factura_idfactura'=" . $tesoreria->getfkIdFactura() .
                          ", 'compra_idcompra=" . $tesoreria->getFkIdCompra() . ", 'nomina_idnomina'=" . $tesoreria->getFkIdNomina() . ", 'fecha_importe'=" . $tesoreria->getFechaImporte() . 
                          ", 'ingresado'=" . $tesoreria->getIngresado() . ", 'importe'=" . $tesoreria->getImporte() . " WHERE 'idtesoreria'=" . $tesoreria->getIdTesoreria());
    }
    
    public function deleteTesoreria($tesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM tesoreria WHERE 'idtesoreria'=" . $tesoreria->getIdTesoreria());
    }
}

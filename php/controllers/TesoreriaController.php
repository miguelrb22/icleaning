<?php

include_once 'php/models/Tesoreria.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class TesoreriaController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaTesoreria() {
        
        $listaTesoreria = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tesoreria");

        foreach($result as $row){
        
            $tesoreria = new Tesoreria($row['idtesoreria'], $row['idtipo_tesoreria'], $row['idfactura'], $row['idcompra'],
                                       $row['idnomina'], $row['fecha_importe'], $row['ingresado'], $row['importe']);
            array_push($listaTesoreria, $tesoreria);
        }
        
        return $listaTesoreria;
    }
    
    //Tested
    public function getTesoreria($idTesoreria) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from tesoreria WHERE idtesoreria=" . $idTesoreria);
        
        foreach($result as $row){
        
            $tesoreria = new Tesoreria($row['idtesoreria'], $row['idtipo_tesoreria'], $row['idfactura'], $row['idcompra'],
                                       $row['idnomina'], $row['fecha_importe'], $row['ingresado'], $row['importe']);
        }
        
        return $tesoreria;
    }

    //testes
    public function insertTesoreria($tesoreria) {

        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO tesoreria (idtipo_tesoreria,idfactura, idcompra, idnomina, fecha_importe, ingresado, importe) VALUES (" .
                          $tesoreria->getfkIdTipoTesoreria() . ", " . $tesoreria->getfkIdFactura() . ", " . $tesoreria->getFkIdCompra() . ", " . $tesoreria->getFkIdNomina() .
                          ", '" . $tesoreria->getFechaImporte() . "', " . $tesoreria->getIngresado() . ", " . $tesoreria->getImporte() . ")");
    }
    
    public function updateTesoreria($tesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE tesoreria SET idtipo_tesoreria=" . $tesoreria->getfkIdTipoTesoreria() . ", idfactura=" . $tesoreria->getfkIdFactura() .
                          ", idcompra=" . $tesoreria->getFkIdCompra() . ", idnomina=" . $tesoreria->getFkIdNomina() . ", fecha_importe='" . $tesoreria->getFechaImporte() .
                          "', ingresado=" . $tesoreria->getIngresado() . ", importe=" . $tesoreria->getImporte() . " WHERE idtesoreria=" . $tesoreria->getIdTesoreria());
    }
    
    //Tested
    public function deleteTesoreria($tesoreria) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM tesoreria WHERE idtesoreria=" . $tesoreria->getIdTesoreria());
    }
}

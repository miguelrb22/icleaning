<?php

include_once '../models/Compra.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class CompraController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaCompras() {
        
        $listaCompras = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from compra");

        foreach($result as $row){
        
            $compra = new Compra($row['idcompra'], $row['especialidad_idespecialidad'], $row['fecha_compra'], $row['precio_compra'], $row['descripcion']);
            $listaCompras->addItem($compra);   
        }
        
        return $listaCompras;
    }
    
    public function getCompra($idCompra) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from compra WHERE idcompra=" . $idCompra);
        
        $compra = new Compra($result['idcompra'], $result['especialidad_idespecialidad'], $result['fecha_compra'], $result['precio_compra'], $result['descripcion']);
    }
    
    public function insertCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO compra ('especialidad_idespecialidad', 'fecha_compra', 'precio_compra', 'descripcion') VALUES (" . 
                          $compra->getFkIdEspecialidad() . ", " . $compra->getFechaCompra() . ", " . $compra->getPrecioCompra() . ", " . $compra->getDescripcion() . ")");
    }
    
    public function updateCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE compra SET 'especialidad_idespecialidad'=" . $compra->getFkIdEspecialidad() . ", 'fecha_compra'=" . $compra->getPrecioCompra() . 
                          ", 'descripcion'=" . $compra->getDescripcion() . "WHERE 'idcompra'=" . $compra->idCompra());
    }
    
    public function deleteCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM compra WHERE 'idcompra=" . $compra->getIdCompra());
    }
}

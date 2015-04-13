<?php

include_once '../../app/models/Compra.php';
include_once '../../app/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class CompraController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaCompras() {
        
        $listaCompras = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from compra");

        foreach($result as $row){
        
            $compra = new Compra($row['idcompra'], $row['especialidad_idespecialidad'], $row['fecha_compra'], $row['precio_compra'], $row['descripcion']);
            array_push($listaCompras, $compra);
        }
        
        return $listaCompras;
    }
    
    //Tested
    public function getCompra($idCompra) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from compra WHERE idcompra=" . $idCompra);
        
        foreach($result as $row){
        
            $compra = new Compra($row['idespecialidad'], $row['fecha_compra'], $row['precio_compra'], $row['descripcion']);
        }
        
        return $compra;
    }

    //tested
    public function insertCompra($compra) {
        $dbAccess = new DBAccess();

        $dbAccess->insert("INSERT INTO compra (idespecialidad, fecha_compra, precio_compra, descripcion) VALUES (" .
               $compra->getFkIdEspecialidad() . ", '" . $compra->getFechaCompra() . "', " . $compra->getPrecioCompra() . ", '" . $compra->getDescripcion() . "')");
    }


    //Tested
    public function updateCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE compra SET idespecialidad=" . $compra->getFkIdEspecialidad() . ", fecha_compra='" . $compra->getFechaCompra() . "', precio_compra='" . $compra->getPrecioCompra() . "', descripcion='" . $compra->getDescripcion() . "' WHERE idcompra=" . $compra->getIdCompra());
    }
    
    //Tested
    public function deleteCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM compra WHERE idcompra=" . $compra->getIdCompra());
    }
}

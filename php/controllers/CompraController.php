<?php

include_once 'php/models/Compra.php';
include_once 'php/database/DBAccess.php';

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
        
            $compra = new Compra($row['idcompra'], $row['especialidad_idespecialidad'], $row['fecha_compra'], $row['precio_compra'], $row['descripcion']);
        }
        
        return $compra;
    }
    
    public function insertCompra($compra) {
        $dbAccess = new DBAccess();
        //$dbAccess->insert("INSERT INTO compra (especialidad_idespecialidad, fecha_compra, precio_compra, descripcion) VALUES (" . 
          //                $compra->getFkIdEspecialidad() . ", '" . $compra->getFechaCompra() . "', " . $compra->getPrecioCompra() . ", '" . $compra->getDescripcion() . "')");
    
        $dbAccess->insert("INSERT INTO compra (especialidad_idespecialidad, fecha_compra, precio_compra, descripcion) VALUES (1,'2015-03-03', '150', 'prueba')");
                          
        //INSERT INTO `gi_telelimpieza`.`compra` (`especialidad_idespecialidad`, `fecha_compra`, `precio_compra`, `descripcion`) VALUES ('1', '2015-03-02', '150', 'Pur');
    }
    
    public function updateCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE compra SET especialidad_idespecialidad=" . $compra->getFkIdEspecialidad() . ", fecha_compra='" . $compra->getPrecioCompra() . 
                          "', descripcion='" . $compra->getDescripcion() . "' WHERE idcompra=" . $compra->getIdCompra());
    }
    
    //Tested
    public function deleteCompra($compra) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM compra WHERE idcompra=" . $compra->getIdCompra());
    }
}

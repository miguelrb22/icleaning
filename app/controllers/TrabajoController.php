<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

include_once  $path.'/icleaning/app/models/Trabajo.php';
include_once  $path.'/icleaning/app/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class TrabajoController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaTrabajos() {
        
        $listaTrabajos = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from trabajo");

        foreach($result as $row){
        
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], utf8_encode($row['direccion_lugar']), $row['estimacion_horas'], $row['gasto_total'],
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']);
            array_push($listaTrabajos, $trabajo);  
        }
        
        return $listaTrabajos;
    }
    
    //Tested
    public function getListaTrabajosIniciadosPorEmpleado($idEmpleado) {
        
        $listaTrabajos = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from trabajo WHERE idempleado=" . $idEmpleado . " and finalizado=0");

        foreach($result as $row){
        
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], utf8_encode($row['direccion_lugar']), $row['estimacion_horas'], $row['gasto_total'],
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']);
            array_push($listaTrabajos, $trabajo);  
        }
        
        return $listaTrabajos;
    }
    
    //Tested
    public function getListaTrabajosFinalizadosPorEmpleado($idEmpleado) {
        
        $listaTrabajos = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from trabajo WHERE idempleado=" . $idEmpleado . " and finalizado=1");

        foreach($result as $row){
        
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], utf8_encode($row['direccion_lugar']), $row['estimacion_horas'], $row['gasto_total'],
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']);
            array_push($listaTrabajos, $trabajo);  
        }
        
        return $listaTrabajos;
    }
    
    //Tested
    public function getListaTrabajosPorCliente($idCliente) {
        
        $listaTrabajos = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from trabajo WHERE idcliente=" . $idCliente);

        foreach($result as $row){
        
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], utf8_encode($row['direccion_lugar']), $row['estimacion_horas'], $row['gasto_total'],
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']);
            array_push($listaTrabajos, $trabajo);  
        }
        
        return $listaTrabajos;
    }
    
    //Tested
    public function getTrabajo($idTrabajo) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from trabajo WHERE idtrabajo=" . $idTrabajo);
        
        foreach($result as $row){
        
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], utf8_encode($row['direccion_lugar']), $row['estimacion_horas'], $row['gasto_total'],
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']); 
        }
        
        return $trabajo;
    }


    //tested
    public function insertTrabajo($trabajo) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO trabajo (idcliente, idempleado, valoracion, idfactura, importe_total, finalizado, "
                          . "direccion_lugar, estimacion_horas, gasto_total, importe_recibido, fecha_inicio, fecha_fin) VALUES (" .
                          $trabajo->getFkIdCliente() . ", " . $trabajo->getFkIdEmpleado() . ", " . $trabajo->getValoracion() . ", " . $trabajo->getFkIdFactura() .
                          ", " . $trabajo->getImporteTotal() . ", " . $trabajo->getFinalizado() . ", '" . $trabajo->getDireccionLugar() . "', " .
                          $trabajo->getEstimacionHoras() . ", " . $trabajo->getGastoTotal() . ", " . $trabajo->getImporteRecibido() . ", '" . 
                          $trabajo->getFechaInicio() . "', '" . $trabajo->getFechaFin() . "')");
    }
    
    //Tested
    public function updateTrabajo($trabajo) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE trabajo SET idcliente=" . $trabajo->getFkIdCliente() . ", idempleado=" . $trabajo->getFkIdEmpleado() .
                          ", valoracion=" . $trabajo->getValoracion() . ", idfactura=" . $trabajo->getFkIdFactura() . ", importe_total=" . $trabajo->getImporteTotal() .
                          ", finalizado=" . $trabajo->getFinalizado() . ", direccion_lugar='" . $trabajo->getDireccionLugar() . "', estimacion_horas=" . $trabajo->getEstimacionHoras() . 
                          ", gasto_total=" . $trabajo->getImporteRecibido() . ", fecha_inicio='" . $trabajo->getFechaInicio() . "', fecha_fin='" . $trabajo->getFechaFin() . 
                          "' WHERE idtrabajo=" . $trabajo->getIdTrabajo());
    }
    
    //Tested
    public function deleteTrabajo($trabajo) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM trabajo WHERE idtrabajo=" . $trabajo->getIdTrabajo());
    }
    
    //
    public function deleteTrabajoPorId($idTrabajo) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM trabajo WHERE idtrabajo=" . $idTrabajo);
    }
    
    //Tested
    public function getTotalTrabajos() {
        
        $dbAccess = new DBAccess();
        $countTrabajos = $dbAccess->getSelect("SELECT count(*) 'Total' FROM trabajo");
        
        foreach ($countTrabajos as $countTrabajo) {
            $totalTrabajos = $countTrabajo['Total'];
        }
        
        return $totalTrabajos;
    }
    
    //Tested
    public function getTrabajosIniciadosEsteMes() {
        
        $listaTrabajos = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * FROM trabajo " .
                                       "WHERE DATE_FORMAT(current_date(), '%Y') = DATE_FORMAT(fecha_inicio, '%Y') " .
                                       "AND DATE_FORMAT(current_date(), '%m') = DATE_FORMAT(fecha_inicio, '%m');");
        
        foreach($result as $row){
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], $row['direccion_lugar'], $row['estimacion_horas'], $row['gasto_total'], 
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']);
            
            array_push($listaTrabajos, $trabajo); 
        }
        
        return $listaTrabajos;
    }
    
    //Tested
    public function getTrabajosFinalizadosEsteMes() {
        
        $listaTrabajos = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * FROM trabajo " .
                                       "WHERE DATE_FORMAT(current_date(), '%Y') = DATE_FORMAT(fecha_fin, '%Y') " .
                                       "AND DATE_FORMAT(current_date(), '%m') = DATE_FORMAT(fecha_fin, '%m');");
        
        foreach($result as $row){
            $trabajo = new Trabajo($row['idtrabajo'], $row['idcliente'], $row['idempleado'], $row['valoracion'], $row['idfactura'],
                                   $row['importe_total'], $row['finalizado'], $row['direccion_lugar'], $row['estimacion_horas'], $row['gasto_total'], 
                                   $row['importe_recibido'], $row['fecha_inicio'], $row['fecha_fin']);
            
            array_push($listaTrabajos, $trabajo); 
        }
        
        return $listaTrabajos;
    }
}

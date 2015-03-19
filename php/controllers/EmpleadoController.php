<?php

include_once 'php/models/Trabajador.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class EmpleadoController {
    
    //Properties
    
    //Construct
    
    //Models
    //Tested
    public function getListaEmpleados() {
        
        $listaEmpleados = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from empleado");

        foreach($result as $row){
        
            $empleado = new Trabajador($row['idempleado'], $row['especialidad_idespecialidad'], $row['zona_idzona'], $row['nif'],
                                       $row['apellidos'], $row['nombre'], $row['telefomo'], $row['email'], $row['numero_cuenta'],
                                       $row['sip'], $row['anyos_experiencia'], $row['fechaUltimoTrabajo'], $row['horasTrabajadas'],
                                       $row['contrasenya'], $row['foto_empleado'], $row['descripcion'], $row['valoracion']);
            
            array_push($listaEmpleados, $empleado);
        }
        
        return $listaEmpleados;
    }
    
    //Tested
    public function getEmpleado($idEmpleado) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from empleado WHERE idempleado=" . $idEmpleado);
        
        foreach($result as $row){
        
            $empleado = new Trabajador($row['idempleado'], $row['especialidad_idespecialidad'], $row['zona_idzona'], $row['nif'],
                                       $row['apellidos'], $row['nombre'], $row['telefomo'], $row['email'], $row['numero_cuenta'],
                                       $row['sip'], $row['anyos_experiencia'], $row['fechaUltimoTrabajo'], $row['horasTrabajadas'],
                                       $row['contrasenya'], $row['foto_empleado'], $row['descripcion'], $row['valoracion']);
        }
        
        return $empleado;
    }
    
    public function insertEmpleado($empleado) {

        $dbAccess = new DBAccess();
        /*$dbAccess->insert("INSERT INTO empleado (especialidad_idespecialidad, zona_idzona, nif, apellidos, nombre, telefono, email, numero_cuenta, sip, anyos_experiencia, fechaUltimoTrabajo, horasTrabajadas, contrasenya, foto_empleado, valoracion) VALUES (" 
                                    . $empleado->getFkIdEspecialidad() . ", " . $empleado->getFkIdZona() . ", '" . $empleado->getNif() . "', '" . $empleado->getApellidos() . "', '" . 
                                    $empleado->getNombre() . "', " . $empleado->getTelefono() . ", '" . $empleado->getEmail() . "', " . $empleado->getNumeroCuenta() . ", " . $empleado->getSip() . ", " .
                                    $empleado->getAnyosExperiencia() . ", '" . $empleado->getFechaUltimoTrabajo() . "', " . $empleado->getHorasTrabajadas() . ", '" . $empleado->getContrasenya() . "', '" . 
                                    $empleado->getDescripcion() . "', " . $empleado->getValoracion() . ")");*/
        
        $dbAccess->insert("INSERT INTO empleado (especialidad_idespecialidad, zona_idzona, nif, apellidos, nombre, telefono, email, numero_cuenta, sip, anyos_experiencia, fechaUltimoTrabajo, horasTrabajadas, contrasenya, foto_empleado, descripcion, valoracion) VALUES (10, 50, '124', 'asfd', 'asdf', 123421, 'qwerq', 23, 2, 23, '2015-03-03', 3, 'adfasasd', 'qwer', '1qwerq', 3);");
   
    }
    
    public function updateEmpleado($empleado) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE empleado SET especialidad_idespecialidad=" . $empleado->getFkIdEspecialidad() . ", zona_idzona=" . $empleado->getFkIdZona() . 
                                    ", nif='" . $empleado->getNif() . "', apellidos='" . $empleado->getApellidos() . "', nombre='" . $empleado->getNombre() . "', telefomo=" . 
                                    $empleado->getTelefono() . ", email='" . $empleado->getEmail() . "', numero_cuenta=" . $empleado->getNumeroCuenta() . ", sip=" . 
                                    $empleado->getAnyosExperiencia() . ", fechaUltimoTrabajo='" . $empleado->getFechaUltimoTrabajo() . "', horasTrabajadas=" . $empleado->getHorasTrabajadas() .
                                    ", contrasenya='" . $empleado->getContrasenya() . "', foto_empleado='" . $empleado->getFotoEmpleado() . "', descripcion='" . $empleado->getDescripcion() .
                                    "', valoracion=" . $empleado->getValoracion() . " WHERE idempleado=" . $empleado->getIdEmpleado());
    }
    
    //Tested
    public function deleteEmpleado($empleado) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM empleado WHERE idempleado=" . $empleado->getIdEmpleado());
    }
}

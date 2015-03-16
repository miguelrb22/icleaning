<?php

include_once '../models/Empleado.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package models
 */
class EmpleadoController {
    
    //Properties
    
    //Construct
    
    //Models
    public function getListaEmpleados() {
        
        $listaEmpleados = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from empleado");

        foreach($result as $row){
        
            $empleado = new Trabajador($row['idempleado'], $row['especialidad_idespecialidad'], $row['zona_idzona'], $row['nif'],
                                       $row['apellidos'], $row['nombre'], $row['telefomo'], $row['email'], $row['numero_cuenta'],
                                       $row['sip'], $row['anyos_experiencia'], $row['fechaUltimoTrabajo'], $row['horasTrabajadas'],
                                       $row['contrasenya'], $row['foto_empleado'], $row['descripcion'], $row['valoracion']);
            $listaEmpleados->addItem($empleado);   
        }
        
        return $listaEmpleados;
    }
    
    public function getEmpleado($idEmpleado) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from empleado WHERE idempleado=" . $idEmpleado);
        
        $empleado = new Trabajador($result['idempleado'], $result['especialidad_idespecialidad'], $result['zona_idzona'], $result['nif'],
                                   $result['apellidos'], $result['nombre'], $result['telefomo'], $result['email'], $result['numero_cuenta'],
                                   $result['sip'], $result['anyos_experiencia'], $result['fechaUltimoTrabajo'], $result['horasTrabajadas'],
                                   $result['contrasenya'], $result['foto_empleado'], $result['descripcion'], $result['valoracion']);
        
        return $empleado;
    }
    
    public function insertEmpleado($empleado) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO empleado ('especialidad_idespecialidad', 'zona_idzona', 'nif', 'apellidos', 'nombre', 'telefono', 'email', 'numero_cuenta', 'sip', 'anyos_experiencia', 'fechaUltimoTrabajo', 'horasTrabajadas', 'contrasenya', 'foto_empleado', 'valoracion')"
                . "                 VALUES (" . $empleado->getFkIdEspecialidad() . ", " . $empleado->getFkIdZona() . ", " . $empleado->getNif() . ", " . $empleado->getApellidos() . ", " . 
                                    $empleado->getNombre() . ", " . $empleado->getTelefono() . ", " . $empleado->getEmail() . ", " . $empleado->getNumeroCuenta() . ", " . $empleado->getSip() . ", " .
                                    $empleado->getAnyosExperiencia() . ", " . $empleado->getFechaUltimoTrabajo() . ", " . $empleado->getHorasTrabajadas() . ", " . $empleado->getContrasenya() . ", " . 
                                    $empleado->getDescripcion() . ", " . $empleado->getValoracion() . ")");
    }
    
    public function updateEmpleado($empleado) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE empleado SET 'especialidad_idespecialidad'=" . $empleado->getFkIdEspecialidad() . ", 'zona_idzona'=" . $empleado->getFkIdZona() . 
                                    ", 'nif'=" . $empleado->getNif() . ", 'apellidos'=" . $empleado->getApellidos() . ", 'nombre'=" . $empleado->getNombre() . ", 'telefomo'=" . 
                                    $empleado->getTelefono() . ", 'email'=" . $empleado->getEmail() . ", 'numero_cuenta'=" . $empleado->getNumeroCuenta() . ", 'sip'=" . 
                                    $empleado->getAnyosExperiencia() . ", 'fechaUltimoTrabajo'=" . $empleado->getFechaUltimoTrabajo() . ", 'horasTrabajadas'=" . $empleado->getHorasTrabajadas() .
                                    ", 'contrasenya'=" . $empleado->getContrasenya() . ", 'foto_empleado'=" . $empleado->getFotoEmpleado() . ", 'descripcion'=" . $empleado->getDescripcion() .
                                    ", 'valoracion'=" . $empleado->getValoracion() . " WHERE 'idempleado'=" . $empleado->getIdEmpleado());
    }
    
    public function deleteEmpleado($empleado) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM empleado WHERE 'idempleado'=" . $empleado->getIdEmpleado());
    }
}

<?php

include_once '../models/Cliente.php';
include_once '../database/DBAccess.php';
include_once 'ArrayList.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class ClienteController {
    
    //Properties
    
    //Construct
    
    //Methods
    public function getListaClientes() {
        
        $listaClientes = new ArrayList();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from cliente");

        foreach($result as $row){
        
            $cliente = new Cliente($row['idcliente'], $row['dni'], $row['nombre'], $row['direccion'], $row['telefono'],
                                   $row['email'], $row['fecha_registro'], $row['contrasenya'], $row['foto_cliente'], $row['apellidos']);

            $listaClientes->addItem($cliente);   
        }
        
        return $listaProvincias;
    }
    
    public function getCliente($idCliente) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from cliente WHERE idcliente=" . $idCliente);
        
        $cliente = new Cliente($result['idcliente'], $result['dni'], $result['nombre'], $result['direccion'], $result['telefono'],
                               $result['email'], $result['fecha_registro'], $result['contrasenya'], $result['foto_cliente'], $result['apellidos']);
        
        return $cliente;
    }
    
    public function insertCliente($cliente) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO cliente ('dni', 'nombre', 'direccion', 'telefono', 'email', 'fecha_registro', 'contrasenya', 'foto_cliente', 'apellidos' VALUES (" . 
                          $cliente->getDni() . "," . $cliente->getNombre() . "," . $cliente->getDireccion() . "," . $cliente->getTelefono() . "," . $cliente->getEmail() . "," .
                          $cliente->getFechaRegistro() . "," . $cliente->getContrasenya() . "," . $cliente->getFotoCliente() . "," . $cliente->getApellidos());
    }
    
    public function updateCliente($cliente) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE cliente SET 'dni'=" . $cliente->getDni() . ", 'nombre'=" . $cliente->getNombre() . ", 'direccion'=" . $cliente->getDireccion() . 
                          ", 'telefono'=" . $cliente->getTelefono() . ", 'email'=" . $cliente->getEmail() . ", 'fecha_registro'=" . $cliente->getFechaRegistro() . 
                          ", 'contrasenya'=" . $cliente->getContrasenya() . ", 'foto_cliente'=" . $cliente->getFotoCliente() . ", 'apellidos'=" . $cliente->getApellidos());
    }
    
    public function deleteCliente($cliente) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM cliente WHERE 'idcliente'=" . $cliente->getIdCliente());
    }
}

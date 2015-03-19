<?php

include_once 'php/models/Cliente.php';
include_once 'php/database/DBAccess.php';

/**
 * @author Juan Serna Jaen <nyoronsheppard@gmail.com>
 * @package controllers
 */
class ClienteController {
    
    //Properties
    
    //Construct
    
    //Methods
    //Tested
    public function getListaClientes() {
        $listaClientes = array();
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from cliente");

        foreach($result as $row){
            $cliente = new Cliente($row['idcliente'], $row['dni'], $row['nombre'], $row['direccion'], $row['telefono'],
                                   $row['email'], $row['fecha_registro'], $row['contrasenya'], $row['foto_cliente'], $row['apellidos']);

            array_push($listaClientes, $cliente);
        }
        
        return $listaClientes;
    }
    
    //Tested
    public function getCliente($idCliente) {
        
        $dbAccess = new DBAccess();
        $result = $dbAccess->getSelect("SELECT * from cliente WHERE idcliente=" . $idCliente);
        
        foreach ($result as $row) {
            $cliente = new Cliente($row['idcliente'], $row['dni'], $row['nombre'], $row['direccion'], $row['telefono'],
                                   $row['email'], $row['fecha_registro'], $row['contrasenya'], $row['foto_cliente'], $row['apellidos']);
        }
        
        return $cliente;
    }
    
    //Tested
    public function insertCliente($cliente) {
        
        $dbAccess = new DBAccess();
        $dbAccess->insert("INSERT INTO cliente (dni, nombre, direccion, telefono, email, fecha_registro, contrasenya, foto_cliente, apellidos) VALUES ('" . 
                          $cliente->getDni() . "', '" . $cliente->getNombre() . "', '" . $cliente->getDireccion() . "', " . $cliente->getTelefono() . ", '" . $cliente->getEmail() . "', '" .
                          $cliente->getFechaRegistro() . "', '" . $cliente->getContrasenya() . "', '" . $cliente->getFotoCliente() . "', '" . $cliente->getApellidos() . "')");
    }
    
    //Tested
    public function updateCliente($cliente) {
        
        $dbAccess = new DBAccess();
        $dbAccess->update("UPDATE cliente SET dni='" . $cliente->getDni() . "', nombre='" . $cliente->getNombre() . "', direccion='" . $cliente->getDireccion() . 
                          "', telefono=" . $cliente->getTelefono() . ", email='" . $cliente->getEmail() . "', fecha_registro='" . $cliente->getFechaRegistro() . 
                          "', contrasenya='" . $cliente->getContrasenya() . "', foto_cliente='" . $cliente->getFotoCliente() . "', apellidos='" . $cliente->getApellidos() . "' WHERE idcliente=" .
                          $cliente->getIdCliente());
    }
    
    //Tested
    public function deleteCliente($cliente) {
        
        $dbAccess = new DBAccess();
        $dbAccess->delete("DELETE FROM cliente WHERE idcliente=" . $cliente->getIdCliente());
    }
}

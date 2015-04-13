<?php

require_once('../database/DBAccess.php');
require_once('../controllers/ClienteController.php');
require_once('../models/Cliente.php');

$valueDNI = $_POST['val'];

if ($_POST['val']) {
    
    $clienteControllerBuscarDNI = new ClienteController();
    $clientePorDNI = $clienteControllerBuscarDNI->getClienteDNI($valueDNI);
    
    if ($clientePorDNI != null) {
        
            echo $clientePorDNI->getIdCliente() . ", " . $clientePorDNI->getDni() . ", " . $clientePorDNI->getNombre() .
            ", " . $clientePorDNI->getApellidos() . ", " . $clientePorDNI->getDireccion() . ", " . $clientePorDNI->getEmail() .
            ", " . $clientePorDNI->getTelefono() . ", " . $clientePorDNI->getFechaRegistro() . ", " . 
            ", " . $clientePorDNI->getContrasenya();
        
            //header("Location:http://localhost/icleaning/clienteForm.php");
    } 
    else {
        //echo "No existe el cliente con el DNI " . $valueDNI;
    }
}
    
 



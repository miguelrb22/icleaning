<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/ClienteController.php');
require_once( $path.'/icleaning/app/models/Cliente.php');

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
    
 



<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/EmpleadoController.php');
require_once( $path.'/icleaning/app/models/Trabajador.php');

$valueDNI = $_POST['val'];

if ($_POST['val']) {
    
    $trabajadorController = new EmpleadoController();
    $empleado = $trabajadorController->getEmpleadoDNI($valueDNI);
    
    if ($empleado != null) {
        
        echo $empleado->getIdEmpleado() . ", " . $empleado->getNif() . ", " . $empleado->getNombre() . 
                ", " . $empleado->getApellidos() . ", " . $empleado->getContrasenya() . ", " .
                $empleado->getEmail();
    }
    else {
        echo "No existe el empleado con el DNI " . $valueDNI;
    }
}


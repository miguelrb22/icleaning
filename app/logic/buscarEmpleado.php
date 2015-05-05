<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/EmpleadoController.php');
require_once( $path.'/icleaning/app/models/Trabajador.php');

$valueDNI = $_POST['dniemp'];

if ($_POST['dniemp']) {
    
    $trabajadorController = new EmpleadoController();
    $empleado = $trabajadorController->getEmpleadoDNI($valueDNI);
    $iDEmpleado = $empleado->getIdEmpleado();
    
    if ($empleado != null) {
        
        echo "<table class='table table-bordered table-responsive table-hover'>"
                         . "<thead>"
                            . "<tr>"
                               . "<th>ID</th>"
                               . "<th>DNI</th>"
                               . "<th>Nombre</th>"
                               . "<th>Apellidos</th>"
                               . "<th>Email</th>"
                               . "<th>Numero Cuenta</th>"
                               . "<th>SIP</th>"
                               . "<th>Opciones</th>"
                            . "</tr>"
                         . "</thead>"
                         . "<tbody>";
        
        echo "<tr>";
                             echo "<td>" . $empleado->getIdEmpleado() . "</td>";
                             echo "<td>" . $empleado->getNif() . "</td>";
                             echo "<td>" . $empleado->getNombre() . "</td>";
                             echo "<td>" . $empleado->getApellidos() . "</td>";
                             echo "<td>" . $empleado->getEmail() . "</td>";
                             echo "<td>" . $empleado->getNumeroCuenta() . "</td>";
                             echo "<td>" . $empleado->getSip() . "</td>";
                             echo "<td>   <button class='btn btn-info btn-xs'>Edit</button> ". ""
                                     . "<button onclick='deleteEmpleado($iDEmpleado)' class='btn btn-info btn-xs'>Borrar</button> </td>";
                        echo "</tr>";
                        
                        echo "</tbody>"
                              . "</table>";
    }
    else {
        echo "No existe el empleado con el DNI " . $valueDNI;
    }
}


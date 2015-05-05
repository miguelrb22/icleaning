<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/ClienteController.php');
require_once( $path.'/icleaning/app/models/Cliente.php');

$valueDNI = $_POST['dnicli'];

if ($_POST['dnicli']) {
    
    $clienteControllerBuscarDNI = new ClienteController();
    $clientePorDNI = $clienteControllerBuscarDNI->getClienteDNI($valueDNI);
    $id = $clientePorDNI->getIdCliente();
    
    if ($clientePorDNI != null) {
        
        echo "<table class='table table-bordered table-responsive table-hover'>"
                         . "<thead>"
                            . "<tr>"
                               . "<th>ID</th>"
                               . "<th>DNI</th>"
                               . "<th>Nombre</th>"
                               . "<th>Apellidos</th>"
                               . "<th>Direccion</th>"
                               . "<th>Telefono</th>"
                               . "<th>Email</th>"
                               . "<th>Fecha Registro</th>"
                               . "<th>Opciones</th>"
                            . "</tr>"
                         . "</thead>"
                         . "<tbody>";
        
                        echo "<tr>";
                             echo "<td>" . $clientePorDNI->getIdCliente() . "</td>";
                             echo "<td>" . $clientePorDNI->getDni() . "</td>";
                             echo "<td>" . $clientePorDNI->getNombre() . "</td>";
                             echo "<td>" . $clientePorDNI->getApellidos() . "</td>";
                             echo "<td>" . $clientePorDNI->getDireccion() . "</td>";
                             echo "<td>" . $clientePorDNI->getTelefono() . "</td>";
                             echo "<td>" . $clientePorDNI->getEmail() . "</td>";
                             echo "<td>" . $clientePorDNI->getFechaRegistro() . "</td>";
                             echo "<td>   <button class='btn btn-info btn-xs'>Edit</button> " . ""
                                    . "<button onclick='deleteCliente($id)' class='btn btn-info btn-xs'>Borrar</button> </td>";
                        echo "</tr>";
                        
                        echo "</tbody>"
                              . "</table>";
    }
    else {
        echo "No existe el cliente con el DNI " . $valueDNI;
    }
}
    
 



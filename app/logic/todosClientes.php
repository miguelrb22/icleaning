<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/ClienteController.php');
require_once( $path.'/icleaning/app/models/Cliente.php');

$clienteController = new ClienteController();
$cliente = $clienteController->getListaClientes();

if ($cliente != null) {
    
    echo "<table id='todosCli' class='table table-bordered table-responsive table-hover'>"
            . "<thead>"
            . "<tr class='danger'>"
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
    
    foreach ($cliente as $cli) {
        
        $id = $cli->getIdCliente();
        echo "<tr id='$id'>";
        echo "<td>" . $cli->getIdCliente() . "</td>";
        echo "<td>" . $cli->getDni() . "</td>";
        echo "<td>" . $cli->getNombre() . "</td>";
        echo "<td>" . $cli->getApellidos() . "</td>";
        echo "<td>" . $cli->getDireccion() . "</td>";
        echo "<td>" . $cli->getTelefono() . "</td>";
        echo "<td>" . $cli->getEmail() . "</td>";
        echo "<td>" . $cli->getFechaRegistro() . "</td>";
        echo "<td>   <button class='btn btn-info btn-xs'>Edit</button> " . ""
                . "<button onclick='deleteCliente($id)' class='btn btn-info btn-xs'>Borrar</button> </td>";
            echo "</tr>";
    }
    
    echo "</tbody>"
            . "</table>";
}


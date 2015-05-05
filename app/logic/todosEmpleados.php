<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/EmpleadoController.php');
require_once( $path.'/icleaning/app/models/Trabajador.php');


    $trabajadorController = new EmpleadoController();
    $empleado = $trabajadorController->getListaEmpleados();

    if ($empleado != null) {

        echo "<table id='todosEmp' class='table table-bordered table-responsive table-hover'>"
            . "<thead>"
            . "<tr class='danger'>"
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

        foreach($empleado as $emple){

            $id = $emple->getIdEmpleado();
            echo "<tr id='$id'>";
            echo "<td>" . $emple->getIdEmpleado() . "</td>";
            echo "<td>" . $emple->getNif() . "</td>";
            echo "<td>" . $emple->getNombre() . "</td>";
            echo "<td>" . $emple->getApellidos() . "</td>";
            echo "<td>" . $emple->getEmail() . "</td>";
            echo "<td>" . $emple->getNumeroCuenta() . "</td>";
            echo "<td>" . $emple->getSip() . "</td>";
            echo "<td>   <button class='btn btn-info btn-xs'>Edit</button> " . ""
                . "<button onclick='deleteEmpleado($id)' class='btn btn-info btn-xs'>Borrar</button> </td>";
            echo "</tr>";
        }
        echo "</tbody>"
            . "</table>";
    }




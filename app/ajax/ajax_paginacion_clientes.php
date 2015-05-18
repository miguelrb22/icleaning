<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');
require_once( $path.'/icleaning/app/controllers/ClienteController.php');
require_once( $path.'/icleaning/app/models/Cliente.php');

$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");
$num = utf8_decode($filtro->real_escape_string($_POST["page"]));
$clienteController = new ClienteController();
$cliente = $clienteController->getListaClientes((($num-1)*10),10);


if ($cliente != null) {

    foreach ($cliente as $cli) {

        $id = $cli->getIdCliente();
        echo "<tr id='$id'>";
        echo "<td>" . $cli->getIdCliente() . "</td>";
        echo "<td>" . $cli->getDni() . "</td>";
        echo "<td>" . utf8_encode($cli->getNombre()) . "</td>";
        echo "<td>" . utf8_encode($cli->getApellidos()) . "</td>";
        echo "<td>" . utf8_encode($cli->getDireccion()) . "</td>";
        echo "<td>" . $cli->getTelefono() . "</td>";
        echo "<td>" . $cli->getEmail() . "</td>";
        echo "<td>" . $cli->getFechaRegistro() . "</td>";
        echo "<td>   <button class='btn btn-info btn-xs'>Edit</button> " . ""
            . "<button onclick='deleteCliente($id)' class='btn btn-info btn-xs'>Borrar</button> </td>";
        echo "</tr>";
    }

}
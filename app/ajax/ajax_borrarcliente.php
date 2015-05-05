<?php

$aux = $_POST["aux"];
    $path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

    include_once $path . '/icleaning/app/controllers/ClienteController.php';

    $cliente = new ClienteController();
    $cliente->deleteClientePorID($aux);

    echo $aux;


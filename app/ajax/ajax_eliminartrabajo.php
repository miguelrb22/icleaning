<?php

$aux = $_POST["aux"];
$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

    include_once $path . '/icleaning/app/controllers/TrabajoController.php';
    include_once $path . '/icleaning/app/models/Trabajo.php';

    $trabajoController = new TrabajoController();
    $trabajoController->deleteTrabajoPorId($aux);
    
    echo $aux;


<?php

    $filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

    $aux = utf8_decode($filtro->real_escape_string($_POST["aux"]));
    $path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

    include_once $path . '/icleaning/app/controllers/TrabajoController.php';
    include_once $path . '/icleaning/app/models/Trabajo.php';
    
    include_once $path . '/icleaning/app/models/Factura.php';
    include_once $path . '/icleaning/app/controllers/FacturaController.php';

    $trabajoController = new TrabajoController();
    $trabajo = $trabajoController->getTrabajo($aux);
    
    $trabajo->setFinalizado(1);
    
    //Insertamos fecha de fin
    $dt = new DateTime();
    
    
    $trabajo->setFechaFin($dt->format('Y-m-d'));
    
    $trabajoController->updateTrabajo($trabajo);
    
    //Generar la factura
    $facturaController = new FacturaController();
    $factura = new Factura(0, $dt->format('Y-m-d'), $trabajo->getImporteTotal(), 1, $trabajo->getIdTrabajo());
    
    $facturaController->insertFactura($factura);

    echo $aux;


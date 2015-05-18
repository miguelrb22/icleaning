<?php

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/TrabajoController.php';
include_once $path . '/icleaning/app/models/Trabajo.php';

$trabajoController = new TrabajoController();
$trabajo2 = new Trabajo(2, 1, 1239, 4, 3, 150, 1, "Calle asdf", 3, 35, 200, "2015-05-22", "2015-05-25");
$trabajoController->insertTrabajo($trabajo2);


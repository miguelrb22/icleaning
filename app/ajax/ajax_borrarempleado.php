<?php


    $aux = mysql_real_escape_string($_POST["aux"]);
    $path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

    include_once $path . '/icleaning/app/controllers/EmpleadoController.php';

    $empleado = new EmpleadoController();
    $empleado->deleteEmpleadoPorID($aux);

    echo $aux;



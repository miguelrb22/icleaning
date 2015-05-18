<?php

    $filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

    $aux = utf8_decode($filtro->real_escape_string($_POST["aux"]));
    $path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

    include_once $path . '/icleaning/app/controllers/EmpleadoController.php';

    $empleado = new EmpleadoController();
    $empleado->deleteEmpleadoPorID($aux);

    echo $aux;



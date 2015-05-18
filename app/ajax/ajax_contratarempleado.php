<?php

$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

$idEmpleado = utf8_decode($filtro->real_escape_string($_POST["idtrabajador"]));
$idCliente = utf8_decode($filtro->real_escape_string($_POST["idcliente"]));
$calle = utf8_decode($filtro->real_escape_string($_POST["calle"]));
$traHoras = utf8_decode($filtro->real_escape_string($_POST["trahoras"]));
$fecha = utf8_decode($filtro->real_escape_string($_POST["fecha"]));

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/EmpleadoController.php';
include_once $path . '/icleaning/app/models/Trabajador.php';

include_once $path . '/icleaning/app/controllers/ClienteController.php';
include_once $path . '/icleaning/app/models/Cliente.php';

include_once $path . '/icleaning/app/controllers/TrabajoController.php';
include_once $path . '/icleaning/app/models/Trabajo.php';

include_once $path . '/icleaning/app/controllers/EspecialidadController.php';
include_once $path . '/icleaning/app/models/Especialidad.php';

$empleadoController = new EmpleadoController();
$empleado = $empleadoController->getEmpleado($idEmpleado);

$clienteController = new ClienteController();
$cliente = $clienteController->getCliente($idCliente);

$especialidadController = new EspecialidadController();
$especialidad = $especialidadController->getEspecialidad($empleado->getFkIdEspecialidad());

$importeTotal = $especialidad->getCobroHora() * $traHoras;

$trabajoController = new TrabajoController();
$trabajo = new Trabajo(0, $idCliente, $idEmpleado, 3, 1, $importeTotal, 0, $calle, $traHoras, 50, 0, $fecha, "0000-00-00");
$trabajoController->insertTrabajo($trabajo);





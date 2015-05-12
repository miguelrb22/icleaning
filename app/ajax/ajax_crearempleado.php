<?php

$telefono = $_POST["tratelefono"];
$email = $_POST["traemail"];
$numCuenta = $_POST["tracuenta"];
$traDescripcion = $_POST["tradescripcion"];
$traContrasenya = $_POST["trapass"];
$traNombre = $_POST["tranombre"];
$traApellidos = $_POST["traapellidos"];
$traNif = $_POST["tranif"];
$traExperiencia = $_POST["traexperiencia"];
$traSip = $_POST["trasip"];
$traZona = $_POST["trazona"];
$traEspecialidad = $_POST["traespecialidad"];


$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/EmpleadoController.php';
include_once $path . '/icleaning/app/models/Trabajador.php';

$trabajadorController = new EmpleadoController();

$empleado = new Trabajador(0, $traEspecialidad, $traZona, $traNif, $traApellidos, $traNombre, $telefono, $email, $numCuenta, $traSip, $traExperiencia, '2015-01-01', 0, $traContrasenya, '',$traDescripcion, 1);
//$empleado2 = new Trabajador(0, 1, 48, 14553322, 'nyanya', 'qwe', 44332211, 'purpurpur', 1243124, 3141423, 2, '2015-01-01', 4, 'purClear', '', 'Desc', 3);

$trabajadorController->insertEmpleado($empleado);



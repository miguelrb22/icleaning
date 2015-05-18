<?php

$telefono = mysql_real_escape_string($_POST["tratelefono"]);
$email = mysql_real_escape_string($_POST["traemail"]);
$numCuenta = mysql_real_escape_string($_POST["tracuenta"]);
$traDescripcion = mysql_real_escape_string($_POST["tradescripcion"]);
$traContrasenya = mysql_real_escape_string($_POST["trapass"]);
$traNombre = mysql_real_escape_string($_POST["tranombre"]);
$traApellidos = mysql_real_escape_string($_POST["traapellidos"]);
$traNif = mysql_real_escape_string($_POST["tranif"]);
$traExperiencia = mysql_real_escape_string($_POST["traexperiencia"]);
$traSip = mysql_real_escape_string($_POST["trasip"]);
$traEspecialidad = mysql_real_escape_string($_POST["trazona"]);
$traZona = mysql_real_escape_string($_POST["traespecialidad"]);


$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/EmpleadoController.php';
include_once $path . '/icleaning/app/models/Trabajador.php';

$trabajadorController = new EmpleadoController();

$empleado = new Trabajador(0, $traEspecialidad, $traZona, $traNif, $traApellidos, $traNombre, $telefono, $email, $numCuenta, $traSip, $traExperiencia, '2015-01-01', 0, $traContrasenya, '',$traDescripcion, 1);
//$empleado2 = new Trabajador(0, 1, 48, 14553322, 'nyanya', 'qwe', 44332211, 'purpurpur', 1243124, 3141423, 2, '2015-01-01', 4, 'purClear', '', 'Desc', 3);

$trabajadorController->insertEmpleado($empleado);



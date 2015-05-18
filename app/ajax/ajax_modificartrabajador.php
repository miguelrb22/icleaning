<?php

$idtrabajador = mysql_real_escape_string($_POST["idtrabajador"]);
$telefono = mysql_real_escape_string($_POST["tratelefono"]);
$email = mysql_real_escape_string($_POST["traemail"]);
$numCuenta = mysql_real_escape_string($_POST["tracuenta"]);
$traDescripcion = mysql_real_escape_string($_POST["tradescripcion"]);
$traContrasenya = mysql_real_escape_string($_POST["trapass"]);

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/EmpleadoController.php';
include_once $path . '/icleaning/app/models/Trabajador.php';

$trabajadorController = new EmpleadoController();
$trabajador = $trabajadorController->getEmpleado($idtrabajador);

$trabajador->setTelefono($telefono);
$trabajador->setEmail($email);
$trabajador->setNumeroCuenta($numCuenta);
$trabajador->setDescripcion($traDescripcion);
$trabajador->setContrasenya($traContrasenya);

$trabajadorController->updateEmpleado($trabajador);

echo $idtrabajador;


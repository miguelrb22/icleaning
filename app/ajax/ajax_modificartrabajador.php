<?php

$idtrabajador = $_POST["idtrabajador"];
$telefono = $_POST["tratelefono"];
$email = $_POST["traemail"];
$numCuenta = $_POST["tracuenta"];
$traDescripcion = $_POST["tradescripcion"];
$traContrasenya = $_POST["trapass"];

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


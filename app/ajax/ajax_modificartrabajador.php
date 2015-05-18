<?php
$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

$idtrabajador = utf8_decode($filtro->real_escape_string($_POST["idtrabajador"]));
$telefono = utf8_decode($filtro->real_escape_string($_POST["tratelefono"]));
$email = utf8_decode($filtro->real_escape_string($_POST["traemail"]));
$numCuenta = utf8_decode($filtro->real_escape_string($_POST["tracuenta"]));
$traDescripcion = utf8_decode($filtro->real_escape_string($_POST["tradescripcion"]));
$traContrasenya = utf8_decode($filtro->real_escape_string($_POST["trapass"]));

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


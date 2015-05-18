<?php

$cliname = mysql_real_escape_string($_POST["cliname"]);
$cliapellidos =mysql_real_escape_string( $_POST["cliapellidos"]);
$clidni = mysql_real_escape_string($_POST["clidni"]);
$clidireccion = mysql_real_escape_string($_POST["clidireccion"]);
$cliemail = mysql_real_escape_string($_POST["cliemail"]);
$clitelefono = mysql_real_escape_string($_POST["clitelefono"]);
$clipass = mysql_real_escape_string($_POST["clipass"]);

$dt = new DateTime();
//$dt->format('Y-m-d')

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/ClienteController.php';
include_once $path . '/icleaning/app/models/Cliente.php';

$cliente = new Cliente(0, $clidni, $cliname, $clidireccion, $clitelefono, $cliemail, $dt->format('Y-m-d'), $clipass, '', $cliapellidos);

$clienteController = new ClienteController();
$clienteController->insertCliente($cliente);
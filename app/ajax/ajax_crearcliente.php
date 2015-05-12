<?php

$cliname = $_POST["cliname"];
$cliapellidos = $_POST["cliapellidos"];
$clidni = $_POST["clidni"];
$clidireccion = $_POST["clidireccion"];
$cliemail = $_POST["cliemail"];
$clitelefono = $_POST["clitelefono"];
$clipass = $_POST["clipass"];

$dt = new DateTime();
//$dt->format('Y-m-d')

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/ClienteController.php';
include_once $path . '/icleaning/app/models/Cliente.php';

$cliente = new Cliente(0, $clidni, $cliname, $clidireccion, $clitelefono, $cliemail, $dt->format('Y-m-d'), $clipass, '', $cliapellidos);

$clienteController = new ClienteController();
$clienteController->insertCliente($cliente);
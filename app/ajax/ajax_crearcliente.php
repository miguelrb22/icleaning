<?php
$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

$cliname = utf8_decode($filtro->real_escape_string($_POST["cliname"]));
$cliapellidos =utf8_decode($filtro->real_escape_string( $_POST["cliapellidos"]));
$clidni = utf8_decode($filtro->real_escape_string($_POST["clidni"]));
$clidireccion = utf8_decode($filtro->real_escape_string($_POST["clidireccion"]));
$cliemail = utf8_decode($filtro->real_escape_string($_POST["cliemail"]));
$clitelefono = utf8_decode($filtro->real_escape_string($_POST["clitelefono"]));
$clipass = utf8_decode($filtro->real_escape_string($_POST["clipass"]));

$dt = new DateTime();
//$dt->format('Y-m-d')

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/ClienteController.php';
include_once $path . '/icleaning/app/models/Cliente.php';

$cliente = new Cliente(0, $clidni, $cliname, $clidireccion, $clitelefono, $cliemail, $dt->format('Y-m-d'), $clipass, '', $cliapellidos);

$clienteController = new ClienteController();
$clienteController->insertCliente($cliente);
<?php
$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

$idcliente = utf8_decode($filtro->real_escape_string($_POST["idcliente"]));
$direccion = utf8_decode($filtro->real_escape_string($_POST["clidir"]));
$email = utf8_decode($filtro->real_escape_string($_POST["cliemail"]));
$telefono = utf8_decode($filtro->real_escape_string($_POST["clitelefono"]));
$password = utf8_decode($filtro->real_escape_string($_POST["clipass"]));

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/ClienteController.php';
include_once $path . '/icleaning/app/models/Cliente.php';

$clienteController = new ClienteController();
$cliente = $clienteController->getCliente($idcliente);

$cliente->setDireccion($direccion);
$cliente->setEmail($email);
$cliente->setTelefono($telefono);
$cliente->setContrasenya($password);

$clienteController->updateCliente($cliente);

echo $idcliente;
echo $direccion;
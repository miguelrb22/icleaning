<?php

$idcliente = $_POST["idcliente"];
$direccion = $_POST["clidir"];
$email = $_POST["cliemail"];
$telefono = $_POST["clitelefono"];
$password = $_POST["clipass"];

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
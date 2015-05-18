<?php

$idcliente = mysql_real_escape_string($_POST["idcliente"]);
$direccion = mysql_real_escape_string($_POST["clidir"]);
$email = mysql_real_escape_string($_POST["cliemail"]);
$telefono = mysql_real_escape_string($_POST["clitelefono"]);
$password = mysql_real_escape_string($_POST["clipass"]);

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
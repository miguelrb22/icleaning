<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 17/03/2015
 * Time: 18:49
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();

if(!isset($_SESSION['name'])){

    header('location: ../../index.php');
}
else {

    require_once($_SERVER['DOCUMENT_ROOT'].'/app\database\DBAccess.php');

    $zona = $_POST['zona'];
    $especialidad = $_POST['especialidad'];
    $fecha = $_POST['fecha'];


    echo $zona . $especialidad . $fecha;

    $dbAccess = new DBAccess();
    $query = $dbAccess->getSelect( "select * from cliente where email='" . $_SESSION['name'] . "'");
    $numrows = mysqli_num_rows($query);

    echo "<h1> Hola Cabron </h1>";



}
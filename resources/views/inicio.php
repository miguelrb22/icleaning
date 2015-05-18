<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 17/03/2015
 * Time: 18:49
 */


error_reporting(E_ALL ^ E_NOTICE);
session_start();

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);


if(!isset($_SESSION['name'])){

    header('location: ../../index.php');
}
else {

    require_once($path.'/icleaning/app\database\DBAccess.php');

    $zona = mysql_real_escape_string($_POST['zona']);
    $especialidad = mysql_real_escape_string($_POST['especialidad']);
    $fecha = mysql_real_escape_string($_POST['fecha']);


    echo utf8_encode( $zona . $especialidad . $fecha);

    $dbAccess = new DBAccess();
    $query = $dbAccess->getSelect( "select * from cliente where email='" . $_SESSION['name'] . "'");
    $numrows = mysqli_num_rows($query);

    echo "<h1> Bienvenido </h1>";



}
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

    header('location: ../index.php');
}
else {

    echo "<h1> Hola Cabron </h1>";



}
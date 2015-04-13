<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 17/03/2015
 * Time: 18:49
 */


error_reporting(E_ALL ^ E_NOTICE);


    require_once('..\app\database\DBAccess.php');

    $zona = $_POST['zona'];
    $especialidad = $_POST['especialidad'];
    $fecha = $_POST['fecha'];


    $dbAccess = new DBAccess();
    $aux = "SELECT * FROM empleado where idespecialidad =" .$especialidad . " and idzona = ". $zona ." and idempleado not in (select idempleado from ocupacion where fecha_ocupado='". $fecha. "')";
    $query = $dbAccess->getSelect($aux);


  foreach($query as $q){

      echo $q['idempleado'];
  }

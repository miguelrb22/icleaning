<?php
/**
 * Created by PhpStorm.
 * User: Miguel
 * Date: 16/05/2015
 * Time: 16:45
 */

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/database/DBAccess.php';

set_time_limit (0);
ini_set('memory_limit', '-1');
ini_set('post_max_size','-1');

ini_set('upload_max_filesize','-1');
ini_set('max_input_time','-1');

$link = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

for($i=0; $i<1000000; $i++) {

    $db = NEW DBAccess();
    $idcliente = mt_rand(51, 29579);
    $idempleado = mt_rand(1452, 1651);
    $valoracion = mt_rand(0, 5);
    $importe = mt_rand(50, 499);
    $horas = floor($importe / 10);

    $dias = ceil($horas / 8);

    $fecha = date('Y-m-j');
    $lap = mt_rand(100, 1000);
    $lap2 = $lap - $dias;
    $nuevafecha = strtotime('- ' . $lap . ' day', strtotime($fecha));
    $nuevafecha2 = strtotime('- ' . $lap2 . ' day', strtotime($fecha));

    $nuevafecha = date('Y-m-d', $nuevafecha);
    $nuevafecha2 = date('Y-m-d', $nuevafecha2);


    $gastos = ceil($importe * 0.23);


    $query = "insert into trabajo (idcliente, idempleado,valoracion,importe_total,finalizado,estimacion_horas,gasto_total,
          importe_recibido,fecha_inicio, fecha_fin) values($idcliente,$idempleado,$valoracion,$importe,0,$horas,$gastos,$gastos," .

        "'" . $nuevafecha . "'," . "'" . $nuevafecha2 . "')";


    mysqli_query($link, $query);

}
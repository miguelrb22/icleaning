<?php

include_once('datos.php');



try {

    $datos = new datos();
    echo "<h3>Generando datos...</h3><br>";

    $datos->init(10);
    echo "Datos generados";


} catch (exception $e) {

    echo $e->getMessage();
}

$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '+2 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'd/m/Y' , $nuevafecha );

echo $nuevafecha;
<?php

include_once('datos.php');



try {

    $datos = new datos();
    echo "<h3>Generando datos...</h3><br>";

    $datos->init(10000);
    echo "Datos generados";


} catch (exception $e) {

    echo $e->getMessage();
}
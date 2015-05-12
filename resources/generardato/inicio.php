<?php

include_once('datos.php');



set_time_limit (0);
ini_set('memory_limit', '-1');
ini_set('post_max_size','-1');

ini_set('upload_max_filesize','-1');
ini_set('max_input_time','-1');

try {



        $datos = new datos();
        echo "<h3>Generando datos...</h3><br>";

        $datos->init(30000);

    echo "Datos generados";


} catch (exception $e) {

    echo $e->getMessage();
}

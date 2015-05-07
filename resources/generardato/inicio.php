<?php


/**DNIS **/

function letra_nif($dni) {
    return substr("TRWAGMYFPDXBNJZSQVHLCKE",strtr($dni,"XYZ","012")%23,1);
}

$dnis = array();
$dnis2 =array();


for($i = 0; $i<1000; $i++){

    $dni = mt_rand(10000000,99999999);
    $dni = $dni . letra_nif($dni);


    if(!array_key_exists($dni, $dnis)) {

        $dnis[$dni] = 1;
    }
    else {$i--;}
}

foreach($dnis as $dni => $value) {

    array_push($dnis2, $dni);
}


/**Nombre **/



$lista = array (
    $dnis2,
    array('123', '456', '789'),
    array('"aaa"', '"bbb"')
);


$fp = fopen('fichero.csv', 'w');

foreach ($lista as $campos) {
    fputcsv($fp, $campos);
}

if (($fichero = fopen("apellidos.csv", "r")) !== FALSE) {

    while (($datos = fgetcsv($fichero, 0, ";")) !== FALSE) {
        // Procesar los datos.


            $i = $datos[3]*265;
            $t = 0;

            while($t <= $i){

                echo $t." ".$datos[1]."<br>";
                $t++;
            }



        // en $datos[1] está el valor del segundo campo, etc...
    }
}

fclose($fp);
?>
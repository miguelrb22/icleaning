<?php

$mysqli = new mysqli("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza") or die("Error " . mysqli_error($link));

$query = "SELECT * from provincia";
$result = $mysqli->query($query);

foreach($result as $row){
    echo $row['nombre_provincia'];
}

$mysqli->close();

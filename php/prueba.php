<?php

$busqueda = $_POST["busqueda1"];

echo $busqueda;


$link = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza") or die("Error " . mysqli_error($link));
$query = mysqli_query($link, "select * from provincia");
$tam = mysqli_num_rows($query);



$rows = mysqli_fetch_assoc($query);

foreach($rows as $row){
    
    echo $row['nombre_provincia'];
    
}



mysqli_close($link);

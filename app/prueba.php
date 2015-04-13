<?php

$link = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza") or die("Error " . mysqli_error($link));
$query = mysqli_query($link, "select * from especialidad");

while($rows = mysqli_fetch_array($query))
{        
    if (($rows['tipo_especialidad'] != "Administrador") && ($rows['tipo_especialidad'] != "Gestor")) {
        
        echo "<option  style='color:white;' value='".$rows['idespecialidad']."'>".$rows['tipo_especialidad']."</option>";   
    }
}



mysqli_close($link);

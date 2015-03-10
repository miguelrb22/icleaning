<?php

include_once 'database/DBAccess.php';

$dbAccess = new DBAccess();
$result = $dbAccess->getSelect("SELECT * from especialidad");

foreach($result as $row){
    
    if (($row['tipo_especialidad'] != "Administrador") && ($row['tipo_especialidad'] != "Gestor")) {
        
        echo "<option  style='color:white;' value='".$row['idespecialidad']."'>".$row['tipo_especialidad']."</option>";   
    }
    
}



<?php

include_once 'php/controllers/EspecialidadController.php';
include_once 'php/models/Especialidad.php';


//Prueba con listas
/*$espCon = new EspecialidadController();
$listaEsp = $espCon->getListaEspecialidades();

foreach ($listaEsp as $esp) {
    echo "<option  style='color:white;' value='" .$esp->getIdEspecialidad(). "'>" .$esp->getTipoEspecialidad(). "</option>";
}*/

//Prueba con uno
/*$espCon = new EspecialidadController();

$esp = $espCon->getEspecialidad(1);
echo "<option  style='color:white;' value='" .$esp->getIdEspecialidad(). "'>" .$esp->getTipoEspecialidad(). "</option>";
*/

//Insertar
$espCon = new EspecialidadController();

$especialidad = new Especialidad(11, "Wololo", 100, 10);
$espCon->insertEspecialidad($especialidad);
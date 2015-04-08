<?php


require_once('php/controllers/ZonaController.php');
require_once('php/controllers/EspecialidadController.php');


function select_zonas()
{
    $zonaC = new ZonaController();
    $zonas = $zonaC->getListaZonas();


    foreach ($zonas as $zona) {


        $z = $zona->getIdZona();
        $n = $zona->getNombre();
        echo "<option value='$z'>$n</option>";


    }


};


function select_especialidades()
{
    $EspecildadC = new EspecialidadController();
    $Especialidades = $EspecildadC->getListaEspecialidades();


    foreach ($Especialidades as $especialidad) {


        $e = $especialidad->getIdEspecialidad();
        $n = $especialidad->getTipoEspecialidad();
        echo "<option value='$e'>$n</option>";


    }


};
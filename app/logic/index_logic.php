<?php

$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/controllers/ZonaController.php');
require_once( $path.'/icleaning/app/controllers/EspecialidadController.php');


function select_zonas()
{
    $zonaC = new ZonaController();
    $zonas = $zonaC->getListaZonas();


    foreach ($zonas as $zona) {


        $z = $zona->getIdZona();
        $n = $zona->getNombre();
        echo "<option name='selectZona' value='$z'>$n</option>";


    }


};


function select_especialidades()
{
    $EspecildadC = new EspecialidadController();
    $Especialidades = $EspecildadC->getListaEspecialidades();


    foreach ($Especialidades as $especialidad) {


        $e = $especialidad->getIdEspecialidad();
        $n = $especialidad->getTipoEspecialidad();
        echo "<option name='selectEspecialidad' value='$e'>$n</option>";


    }


};
<?php

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

include_once $path . '/icleaning/app/controllers/EmpleadoController.php';
include_once $path . '/icleaning/app/models/Trabajador.php';

include_once $path . '/icleaning/app/controllers/NominaController.php';
include_once $path . '/icleaning/app/models/Nomina.php';

include_once $path . '/icleaning/app/controllers/EspecialidadController.php';
include_once $path . '/icleaning/app/models/Especialidad.php'; 

$empleadoController = new EmpleadoController();
$empleados = $empleadoController->getListaEmpleados();

$especialidadController = new EspecialidadController();

$nominaController = new NominaController();

$dt = new DateTime();

foreach ($empleados as $empleado) {
    
    $especialidadId = $empleado->getFkIdEspecialidad();
    $especialidad = $especialidadController->getEspecialidad($especialidadId);
    
    $pago = $especialidad->getSalarioFijo() + ($especialidad->getCobroHora() * $empleado->getHorasTrabajadas());
    
    $nomina = new Nomina(0, $empleado->getIdEmpleado(), $dt->format('Y-m-d'), $pago, 1);
    
    $nominaController->insertNomina($nomina);
    
}




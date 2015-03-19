<?php

//include_once 'php/controllers/EspecialidadController.php';
//include_once 'php/models/Especialidad.php';

//include_once 'php/controllers/ComentariosController.php';
//include_once 'php/models/Comentarios.php';

//include_once 'php/controllers/ClienteController.php';
//include_once 'php/models/Cliente.php';

//include_once 'php/controllers/CompraController.php';
//include_once 'php/models/Compra.php';

//include_once 'php/controllers/EmpleadoController.php';
//include_once 'php/models/Trabajador.php';

//include_once 'php/controllers/FacturaController.php';
//include_once 'php/models/Factura.php';

//include_once 'php/controllers/NominaController.php';
//include_once 'php/models/Nomina.php';

//include_once 'php/controllers/OcupacionController.php';
//include_once 'php/models/Ocupacion.php';

//include_once 'php/controllers/ProvinciaController.php';
//include_once 'php/models/Provincia.php';

//include_once 'php/controllers/ZonaController.php';
//include_once 'php/models/Zona.php';

//include_once 'php/controllers/TipoTesoreriaController.php';
//include_once 'php/models/TipoTesoreria.php';

//include_once 'php/controllers/TesoreriaController.php';
//include_once 'php/models/Tesoreria.php';

include_once 'php/controllers/TrabajoController.php';
include_once 'php/models/Trabajo.php';

//Prueba con listas

//EspecialidadController
/*$espCon = new EspecialidadController();
$listaEsp = $espCon->getListaEspecialidades();

foreach ($listaEsp as $esp) {
    echo "<option  style='color:white;' value='" .$esp->getIdEspecialidad(). "'>" .$esp->getTipoEspecialidad(). "</option>";
}*/

//ComentariosController
/*$comCon = new ComentariosController();
$listaCom = $comCon->getListaComentarios();

foreach ($listaCom as $com) {
    echo "<option  style='color:white;' value='" .$com->getIdComentario(). "'>" .$com->getComentario(). "</option>";
}*/

//ClienteController
/*$cliCon = new ClienteController();
$listaClientes = $cliCon->getListaClientes();

foreach ($listaClientes as $cli) {
    echo "<option  style='color:white;' value='" .$cli->getIdCliente(). "'>" .$cli->getDni(). "</option>";
}*/

//CompraController
/*$comCon = new CompraController();
$listaCompra = $comCon->getListaCompras();

foreach ($listaCompra as $com) {
    echo "<option  style='color:white;' value='" .$com->getIdCompra(). "'>" .$com->getDescripcion(). "</option>";
}*/

//EmpleadoController
/*$empCon = new EmpleadoController();
$listEmp = $empCon->getListaEmpleados();

foreach ($listEmp as $emp) {
    echo "<option  style='color:white;' value='" .$emp->getIdEmpleado(). "'>" .$emp->getNombre(). "</option>";
}*/

//FacturaController
/*$facCon = new FacturaController();
$listFac = $facCon->getListaFacturas();

foreach ($listFac as $fac) {
    echo "<option  style='color:white;' value='" .$fac->getIdFactura(). "'>" .$fac->getTotalImporte(). "</option>";
}*/

//NominaController
/*$nomCon = new NominaController();
$listNom = $nomCon->getListaNominas();

foreach ($listNom as $nom) {
    echo "<option  style='color:white;' value='" .$nom->getIdNomina(). "'>" .$nom->getNominaTotal(). "</option>";
}*/

//OcupacionController
/*$ocuCon = new OcupacionController();
$listOcu = $ocuCon->getListaOcupaciones();

foreach ($listOcu as $ocu) {
    echo "<option  style='color:white;' value='" .$ocu->getIdOcupacion(). "'>" .$ocu->getFechaOcupado(). "</option>";
}*/

//ProvinciaController
/*$proCon = new ProvinciaController();
$listaPro = $proCon->getListaProvincias();

foreach ($listaPro as $pro) {
    echo "<option  style='color:white;' value='" .$pro->getIdProvincia(). "'>" .$pro->getNombreProvincia(). "</option>";
}*/

//ZonaController
/*$zonCon = new ZonaController();
$listZon = $zonCon->getListaZonas();

foreach ($listZon as $zon) {
    echo "<option  style='color:white;' value='" .$zon->getIdZona(). "'>" .$zon->getNombre(). "</option>";
}*/

//TipoTesoreriaController
/*$tipoTeCon = new TipoTesoreriaController();
$listTiTe = $tipoTeCon->getListaTipoTesorerias();

foreach ($listTiTe as $tite) {
    echo "<option  style='color:white;' value='" .$tite->getIdTipoTesoreria(). "'>" .$tite->getTipoTesoreria(). "</option>";
}*/

//TesoreriaController
/*$tesCon = new TesoreriaController();
$listTes = $tesCon->getListaTesoreria();

foreach ($listTes as $tes) {
    echo "<option  style='color:white;' value='" .$tes->getIdTesoreria(). "'>" .$tes->getImporte(). "</option>";
}*/

//TrabajoController
/*$traCon = new TrabajoController();
$listTra = $traCon->getListaTrabajos();

foreach ($listTra as $tra) {
    echo "<option  style='color:white;' value='" .$tra->getIdTrabajo(). "'>" .$tra->getImporteTotal(). "</option>";
}*/

//Prueba con uno

//EspecialidadController
/*$espCon = new EspecialidadController();

$esp = $espCon->getEspecialidad(1);
echo "<option  style='color:white;' value='" .$esp->getIdEspecialidad(). "'>" .$esp->getTipoEspecialidad(). "</option>";
*/

//ComentariosController
/*$comCon = new ComentariosController();

$com = $comCon->getComentario(2);
echo "<option  style='color:white;' value='" .$com->getIdComentario(). "'>" .$com->getComentario() . "</option>";
*/

//ClienteController
/*$cliCon = new ClienteController();
$cli = $cliCon->getCliente(1);
echo "<option  style='color:white;' value='" .$cli->getIdCliente(). "'>" .$cli->getDni() . "</option>";*/

//CompraController
/*$comCon = new CompraController();
$com = $comCon->getCompra(0);

echo "<option  style='color:white;' value='" .$com->getIdCompra(). "'>" .$com->getDescripcion() . "</option>";*/

//EmpleadoController
/*$empCon = new EmpleadoController();
$emp = $empCon->getEmpleado(11);

echo "<option  style='color:white;' value='" .$emp->getIdEmpleado(). "'>" .$emp->getNombre(). "</option>";*/

//FacturaController
/*$facCon = new FacturaController();
$fac = $facCon->getFactura(1);

echo "<option  style='color:white;' value='" .$fac->getIdFactura(). "'>" .$fac->getTotalImporte(). "</option>";*/

//NominaController
/*$nomCon = new NominaController();
$nom = $nomCon->getNomina(1);

echo "<option  style='color:white;' value='" .$nom->getIdNomina(). "'>" .$nom->getNominaTotal(). "</option>";*/

//OcupacionController
/*$ocuCon = new OcupacionController();
$ocu = $ocuCon->getOcupacion(1);

echo "<option  style='color:white;' value='" .$ocu->getIdOcupacion(). "'>" .$ocu->getFechaOcupado(). "</option>";*/

//ProvinciaController
/*$proCon = new ProvinciaController();
$pro = $proCon->getProvincia(1);

echo "<option  style='color:white;' value='" .$pro->getIdProvincia(). "'>" .$pro->getNombreProvincia(). "</option>";*/

//ZonaController
/*$zonCon = new ZonaController();
$zon = $zonCon->getZona(48);

echo "<option  style='color:white;' value='" .$zon->getIdZona(). "'>" .$zon->getNombre(). "</option>";*/

//TipoTesoreriaController
/*$titeCon = new TipoTesoreriaController();
$tite = $titeCon->getTipoTesoreria(1);

echo "<option  style='color:white;' value='" .$tite->getIdTipoTesoreria(). "'>" .$tite->getTipoTesoreria(). "</option>";*/

//TesoreriaController
/*$tesCon = new TesoreriaController();
$tes = $tesCon->getTesoreria(1);

echo "<option  style='color:white;' value='" .$tes->getIdTesoreria(). "'>" .$tes->getImporte(). "</option>";*/

//TrabajoController
/*$traCon = new TrabajoController();
$tra = $traCon->getTrabajo(1);

echo "<option  style='color:white;' value='" .$tra->getIdTrabajo(). "'>" .$tra->getImporteTotal(). "</option>";*/

//Insertar

//EspecialidadController
/*$espCon = new EspecialidadController();

$especialidad = new Especialidad(11, "Wololo", 100, 10);
$espCon->insertEspecialidad($especialidad);*/

//ComentariosController
/*$comCon = new ComentariosController();

$comentario = new Comentarios(5, "ASDF", 11);
$comCon->insertComentario($comentario);*/

//ClienteController
/*$cliCon = new ClienteController();

$cliente = new Cliente(9, "11111111A", "Pur", "Calle hia", 123123123, "cute@cute.com", "2015-02-20", "privado", "url_foto", "Hia hia purr");
$cliCon->insertCliente($cliente);*/

//CompraController
/*
$comCon = new CompraController();

$compra = new Compra(9, 1, "2015-03-04", 135, "Ha entrado");
$comCon->insertCompra($compra);*/

//EmpleadoController
/*$empCon = new EmpleadoController();
$empleado = new Trabajador(21, 10, 50, "1234A", "Apellidos", "Nombre", 123123123, "email", 1234, 4321, 2, "2015-03-02", 5, "pass", "foto", "desc", 3);

$empCon->insertEmpleado($empleado);*/

//FacturaController
/*$facCon = new FacturaController();
$fac = new Factura(2, "2015-02-23", 100, 1);

$facCon->insertFactura($fac);*/

//NominaController
/*$nomCon = new NominaController();
$nom = new Nomina(2, 11, "2015-03-23", 970, 1);

$nomCon->insertNomina($nom);*/

//OcupacionController
/*$ocuCon = new OcupacionController();
$ocu = new Ocupacion(2, 11, "2015-02-16");

$ocuCon->insertOcupacion($ocu);*/

//ProvinciaController
/*$proCon = new ProvinciaController();
$pro = new Provincia(4, "Purpur");

$proCon->insertProvincia($pro);*/

//ZonaController
/*$zonCon = new ZonaController();
$zon = new Zona(88, 3, "HiadelPur");

$zonCon->insertZona($zon);*/

//TipoTesoreriaController
/*$titeCon = new TipoTesoreriaController();
$tite = new TipoTesoreria(5, "Prueba");

$titeCon->insertTipoTesoreria($tite);*/

//TesoreriaController
/*$tesCon = new TesoreriaController();
$tes = new Tesoreria(2, 1, 1, null, null, "2015-02-23", 1, 300);

$tesCon->insertTesoreria($tes);*/

//TrabajoController
/*$traCon = new TrabajoController();
$tra = new Trabajo(2, 1, 11, 4, 3, 150, 1, "Calle asdf", 3, 35, 200, "2015-03-23", "2015-03-24");

$traCon->insertTrabajo($tra);*/

//Update

//EspecialidadController
/*$espCon = new EspecialidadController();

$especialidad = new Especialidad(14, "Asdf", 150, 11);
$espCon->updateEspecialidad($especialidad);*/

//ComentariosController
/*$comCon = new ComentariosController();

$comentario = new Comentarios(6, "funciona", 11);
$comCon->updateComentario($comentario);*/

//ClienteController
/*$cliCon = new ClienteController();

$cliente = new Cliente(12, "22222222B", "Cambio", "Dir cambio", 333444555, "cambio@cambio", "2013-03-01", "cambio", "urlcambio", "cambio cambio");
$cliCon->updateCliente($cliente);*/

//CompraController
/*$comCon = new CompraController();

$compra = new Compra(12, 1, "2015-02-02", 100.00, "Update");
$comCon->updateCompra($compra);*/

//EmpleadoController
/*$empCon = new EmpleadoController();
$tra = new Trabajador(20, 10, 50, "asdf", "ape", "nom", 1234124, "email", 124, 4321, 3, "2015-03-03", 10, "asdf", "url", "desc", 1);

$empCon->updateEmpleado($tra);*/

//FacturaController
/*$facCon = new FacturaController();
$fac = new Factura(2, "2015-02-20", 75, 1);

$facCon->updateFactura($fac);*/

//NominaController
/*$nomCon = new NominaController();
$nom = new Nomina(5, 11, "2015-01-23", 500, 1);

$nomCon->updateNomina($nom);*/

//OcupacionController
/*$ocuCon = new OcupacionController();
$ocu = new Ocupacion(4, 11, "2015-03-25");

$ocuCon->updateOcupacion($ocu);*/

//ProvinciaController
/*$proCon = new ProvinciaController();
$pro = new Provincia(4, "Hiahia");

$proCon->updateProvincia($pro);*/

//ZonaController
/*$zonCon = new ZonaController();
$zon = new Zona(90, 3, "Purrrr");

$zonCon->updateZona($zon);*/

//TipoTesoreriaController
/*$titeCon = new TipoTesoreriaController();
$tite = new TipoTesoreria(6, "Cambiado");

$titeCon->updateTipoTesoreria($tite);*/

//TesoreriaController
/*$tesCon = new TesoreriaController();
$tes = new Tesoreria(3, 1, 1, null, null, 2015-03-23, 1, 450);

$tesCon->updateTesoreria($tes);*/

//TrabajoController
/*$traCon = new TrabajoController();
$tra = new Trabajo(4, 1, 11, 4, 2, 130, 1, "Cambio dir", 9, 11, 122, "2015-02-04", "2015-02-07");

$traCon->updateTrabajo($tra);*/

//Delete

//EspecialidadController
/*$espCon = new EspecialidadController();

$especialidad = new Especialidad(14, "Asdf", 150, 11);
$espCon->deleteEspecialidad($especialidad);*/

//ComentariosController
/*$comCon = new ComentariosController();

$comentarios = new Comentarios(6, "PurPurhia1234", 11);
$comCon->deleteComentario($comentarios);*/

//ClienteController
/*$cliCon = new ClienteController();

$cliente = new Cliente(12, null, null, null, null, null, null, null, null, null);
$cliCon->deleteCliente($cliente);*/

//CompraController
/*$comCon = new CompraController();
$compra = new Compra(12, 1, "2015-02-20", 150, "Des");

$comCon->deleteCompra($compra);*/

//EmpleadoController
/*$empCon = new EmpleadoController();
$empleado = new Trabajador(20, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null, null);

$empCon->deleteEmpleado($empleado);*/

//FacturaController
/*$facCon = new FacturaController();
$fac = new Factura(2, null, null, null);

$facCon->deleteFactura($fac);*/

//NominaController
/*$nomCon = new NominaController();
$nom = new Nomina(5, null, null, null, null);

$nomCon->deleteNomina($nom);*/

//OcupacionController
/*$ocuCon = new OcupacionController();
$ocu = new Ocupacion(4, 11, null);

$ocuCon->deleteOcupacion($ocu);*/

//ProvinciaController
/*$proCon = new ProvinciaController();
$pro = new Provincia(4, "hia");

$proCon->deleteProvincia($pro);*/

//ZonaController
/*$zonCon = new ZonaController();
$zon = new Zona(90, null, null);

$zonCon->deleteZona($zon);*/

//TipoTesoreriaController
/*$titeCon = new TipoTesoreriaController();
$tite = new TipoTesoreria(6, null);

$titeCon->deleteTipoTesoreria($tite);*/

//TesoreriaController
/*$tesCon = new TesoreriaController();
$tes = new Tesoreria(3, null, null, null, null, null, null, null);

$tesCon->deleteTesoreria($tes);*/

//TrabajoController
/*$traCon = new TrabajoController();
$tra = new Trabajo(4, null, null, null, null, null, null, null, null, null, null, null, null);

$traCon->deleteTrabajo($tra);*/
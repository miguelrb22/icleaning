<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCleaning</title>

    <!-- Bootstrap CSS -->
    <link href="../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="../../public/css/landing.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="../../index.php">iCleaning</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#infgen">Información General</a>
                </li>
                <li>
                    <a href="#tesoreriap">Tesoreria</a>
                </li>
                <li>
                    <a href="#pagnominas">Nominas</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Header -->
<a name="infgen"></a>
<div class="content-section-a">


    <div class="container">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Información General</h2>
                
                <?php 
                    include_once '../../app/controllers/ClienteController.php';
                    include_once '../../app/models/Cliente.php';
                    
                    include_once '../../app/controllers/EmpleadoController.php';
                    include_once '../../app/models/Trabajador.php';
                    
                    include_once '../../app/controllers/TrabajoController.php';
                    include_once '../../app/models/Trabajo.php';
                    
                    include_once '../../app/controllers/FacturaController.php';
                    include_once '../../app/models/Factura.php';
                    
                    include_once '../../app/controllers/NominaController.php';
                    include_once '../../app/models/Nomina.php';
                    
                    $clienteController = new ClienteController();
                    $totalClientes = $clienteController->getTotalClientes();
                    
                    $empleadoController = new EmpleadoController();
                    $totalEmpleados = $empleadoController->getTotalEmpleados();
                    
                    $trabajoController = new TrabajoController();
                    $totalTrabajos = $trabajoController->getTotalTrabajos();
                    
                    $ingresosFacturaController = new FacturaController();
                    $totalIngresosFactura = $ingresosFacturaController->getTotalIngresosFacturas();
                    
                    $gastosNominaController = new NominaController();
                    $totalGastosNomina = $gastosNominaController->getTotalCostesNominas();
                ?>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Panel General</div>
                        <div class="panel-body">
                          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                            <h4 class="text-primary">Total de Clientes</h4>
                            <?php echo "<h4 class='text-info'>" . $totalClientes . "</h4>" ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <h4 class="text-primary">Total Empleados</h4>
                                <?php echo "<h4 class='text-info'>" . $totalEmpleados . "</h4>" ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <h4 class="text-primary">Ingresos</h4>
                                <?php echo "<h4 class='text-info'>" . $totalIngresosFactura . "€</h4>" ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <h4 class="text-primary">Nóminas</h4>
                                <?php echo "<h4 class='text-info'>" . $totalGastosNomina . "€</h4>" ?>
                            </div>
                        </div>  
                </div>
                
                <!-- Tabs de Clientes y Trabajos -->

                <div class="container">
                    <div class="row">     
                        <div class="tabbable-panel">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tabCli" data-toggle="tab"> Clientes</a>
                                </li>
                                <li>
                                    <a href="#tabTraI" data-toggle="tab"> Trabajos Iniciados</a>
                                </li>
                                <li>
                                    <a href="#tabTraF" data-toggle="tab"> Trabajos Finalizados</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabCli">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Clientes ingresados este mes</div>
                                              <?php

                                              $clienteList = $clienteController->getClientesIngresadosEsteMes();

                                                echo "<table id='cliMes' class='table table-striped table-bordered'>"
                                             . "<thead>"
                                                . "<tr>"
                                                   . "<th>ID</th>"
                                                   . "<th>DNI</th>"
                                                   . "<th>Nombre</th>"
                                                   . "<th>Apellidos</th>"
                                                   . "<th>Direccion</th>"
                                                   . "<th>Telefono</th>"
                                                   . "<th>Email</th>"
                                                   . "<th>Fecha Registro</th>"
                                                   . "<th>Contraseña</th>"
                                                . "</tr>"
                                             . "</thead>"
                                             . "<tbody>";

                                                foreach ($clienteList as $cliente) {

                                                 echo "<tr>";
                                                 echo "<td>" . $cliente->getIdCliente() . "</td>";
                                                 echo "<td>" . $cliente->getDni() . "</td>";
                                                 echo "<td>" . utf8_encode($cliente->getNombre()) . "</td>";
                                                 echo "<td>" . utf8_encode($cliente->getApellidos()) . "</td>";
                                                 echo "<td>" . utf8_encode($cliente->getDireccion()) . "</td>";
                                                 echo "<td>" . $cliente->getTelefono() . "</td>";
                                                 echo "<td>" . utf8_encode($cliente->getEmail()) . "</td>";
                                                 echo "<td>" . $cliente->getFechaRegistro() . "</td>";
                                                 echo "<td>" . $cliente->getContrasenya() . "</td>";
                                                 echo "</tr>";

                                             }

                                             echo "</tbody>"
                                                  . "</table>"
                                              ?>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabTraI">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Trabajos iniciados este mes</div>
                                              <?php

                                              $trabajosIniciadoMes = $trabajoController->getTrabajosIniciadosEsteMes();

                                                echo "<table id='traInMes' class='table table-bordered'>"
                                             . "<thead>"
                                                . "<tr>"
                                                   . "<th>ID</th>"
                                                   . "<th>Cliente</th>"
                                                   . "<th>Trabajador</th>"
                                                   . "<th>Valoración</th>"
                                                   . "<th>Factura</th>"
                                                   . "<th>Importe Total</th>"
                                                   . "<th>Dirección</th>"
                                                   . "<th>Estimación</th>"
                                                   . "<th>Gasto Total</th>"
                                                   . "<th>Fecha Inicio</th>"
                                                . "</tr>"
                                             . "</thead>"
                                             . "<tbody>";


                                                foreach ($trabajosIniciadoMes as $trabajoIniciadoMes) {

                                                 $cliente = $clienteController->getCliente($trabajoIniciadoMes->getFkIdCliente());
                                                 $empleado = $empleadoController->getEmpleado($trabajoIniciadoMes->getFkIdEmpleado());

                                                 echo "<tr>";
                                                 echo "<td>" . $trabajoIniciadoMes->getIdTrabajo() . "</td>";
                                                 echo "<td>" . $cliente->getDni(). "</td>";
                                                 echo "<td>" . $empleado->getNif() . "</td>";
                                                 echo "<td>" . $trabajoIniciadoMes->getValoracion() . "</td>";
                                                 echo "<td>" . $trabajoIniciadoMes->getFkIdFactura() . "</td>";
                                                 echo "<td>" . $trabajoIniciadoMes->getImporteTotal() . "€</td>";
                                                 echo "<td>" . utf8_encode($trabajoIniciadoMes->getDireccionLugar()) . "</td>";
                                                 echo "<td>" . $trabajoIniciadoMes->getEstimacionHoras() . " h</td>";
                                                 echo "<td>" . $trabajoIniciadoMes->getGastoTotal() . "€</td>";
                                                 echo "<td>" . $trabajoIniciadoMes->getFechaInicio() . "</td>";
                                                 echo "</tr>";

                                             }

                                             echo "</tbody>"
                                                  . "</table>"
                                              ?>
                                    </div>
                                </div>
                                                                                              
                                <div class="tab-pane" id="tabTraF">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Trabajos finalizados este mes</div>
                                              <?php

                                              $trabajosFinMes = $trabajoController->getTrabajosFinalizadosEsteMes();

                                                echo "<table id='traFinMes' class='table table-bordered'>"
                                             . "<thead>"
                                                . "<tr>"
                                                   . "<th>ID</th>"
                                                   . "<th>Cliente</th>"
                                                   . "<th>Trabajador</th>"
                                                   . "<th>Valoración</th>"
                                                   . "<th>Factura</th>"
                                                   . "<th>Importe Total</th>"
                                                   . "<th>Dirección</th>"
                                                   . "<th>Estimación</th>"
                                                   . "<th>Gasto Total</th>"
                                                   . "<th>Fecha Fin</th>"
                                                . "</tr>"
                                             . "</thead>"
                                             . "<tbody>";

                                                foreach ($trabajosFinMes as $trabajoFinMes) {

                                                 $cliente = $clienteController->getCliente($trabajoFinMes->getFkIdCliente());
                                                 $empleado = $empleadoController->getEmpleado($trabajoFinMes->getFkIdEmpleado());

                                                 echo "<tr>";
                                                 echo "<td>" . $trabajoFinMes->getIdTrabajo() . "</td>";
                                                 echo "<td>" . $cliente->getDni(). "</td>";
                                                 echo "<td>" . $empleado->getNif() . "</td>";
                                                 echo "<td>" . $trabajoFinMes->getValoracion() . "</td>";
                                                 echo "<td>" . $trabajoFinMes->getFkIdFactura() . "</td>";
                                                 echo "<td>" . $trabajoFinMes->getImporteTotal() . "€</td>";
                                                 echo "<td>" . utf8_encode($trabajoFinMes->getDireccionLugar()) . "</td>";
                                                 echo "<td>" . $trabajoFinMes->getEstimacionHoras() . " h</td>";
                                                 echo "<td>" . $trabajoFinMes->getGastoTotal() . "€</td>";
                                                 echo "<td>" . $trabajoFinMes->getFechaFin() . "</td>";
                                                 echo "</tr>";

                                             }

                                             echo "</tbody>"
                                                  . "</table>"
                                              ?>
                                    </div>

                                    <nav>
                                        <ul class="pagination" name="paginationTrabajosFinalizados">
                                          <li>
                                            <a href="#" aria-label="Previous">
                                              <span aria-hidden="true">&laquo;</span>
                                            </a>
                                          </li>
                                          <li><a href="#">1</a></li>
                                          <li><a href="#">2</a></li>
                                          <li><a href="#">3</a></li>
                                          <li><a href="#">4</a></li>
                                          <li><a href="#">5</a></li>
                                          <li>
                                            <a href="#" aria-label="Next">
                                              <span aria-hidden="true">&raquo;</span>
                                            </a>
                                          </li>
                                        </ul>
                                      </nav>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
             

<!-- Header -->
<a name="tesoreriap"></a>
<div class="content-section-a">
<h2 class="section-heading">Tesoreria</h2>

    <div class="container">
                    <div class="row">     
                        <div class="tabbable-panel">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a href="#tabNom" data-toggle="tab"> Nominas</a>
                                </li>
                                <li>
                                    <a href="#tabFac" data-toggle="tab"> Facturas</a>
                                </li>
                                <li>
                                    <a href="#tabTes" data-toggle="tab"> Tesoreria</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabNom">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Nominas</div>
                                        <?php
                                                include_once '../../app/controllers/NominaController.php';
                                                include_once '../../app/models/Nomina.php';

                                                $nominaController = new NominaController();
                                                $nominaList = $nominaController->getListaNominas();

                                                echo "<table id='nomDT' class='table table-bordered'>"
                                                     . "<thead>"
                                                        . "<tr>"
                                                           . "<th>ID</th>"
                                                           . "<th>Empleado</th>"
                                                           . "<th>Fecha</th>"
                                                           . "<th>Nomina</th>"
                                                           . "<th>Pagada</th>"
                                                        . "</tr>"
                                                     . "</thead>"
                                                     . "<tbody>";

                                                     foreach ($nominaList as $nomina) {

                                                         echo "<tr>";
                                                         echo "<td>" . $nomina->getIdNomina() . "</td>";
                                                         echo "<td>" . $nomina->getFkIdEmpleado() . "</td>";
                                                         echo "<td>" . $nomina->getFechaMes() . "</td>";
                                                         echo "<td>" . $nomina->getNominaTotal() . "</td>";
                                                         echo "<td>" . $nomina->getPagada() . "</td>";
                                                         echo "</tr>";

                                                     }

                                                     echo "</tbody>"
                                                          . "</table>"
                                                ?>                                       
                                    </div>
                                </div>

                                
                                <div class="tab-pane" id="tabFac">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Facturas</div>
                                        
                                        <?php
                                                    include_once '../../app/controllers/FacturaController.php';
                                                    include_once '../../app/models/Factura.php';

                                                    $facturaController = new FacturaController();
                                                    $facturaList = $facturaController->getListaFacturas();

                                                    echo "<table id='facDT' class='table table-bordered'>"
                                                         . "<thead>"
                                                            . "<tr>"
                                                               . "<th>ID</th>"
                                                               . "<th>Fecha</th>"
                                                               . "<th>Importe Total</th>"
                                                               . "<th>Pagada</th>"
                                                            . "</tr>"
                                                         . "</thead>"
                                                         . "<tbody>";

                                                         foreach ($facturaList as $factura) {

                                                             echo "<tr>";
                                                             echo "<td>" . $factura->getIdFactura() . "</td>";
                                                             echo "<td>" . $factura->getMes() . "</td>";
                                                             echo "<td>" . $factura->getTotalImporte() . "</td>";
                                                             echo "<td>" . $factura->getPagada() . "</td>";
                                                             echo "</tr>";

                                                         }

                                                         echo "</tbody>"
                                                              . "</table>"
                                                    ?>                                                                              
                                    </div>
                                </div>
                                                                      
                                                                                              
                                <div class="tab-pane" id="tabTes">
                                    <div class="panel panel-primary">
                                        <div class="panel-heading">Tesoreria</div>
                                        
                                        <?php
                                                    include_once '../../app/controllers/TesoreriaController.php';
                                                    include_once '../../app/models/Tesoreria.php';

                                                    $tesoreriaController = new TesoreriaController();
                                                    $tesoreriaList = $tesoreriaController->getListaTesoreria();

                                                    echo "<table id='tesDT' class='table table-bordered'>"
                                                         . "<thead>"
                                                            . "<tr>"
                                                               . "<th>ID</th>"
                                                               . "<th>Tipo</th>"
                                                               . "<th>ID Factura</th>"
                                                               . "<th>ID Compra</th>"
                                                               . "<th>ID Nomina</th>"
                                                               . "<th>Fecha Importe</th>"
                                                               . "<th>Ingresado</th>"
                                                               . "<th>Importe</th>"
                                                            . "</tr>"
                                                         . "</thead>"
                                                         . "<tbody>";

                                                         $tipoTesoreria;
                                                         foreach ($tesoreriaList as $tesoreria) {

                                                             echo "<tr>";
                                                             echo "<td>" . $tesoreria->getIdTesoreria() . "</td>";

                                                             if ($tesoreria->getfkIdTipoTesoreria() == '1') {
                                                                 $tipoTesoreria = 'Factura';
                                                             } else if ($tesoreria->getfkIdTipoTesoreria() == '2') {
                                                                 $tipoTesoreria = 'Compra';
                                                             } else if ($tesoreria->getfkIdTipoTesoreria() == '3') {
                                                                 $tipoTesoreria = 'Nomina';
                                                             } else { $tipoTesoreria = 'Otros'; }

                                                             echo "<td>" . $tipoTesoreria . "</td>";
                                                             echo "<td>" . $tesoreria->getfkIdFactura() . "</td>";
                                                             echo "<td>" . $tesoreria->getFkIdCompra() . "</td>";
                                                             echo "<td>" . $tesoreria->getFkIdNomina() . "</td>";
                                                             echo "<td>" . $tesoreria->getFechaImporte() . "</td>";
                                                             echo "<td>" . $tesoreria->getIngresado() . "</td>";
                                                             echo "<td>" . $tesoreria->getImporte() . "</td>";
                                                             echo "</tr>";

                                                         }

                                                         echo "</tbody>"
                                                              . "</table>"
                                                    ?>                                                                              
                                    </div>
                                </div>                                 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

</div>
    
<a name="pagnominas"></a>
<div class="content-section-a">
    
    <div class="container">
        <h2 class="section-heading">Nominas</h2>
        <div class="row">
            <?php
                echo "<button type='submit' onclick='pagarNominas()' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-floppy-saved'</span> Pagar Nominas </button>";
            ?>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li>
                        <a href="../../index.php">Inicio</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="../../index.php#about">Nosotros</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="../../index.php#services">Servicios</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="../../index.php#contact">Contacto</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright © iCleaning 2015. Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="../../public/js/jquery.js"></script>

<script src="../../public/lolibox/dist/js/lobibox.min.js"></script>

<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="../../public/js/bootstrap.min.js"></script>

<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
 
<script>
    $(document).ready(function() {
        $('#cliMes').dataTable();
        $('#traInMes').dataTable();
        $('#traFinMes').dataTable();
        $('#facDT').dataTable();
        $('#nomDT').dataTable();
        $('#tesDT').dataTable();
    } );
    
    function pagarNominas() {
                    
                        
                        $.ajax({
                            type: "POST",
                            url: "../../app/ajax/ajax_pagarnominas.php",
                            data: { },
                            dataType: "html",
                            error: function() {
                                alert("error petición ajax");
                            },
                            success: function(data) {

                                Lobibox.notify('success', {
                                    title: 'Completado',
                                    msg: 'Nominas pagadas correctamente'
                                });
                            }
                        });                                                       
                                                  
    }
    
</script>

</body>

</html>
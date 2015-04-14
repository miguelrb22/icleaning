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
                    <a href="#nominas">Nominas</a>
                </li>
                <li>
                    <a href="#facturas">Facturas</a>
                </li>
                <li>
                    <a href="#tesoreria">Tesoreria</a>
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
                                <h4 class="text-primary">Total de Empleados</h4>
                                <?php echo "<h4 class='text-info'>" . $totalEmpleados . "</h4>" ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <h4 class="text-primary">Total de Trabajos</h4>
                                <?php echo "<h4 class='text-info'>" . $totalTrabajos . "</h4>" ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <h4 class="text-primary">Ingresos</h4>
                                <?php echo "<h4 class='text-info'>" . $totalIngresosFactura . "€</h4>" ?>
                            </div>
                            <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                                <h4 class="text-primary">Gastos de Nóminas</h4>
                                <?php echo "<h4 class='text-info'>" . $totalGastosNomina . "€</h4>" ?>
                            </div>
                        </div>  
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Clientes ingresados este mes</div>
                          <?php
                          
                          $clienteList = $clienteController->getClientesIngresadosEsteMes();
                          
                            echo "<table class='table table-bordered'>"
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
                             echo "<td>" . $cliente->getNombre() . "</td>";
                             echo "<td>" . $cliente->getApellidos() . "</td>";
                             echo "<td>" . $cliente->getDireccion() . "</td>";
                             echo "<td>" . $cliente->getTelefono() . "</td>";
                             echo "<td>" . $cliente->getEmail() . "</td>";
                             echo "<td>" . $cliente->getFechaRegistro() . "</td>";
                             echo "<td>" . $cliente->getContrasenya() . "</td>";
                             echo "</tr>";
                             
                         }
                          
                         echo "</tbody>"
                              . "</table>"
                          ?>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Trabajos iniciados este mes</div>
                          <?php
                          
                          $trabajosIniciadoMes = $trabajoController->getTrabajosIniciadosEsteMes();
                          
                            echo "<table class='table table-bordered'>"
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
                             
                             echo "<tr>";
                             echo "<td>" . $trabajoIniciadoMes->getIdTrabajo() . "</td>";
                             echo "<td>" . $trabajoIniciadoMes->getFkIdCliente() . "</td>";
                             echo "<td>" . $trabajoIniciadoMes->getFkIdEmpleado() . "</td>";
                             echo "<td>" . $trabajoIniciadoMes->getValoracion() . "</td>";
                             echo "<td>" . $trabajoIniciadoMes->getFkIdFactura() . "</td>";
                             echo "<td>" . $trabajoIniciadoMes->getImporteTotal() . "€</td>";
                             echo "<td>" . $trabajoIniciadoMes->getDireccionLugar() . "</td>";
                             echo "<td>" . $trabajoIniciadoMes->getEstimacionHoras() . " h</td>";
                             echo "<td>" . $trabajoIniciadoMes->getGastoTotal() . "€</td>";
                             echo "<td>" . $trabajoIniciadoMes->getFechaInicio() . "</td>";
                             echo "</tr>";
                             
                         }
                          
                         echo "</tbody>"
                              . "</table>"
                          ?>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading">Trabajos finalizados este mes</div>
                          <?php
                          
                          $trabajosFinMes = $trabajoController->getTrabajosFinalizadosEsteMes();
                          
                            echo "<table class='table table-bordered'>"
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
                             
                             echo "<tr>";
                             echo "<td>" . $trabajoFinMes->getIdTrabajo() . "</td>";
                             echo "<td>" . $trabajoFinMes->getFkIdCliente() . "</td>";
                             echo "<td>" . $trabajoFinMes->getFkIdEmpleado() . "</td>";
                             echo "<td>" . $trabajoFinMes->getValoracion() . "</td>";
                             echo "<td>" . $trabajoFinMes->getFkIdFactura() . "</td>";
                             echo "<td>" . $trabajoFinMes->getImporteTotal() . "€</td>";
                             echo "<td>" . $trabajoFinMes->getDireccionLugar() . "</td>";
                             echo "<td>" . $trabajoFinMes->getEstimacionHoras() . " h</td>";
                             echo "<td>" . $trabajoFinMes->getGastoTotal() . "€</td>";
                             echo "<td>" . $trabajoFinMes->getFechaFin() . "</td>";
                             echo "</tr>";
                             
                         }
                          
                         echo "</tbody>"
                              . "</table>"
                          ?>
                </div>
    </div>
    <!-- /.container -->

</div>

<!-- Header -->
<a name="nominas"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Nominas</h2>
                
                <div class="form-group">
                            <div class="input-group">
                                <select class="selectpicker form-control" data-live-search="true"
                                        title="Selecciona una opción" name="nominaForm">
                                    <option value="" disabled selected>Elige una opcion</option>
                                    <option value="0">Mes Actual</option>
                                    <option value="1">4 Meses</option>
                                    <option value="2">8 Meses</option>
                                    <option value="3">Todos</option>
                                </select>
                            </div>
                    </div>
                
                <!-- Nomina Table -->
                <div class="table-responsive">
                    <?php
                    include_once '../../app/controllers/NominaController.php';
                    include_once '../../app/models/Nomina.php';

                    $nominaController = new NominaController();
                    $nominaList = $nominaController->getListaNominas();
                    
                    echo "<table class='table table-bordered'>"
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
    </div>
    <!-- /.container -->

</div>

<a name="facturas"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Facturas</h2>
                
                <div class="form-group">
                            <div class="input-group">
                                <select class="selectpicker form-control" data-live-search="true"
                                        title="Selecciona una opción" name="facturasForm">
                                    <option value="" disabled selected>Elige una opcion</option>
                                    <option value="0">Mes Actual</option>
                                    <option value="1">4 Meses</option>
                                    <option value="2">8 Meses</option>
                                    <option value="3">Todos</option>
                                </select>
                            </div>
                    </div>
                
                <!-- Factura Table -->
                <div class="table-responsive">
                    <?php
                    include_once '../../app/controllers/FacturaController.php';
                    include_once '../../app/models/Factura.php';

                    $facturaController = new FacturaController();
                    $facturaList = $facturaController->getListaFacturas();
                    
                    echo "<table class='table table-bordered'>"
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
    </div>
    <!-- /.container -->

</div>

<a name="tesoreria"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Tesoreria</h2>
                
                <div class="form-group">
                            <div class="input-group">
                                <select class="selectpicker form-control" data-live-search="true"
                                        title="Selecciona una opción" name="tesoreriaForm">
                                    <option value="" disabled selected>Elige una opcion</option>
                                    <option value="0">Mes Actual</option>
                                    <option value="1">4 Meses</option>
                                    <option value="2">8 Meses</option>
                                    <option value="3">Todos</option>
                                </select>
                            </div>
                    </div>
                
                <!-- Tesoreria Table -->
                <div class="table-responsive">
                    <?php
                    include_once '../../app/controllers/TesoreriaController.php';
                    include_once '../../app/models/Tesoreria.php';

                    $tesoreriaController = new TesoreriaController();
                    $tesoreriaList = $tesoreriaController->getListaTesoreria();
                    
                    echo "<table class='table table-bordered'>"
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
    <!-- /.container -->

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

<!-- Bootstrap Core JavaScript -->
<script src="../../public/js/bootstrap.min.js"></script>

</body>

</html>
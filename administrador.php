<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCleaning</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="css/landing.css" rel="stylesheet">

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
            <a class="navbar-brand topnav" href="index.php">iCleaning</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
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
<a name="nominas"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Nominas</h2>
                
                <!-- Nomina Table -->
                <div class="table-responsive">
                    <?php
                    include_once 'php/controllers/NominaController.php';
                    include_once 'php/models/Nomina.php';

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
                
                <!-- Nomina Table -->
                <div class="table-responsive">
                    <?php
                    include_once 'php/controllers/FacturaController.php';
                    include_once 'php/models/Factura.php';

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
                
                <!-- Nomina Table -->
                <div class="table-responsive">
                    <?php
                    include_once 'php/controllers/TesoreriaController.php';
                    include_once 'php/models/Tesoreria.php';

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
                        <a href="index.php">Inicio</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="index.php#about">Nosotros</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="index.php#services">Servicios</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="index.php/#contact">Contacto</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright © iCleaning 2015. Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
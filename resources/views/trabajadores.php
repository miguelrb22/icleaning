<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>iCleaning</title>

        <!-- Bootstrap CSS -->
        <link href="../../public/bootstrap/css/bootstrap.min.css" rel="stylesheet">


        <!-- CSS -->

        <!-- Fonts -->
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
        <style type="text/css">

            html {
                position: relative;
                min-height: 100%;
            }
            body {
                /* Margin bottom by footer height */
                margin-bottom: 60px;
            }
            .footer {
                position: absolute;
                bottom: 0;
                width: 100%;
                /* Set the fixed height of the footer here */
                background-color: #f5f5f5;
                margin-top: 30px;
            }


            /* Custom page CSS
            -------------------------------------------------- */
            /* Not required for template or sticky footer method. */

            body > .container {
                padding: 60px 15px 0;
            }
            .container .text-muted {
                margin: 20px 0;
            }

            .footer > .container {
                padding-right: 15px;
                padding-left: 15px;
            }

        </style>
    </head>

    <body>

        <!-- Fixed navbar -->
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
                            <a href=" http://localhost/icleaning/ ">Volver</a>
                        </li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>


        <?php
        error_reporting(E_ALL ^ E_NOTICE);

        $path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

        require_once($path . '/icleaning/app/database/DBAccess.php');

        $zona = mysql_real_escape_string($_POST['zona']);
        $especialidad = mysql_real_escape_string($_POST['especialidad']);
        $fecha = mysql_real_escape_string($_POST['fecha']);
        $dbAccess = new DBAccess();

        $aux2 = "SELECT * FROM empleado where idespecialidad =" . $especialidad . " and idzona = " . $zona . " and idempleado not in (select idempleado from ocupacion where fecha_ocupado='" . $fecha . "')";
        $aux = "SELECT e.* , s.cobro_hora FROM empleado e join especialidad s on e.idespecialidad=s.idespecialidad 
                where e.idespecialidad =$especialidad  and idzona =  $zona  
                 and idempleado not in (select idempleado from ocupacion where fecha_ocupado='$fecha ')";
        $query = $dbAccess->getSelect($aux);
        ?>


        <!-- Begin page content -->
        <div class="container">
            <div class="page-header">
                <h2>Resultados de búsqueda</h2>
            </div>

            <div class="row">


<?php
foreach ($query as $q) {

    echo '<div class="col-lg-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <i class="fa fa-info-circle"></i> ' . $q['nombre'] . ' 
                </div>
                <div class="panel-body">

                    <div class="row">

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

                        <img src="../../public/images/carnet.jpg" class="img-responsive img-circle" width="80" height="80">
                    </div>

                        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                            <p> ' . $q['anyos_experiencia'] . ' años de experiencia en el sector. Precio por hora '.$q['cobro_hora'].' €</p>
                        </div> 
                        </div>




                </div>

                <div class="panel-footer" style="height: 50px">
                    <button class="btn btn-success pull-right"> Contratar</button>
                </div>

            </div>
        </div>';
}
?>






            </div>
        </div>







        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="list-inline" style="padding: 10px">
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
                    </div>
                </div>
            </div>
        </footer>



        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- jQuery -->
        <script src="../../public/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="../../public/js/bootstrap.min.js"></script>

        <script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>


    </body></html>
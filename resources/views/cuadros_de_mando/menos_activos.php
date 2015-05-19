<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

if ( (!isset($_SESSION['name'])) || $_SESSION['activa'] != 1 || $_SESSION['admin']  != 1){

    header('location: ../../index.php');
}


$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

require_once( $path.'/icleaning/app/database/DBAccess.php');

$bd = new DBAccess();
?>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCleaning</title>

    <style>

        #tbodyCli,#todosEmp{

            font-size: 11px;
        }
    </style>

    <!-- Bootstrap CSS -->
    <link href="../../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="../../../public/css/landing.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <script src="../../../public/js/Chart.min.js"></script>



</head>

<body>

<div class="container">
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
                <a class="navbar-brand topnav" href="../../../index.php">iCleaning</a>
            </div>

        </div>
        <!-- /.container -->
    </nav>
</div>
<br>
<br>
<br>

<div class="container-fluid">
    <div class="row">

        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-2">
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"> <form action="mas_activos.php"> <button type ="submit" style="margin-top: 5%" class="btn btn-danger">Trabajadores más activos&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></form></div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"> <form action="menos_activos.php" ><button type ="submit" style="margin-top: 5%" class="btn btn-danger">Trabajadores menos activos&nbsp;&nbsp;&nbsp;</button></form></div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"> <form action="mejor_valorados.php" ><button type ="submit" style="margin-top: 5%" class="btn btn-warning">Trabajadores mejor valorados</button></form></div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"> <form action="peor_valorados.php" ><button type ="submit" style="margin-top: 5%" class="btn btn-warning">Trabajadores peor valorados&nbsp;</button></form></div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"> <form action="zonas_mas_rentables.php" ><button type ="submit" style="margin-top: 5%" class="btn btn-success">zonas más rentables&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></form></div>
            <div class="col col-lg-12 col-md-12 col-sm-12 col-xs-12"> <form action="zonas_menos_rentables.php" ><button type ="submit" style="margin-top: 5%" class="btn btn-success">zonas menos rentables&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button></form></div>

        </div>

        <div class="col col-xs-12 col-sm-12 col-md-9 col-lg-10">


            <div style="width: 65%; margin-left: 5%">
                <canvas id="canvas" height="450" width="600"></canvas>
            </div>
        </div>

        <script src="../../../public/js/jquery.js"></script>
        <script src="../../../public/js/bootstrap.min.js"></script>



        <script type="text/javascript">
            var valores = <?php echo json_encode($valores) ?>;
            var nombres = <?php echo json_encode($nombre) ?>;

        </script>
        <script>


            $( document ).ready(function() {




                <?php


 $aux = $bd->getSelect('SELECT count(t.idempleado) as total,t.idempleado, e.nombre from trabajo t,empleado e where t.idempleado = e.idempleado group by t.idempleado, e.nombre order by total asc limit 10');

 $valores = array();
 $nombre = array();

 foreach($aux as $a){

     array_push($valores ,$a['total']);
     array_push ($nombre, $a['nombre'].' '.$a['idempleado']);
 }

 ?>
                var valores = <?php echo json_encode($valores) ?>;
                var nombres = <?php echo json_encode($nombre) ?>;

                var barChartData = {
                    labels : nombres,
                    datasets : [
                        {
                            fillColor : "rgba(151,187,205,0.5)",
                            strokeColor : "rgba(151,187,205,0.8)",
                            highlightFill : "rgba(151,187,205,0.75)",
                            highlightStroke : "rgba(151,187,205,1)",
                            data : valores
                        }
                    ]

                }


                var ctx = document.getElementById("canvas").getContext("2d");
                window.myBar = new Chart(ctx).Bar(barChartData, {
                    responsive : true
                });




            });



        </script>

</body>

</html>

<html lang="es" xmlns="http://www.w3.org/1999/html">

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
                    <a href="#perfemp">Perfil Empleado</a>
                </li>
                <li>
                    <a href="#contemp">Contratar Empleado</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<?php

$path = substr($_SERVER['DOCUMENT_ROOT'], 0, 15);

require_once($path . '/icleaning/app/database/DBAccess.php');

$filtro = mysqli_connect("bbdd.dlsi.ua.es:3306","gi_jsj11",".jsj11.","gi_telelimpieza");

$idEmpleado = $_GET['id'];
$fecha = $_GET['fecha'];

include_once '../../app/controllers/ClienteController.php';
include_once '../../app/models/Cliente.php';
        
include_once '../../app/controllers/TrabajoController.php';
include_once '../../app/models/Trabajo.php';

include_once '../../app/controllers/EmpleadoController.php';
include_once '../../app/models/Trabajador.php';
        
include_once '../../app/controllers/EspecialidadController.php';
include_once '../../app/models/Especialidad.php';
        
include_once '../../app/controllers/ZonaController.php';
include_once '../../app/models/Zona.php';

session_start();

$emailCliente = $_SESSION['name'];

$clienteController = new ClienteController();
$cliente = $clienteController->getClienteEmail($emailCliente);

$trabajadorController = new EmpleadoController();
$trabajador = $trabajadorController->getEmpleado($idEmpleado);

//Especialida del trabajador
        $especialidadController = new EspecialidadController();
        $especialidad = $especialidadController->getEspecialidad($trabajador->getFkIdEspecialidad());
        
//Zona del trabajador
        $zonaController = new ZonaController();
        $zona = $zonaController->getZona($trabajador->getFkIdZona());

?>

<a name="perfemp"></a>
<div class="content-section-a">

    

    <div class="container">

        <div class="clearfix"></div>
        <h2 class="section-heading">Perfil Empleado</h2>

        <?php
        
        $idTrabajador = $trabajador->getIdEmpleado();
        $nif = $trabajador->getNif();
        $apellidos = $trabajador->getApellidos();
        $nombre = $trabajador->getNombre();
        $telefono = $trabajador->getTelefono();
        $email = $trabajador->getEmail();
        $numCuenta = $trabajador->getNumeroCuenta();
        $anyosExperiencia = $trabajador->getAnyosExperiencia();
        $fechaUltTrabajo = $trabajador->getFechaUltimoTrabajo();
        $horasTrabajadas = $trabajador->getHorasTrabajadas();
        $contrasenya = $trabajador->getContrasenya();
        $foto = $trabajador->getFotoEmpleado();
        $descripcion = $trabajador->getDescripcion();
        $valoracion = $trabajador->getValoracion();

        ?>

        <div class="row">
            <div class="col-xs-4 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="http://www.velaporti.com/images/no_perfil_M.png" class="img-rounded" alt="imagen" width="174" height="50">
                </a>

            </div>

            <br />
            <br />

            <div class="col-xs-4 col-md-2">
                <h4 class = "col-sm-2 control-label" for="formGroup">Valoracion: </h4>

                <br />
                <br />

                <?php

                if($valoracion == 0){

                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                }
                else if($valoracion == 1){
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                }
                else if($valoracion == 2){
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";

                }
                else if($valoracion == 3){
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";

                }
                else if($valoracion == 4){
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star-empty'> </text>";


                }
                else if ($valoracion == 5){
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                    echo " <span class='glyphicon glyphicon-star'> </text> ";
                }
                ?>

            </div>
        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">

                <form class = "form-horizontal"> <br />

                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Nombre: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo utf8_encode( $nombre) ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Telefono: </label>
                            <div class="input-group col-sm-2">
                                <span class = "input-group-addon"><span class = "glyphicon glyphicon-phone"></span></span>
                                <input class="form-control" type="text" name="traTelefono" id="traTelefono" value="<?php echo $telefono ?>" disabled>
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Apellidos: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo utf8_encode( $apellidos )?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Email: </label>
                            <div class="input-group col-sm-3">
                                <span class = "input-group-addon">@</span>
                                <input class="form-control" type="text" name="traEmail" id="traEmail" value="<?php echo utf8_encode($email) ?>" disabled>
                            </div>
                        </div>

                    </div><br />


                    <div class="form-group">
                        
                        <label class = "col-sm-2 control-label" for="formGroup">Especialidad: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo utf8_encode($especialidad->getTipoEspecialidad()) ?>" disabled>
                        </div>
                        
                        <label class = "col-sm-2 control-label" for="formGroup">Zona: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo utf8_encode($zona->getNombre()) ?>" disabled>
                        </div>

                    </div><br />


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Años experiencia: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo $anyosExperiencia ?>" disabled>
                        </div>

                    </div> <br />
                    
                </form>
            </div>
        </div>
        
<a name="contemp"></a>
<div class="content-section-a">

    

    <div class="container">

        <div class="clearfix"></div>
        <h2 class="section-heading">Contratar Empleado</h2>

        <?php
        
        $nombreCliente = $cliente->getNombre();
        $dniCliente = $cliente->getDni();
        $idCliente = $cliente->getIdCliente();
        
        $eurosHora = $especialidad->getCobroHora();

        ?>

        <div class="panel panel-primary">
            <div class="panel-heading">Datos Contratacion</div>
            <div class="panel-body">

                <form class = "form-horizontal"> <br />             
                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">ID Cliente: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="idcliente" name="idcliente" value="<?php echo $idCliente ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Nombre: </label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type="text" name="nombrecliente" id="nombrecliente" value="<?php echo $nombreCliente ?>" disabled>
                            </div>
                        </div>

                    </div><br />


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Total de horas: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="totalhoras" name="totalhoras" value="" >
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Calle: </label>
                            <div class="input-group col-sm-3">
                                <input class="form-control" type="text" name="calle" id="calle" value="" >
                            </div>
                        </div>
                        

                    </div><br />
                    
                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Euros por hora: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="euroshora" name="euroshora" value="<?php echo $eurosHora ?>" disabled>
                        </div>
                        
                        <label class = "col-sm-2 control-label" for="formGroup">Fecha: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="fechaT" name="fechaT" value="<?php echo $fecha ?>" disabled>
                        </div>

                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup"></label>
                        <div class="col-sm-4">
                            <?php
                                echo "<button type='submit' onclick='contratarTrabajador($idEmpleado)' class='btn btn-success btn-lg'>Contratar </button>";
                            ?>
                        </div>
                    </div>
                    
                </form>
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

function contratarTrabajador(idTrabajador) {
                                     
                        var idCliente = $('#idcliente').val();
                        var calle = $('#calle').val();
                        var traHoras = $('#totalhoras').val();
                        var traFecha = $('#fechaT').val();
                                     
                        $.ajax({
                            type: "POST",
                            url: "../../app/ajax/ajax_contratarempleado.php",
                            data: { idtrabajador: idTrabajador, idcliente: idCliente, calle: calle, trahoras: traHoras, fecha: traFecha },
                            dataType: "html",
                            success: function(data) {
                            }
                        });  
                        
        window.location.replace("http://localhost/icleaning/index.php");
        window.location.reload();
                                                  
    }

</script>


</body>
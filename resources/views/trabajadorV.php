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
                    <a href="#trabini">Trabajos Iniciados</a>
                </li>
                <li>
                    <a href="#trabfin">Trabajos Finalizados</a>                                     
                </li>
                <li>
                    <a href="#infgen">Perfil Trabajador</a> 
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

    <?php
        include_once '../../app/controllers/EmpleadoController.php';
        include_once '../../app/models/Trabajador.php';
        
        include_once '../../app/controllers/TrabajoController.php';
        include_once '../../app/models/Trabajo.php';
        
        include_once '../../app/controllers/EspecialidadController.php';
        include_once '../../app/models/Especialidad.php';
        
        include_once '../../app/controllers/ZonaController.php';
        include_once '../../app/models/Zona.php';

        $empleadoController = new EmpleadoController();
        $trabajoController = new TrabajoController();

        session_start();
        
        $trabajador = $empleadoController->getEmpleadoEmail($_SESSION['name']);
        
        //Trabajos iniciados (pero no finalizados) por este empleado
        $listaTrabajosIniciados = $trabajoController->getListaTrabajosIniciadosPorEmpleado($trabajador->getIdEmpleado());
        
        //Trabajos finalizados por este empleado
        $listaTrabajosFinalizados = $trabajoController->getListaTrabajosFinalizadosPorEmpleado($trabajador->getIdEmpleado());
        
        //Especialida del trabajador
        $especialidadController = new EspecialidadController();
        $especialidad = $especialidadController->getEspecialidad($trabajador->getFkIdEspecialidad());
        
        //Zona del trabajador
        $zonaController = new ZonaController();
        $zona = $zonaController->getZona($trabajador->getFkIdZona());
        
    ?>

<!-- Header -->
<a name="trabini"></a>
<div class="content-section-a">
    
    <div class="container">
        
        <div class="trabajoinicial"></div>
        <h2 class="section-heading">Trabajos Iniciados</h2>
        
        <div class="tab-content">
            
            <?php
                echo "<table id='tableTraIn' class='table table-striped table-bordered'>"
                     . "<thead>"
                     . "<tr>"
                        . "<th>ID</th>"
                        . "<th>Importe Total</th>"
                        . "<th>Direccion</th>"
                        . "<th>Estimacion</th>"
                        . "<th>Gasto Total</th>"
                        . "<th>Importe Recibido</th>"
                        . "<th>Fecha Inicio</th>"
                     . "</tr>"
                     . "</thead>"
                     . "<tbody>";
                
                foreach ($listaTrabajosIniciados as $trabajo) {
                    
                    echo "<tr>";
                    echo "<td>" . $trabajo->getIdTrabajo() . "</td>";
                    echo "<td>" . $trabajo->getImporteTotal() . "</td>";
                    echo "<td>" . $trabajo->getDireccionLugar() . "</td>";
                    echo "<td>" . $trabajo->getEstimacionHoras() . "</td>";
                    echo "<td>" . $trabajo->getGastoTotal() . "</td>";
                    echo "<td>" . $trabajo->getImporteRecibido() . "</td>";
                    echo "<td>" . $trabajo->getFechaInicio() . "</td>";
                    echo "</tr>";
                }
                
                echo "</tbody>"
                    . "</table>";
            ?>
            
        </div>
        
    </div>
    
</div>

<a name="trabfin"></a>
<div class="content-section-a">
    
    <div class="container">
        
        <div class="trabajofinal"></div>
        <h2 class="section-heading">Trabajos Finalizados</h2>
        
        <div class="tab-content">
            
            <?php
                echo "<table id='tableTraFn' class='table table-striped table-bordered'>"
                     . "<thead>"
                     . "<tr>"
                        . "<th>ID</th>"
                        . "<th>Importe Total</th>"
                        . "<th>Direccion</th>"
                        . "<th>Estimacion</th>"
                        . "<th>Gasto Total</th>"
                        . "<th>Importe Recibido</th>"
                        . "<th>Fecha Fin</th>"
                     . "</tr>"
                     . "</thead>"
                     . "<tbody>";
                
                foreach ($listaTrabajosFinalizados as $trabajo) {
                    
                    echo "<tr>";
                    echo "<td>" . $trabajo->getIdTrabajo() . "</td>";
                    echo "<td>" . $trabajo->getImporteTotal() . "</td>";
                    echo "<td>" . $trabajo->getDireccionLugar() . "</td>";
                    echo "<td>" . $trabajo->getEstimacionHoras() . "</td>";
                    echo "<td>" . $trabajo->getGastoTotal() . "</td>";
                    echo "<td>" . $trabajo->getImporteRecibido() . "</td>";
                    echo "<td>" . $trabajo->getFechaFin() . "</td>";
                    echo "</tr>";
                }
                
                echo "</tbody>"
                    . "</table>";
            ?>
            
        </div>
        
    </div>
    
</div>


<a name="infgen"></a>
<div class="content-section-a">

    

    <div class="container">

        <div class="clearfix"></div>
        <h2 class="section-heading">Perfil Trabajador</h2>

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

            <button type="button" class="btn btn-info btn-group-sm"> Cambiar imagen </button>

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
                                <input class="form-control" type="text" name="traTelefono" id="traTelefono" value="<?php echo $telefono ?>">
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
                                <input class="form-control" type="text" name="traEmail" id="traEmail" value="<?php echo utf8_encode($email) ?>">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">NIF: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo $nif ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Numero de cuenta: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="traCuenta" id="traCuenta" value="<?php echo $numCuenta ?>">
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

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Horas trabajadas: </label>
                            <div class="col-sm-2">
                                <input class="form-control" type="text" id="formGroup" value="<?php echo $horasTrabajadas ?>" disabled>
                            </div>
                        </div>

                    </div> <br />


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Fecha ultimo trabajo: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo $fechaUltTrabajo?>" disabled>
                        </div>
                    </div> <br />


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup">Descripcion</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="6" name="traDescripcion" id="traDescripcion" ><?php echo utf8_encode($descripcion) ?></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Cambiar contraseña: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="traPass" name="traPass">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Confirmar contraseña: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="traPassConf" id="traPassConf">
                        </div>
                    </div> <br />


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup"></label>
                        <div class="col-sm-4">
                            <?php
                                echo "<button type='submit' onclick='modificarTrabajador($idTrabajador)' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-floppy-saved'</span> Guardar </button>";
                            ?>
                            <button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove-circle"</span> Cancelar </button>
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
    $(document).ready(function() {
       $('#tableTraIn').dataTable();
       $('#tableTraFn').dataTable();
    });
    
    function modificarTrabajador(idTrabajador) {
                    
                    var traTelefono = $('#traTelefono').val();
                    var traEmail = $('#traEmail').val();
                    var traCuenta = $('#traCuenta').val();
                    var traDescripcion = $('#traDescripcion').val();
                    var traPass = $('#traPass').val();
                    var traPassConf = $('#traPassConf').val();
                    
                    if (traPass === '' || traPassConf === '') {
                        alert("Contraseña vacia");
                    }
                    else if (traPass !== traPassConf) {
                        alert("No coinciden las contraseñas");
                    }
                    else {
                        
                        $.ajax({
                            type: "POST",
                            url: "../../app/ajax/ajax_modificartrabajador.php",
                            data: { idtrabajador: idTrabajador, tratelefono: traTelefono, traemail: traEmail, tracuenta: traCuenta, tradescripcion: traDescripcion, trapass: traPass},
                            dataType: "html",
                            error: function() {
                                alert("error petición ajax");
                            },
                            success: function(data) {

                                Lobibox.notify('success', {
                                    title: 'Completado',
                                    msg: 'Trabajador modificado correctamente'
                                });
                            }
                        });
                    }   
                    
        window.location.reload();
                                                  
    }
    
</script>

</body>

</html>
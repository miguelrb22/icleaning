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
                    <a href="#cliTra">Trabajos contratados</a>
                </li>
                <li>
                    <a href="#infgen">Perfil Cliente</a>
                </li>

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<?php
        include_once '../../app/controllers/ClienteController.php';
        include_once '../../app/models/Cliente.php';
        
        include_once '../../app/controllers/TrabajoController.php';
        include_once '../../app/models/Trabajo.php';

        $clienteController = new ClienteController();

        session_start();
        
        $cliente = $clienteController->getClienteEmail($_SESSION['name']);
        
        $trabajoController = new TrabajoController();
        $listaTrabajos = $trabajoController->getListaTrabajosPorCliente($cliente->getIdCliente());
?>

<!-- Header -->
<a name="cliTra"></a>
<div class="content-section-a">
    
    <div class="container">
    

    <div class="trabajo"></div>
    <h2 class="section-heading">Trabajos Contratados</h2>

    <div class="tab-content">
        
        <?php
            echo "<table id='tableTra' class='table table-striped table-borderedss'>"
                . "<thead>"
                . "<tr>"
                    ."<th>ID</th>"
                    ."<th>Importe Total</th>"
                    ."<th>Direccion</th>"
                    ."<th>Estimacion</th>"
                    ."<th>Valoracion</th>"
                    ."<th>Finalizado</th>"
                    ."<th>Fecha Inicio</th>"
                    ."<th>Fecha Fin</th>"
                    ."<th>Opciones</th>"
                    ."</tr>"
                    ."</thead>"
                    ."<tbody>";
                    
            foreach ($listaTrabajos as $trabajo) {
                $id = $trabajo->getIdTrabajo();
                echo "<tr>";
                echo "<td>" . $trabajo->getIdTrabajo() . "</td>";
                echo "<td>" . $trabajo->getImporteTotal() . "</td>";
                echo "<td>" . $trabajo->getDireccionLugar() . "</td>";
                echo "<td>" . $trabajo->getEstimacionHoras() . "</td>";
                echo "<td>" . $trabajo->getValoracion() . "</td>";
                echo "<td>" . $trabajo->getFinalizado() . "</td>";
                echo "<td>" . $trabajo->getFechaInicio() . "</td>";
                echo "<td>" . $trabajo->getFechaFin() . "</td>";
                
                if ($trabajo->getFinalizado() == 0) {
                    echo "<td> <button onclick='completeTrabajo($id)' class='btn btn-info btn-xs'>Completar</button> "
                        . "<button onclick='deleteTrabajo($id)' class='btn btn-info btn-xs'>Eliminar</button>"
                            . "</td>";
                }
                else {
                    echo "<td>Completado</td>";
                }
                
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
        <h2 class="section-heading">Perfil Cliente</h2>

        <?php
        
        $idCliente = $cliente->getIdCliente();
        $dni = $cliente->getDni();
        $nombre = $cliente->getNombre();
        $direccion = $cliente->getDireccion();
        $telefono = $cliente->getTelefono();
        $email = $cliente->getEmail();
        $contrasenya = $cliente->getContrasenya();
        $fotoCliente = $cliente->getFotoCliente();
        $apellidos = $cliente->getApellidos();

        ?>

        <div class="row">
            <div class="col-xs-4 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="http://www.velaporti.com/images/no_perfil_M.png" class="img-rounded" alt="imagen" width="174" height="50">
                </a>

            </div>

            <button type="button" class="btn btn-info btn-group-sm"> Cambiar imagen </button>

        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">

                <form class = "form-horizontal"> <br />

                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Nombre: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="cliNombre" value="<?php echo utf8_encode( $nombre) ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Telefono: </label>
                            <div class="input-group col-sm-2">
                                <span class = "input-group-addon"><span class = "glyphicon glyphicon-phone"></span></span>
                                <input class="form-control" type="text" name="cliTelefono" id="cliTelefono" value="<?php echo $telefono ?>">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Apellidos: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="cliApellidos" value="<?php echo utf8_encode( $apellidos) ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Email: </label>
                            <div class="input-group col-sm-3">
                                <span class = "input-group-addon">@</span>
                                <input class="form-control" type="text" name="cliEmail" id="cliEmail" value="<?php echo utf8_encode( $email) ?>">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">DNI: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="cliDni" value="<?php echo $dni ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Direccion: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" name="cliDireccion" id="cliDireccion" value="<?php echo utf8_encode($direccion) ?>">
                            </div>
                        </div>
                    </div><br />


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Cambiar contraseña: </label>
                        <div class="col-sm-2">
                            <input class="form-control" name="cliPassword" type="text" id="cliPassword">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Confirmar contraseña: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="cliPasswordConf" id="cliPasswordConf">
                        </div>
                    </div> <br />


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup"></label>
                        <div class="col-sm-4">
                            <?php
                                //Como pillar la direccion del value del imput direccion
                                //$cliDir = 'asdfasdf';
                                echo "<button type='submit' onclick='modificarCliente($idCliente)' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-floppy-saved'</span> Guardar </button>";
                            ?>
                            <button type="button" class="btn btn-danger btn-lg"><span class="glyphicon glyphicon-remove-circle"</span> Cancelar </button>
                        </div>
                    </div>

                </form>
            </div>
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
       $('#tableTra').dataTable();
    });
    
    function completeTrabajo(idTrabajo) {

        Lobibox.confirm({
            msg: "¿Estas seguro que deseas completar el trabajo?",
            callback: function ($this, type, ev) {
                if (type === 'yes'){

                    $.ajax({
                        type: "POST",
                        url: "../../app/ajax/ajax_completartrabajo.php",
                        data: { aux: idTrabajo},
                        dataType: "html",
                        error: function() {
                            alert("error petición ajax");
                        },
                        success: function(data) {

                            Lobibox.notify('success', {
                                title: 'Completado',
                                msg: 'Trabajo completado correctamente'
                            });
                        }
                    });


                }else if (type === 'no'){
                    Lobibox.notify('info', {
                        msg: 'Trabajo no completado'
                    });
                }
            }
        });
        
        window.location.reload();
    }
    
    function deleteTrabajo(idTrabajo) {

        Lobibox.confirm({
            msg: "¿Estas seguro que deseas eliminar el trabajo?",
            callback: function ($this, type, ev) {
                if (type === 'yes'){

                    $('#'+idTrabajo).hide();
                    
                    $.ajax({
                        type: "POST",
                        url: "../../app/ajax/ajax_eliminartrabajo.php",
                        data: { aux: idTrabajo},
                        dataType: "html",
                        error: function() {
                            alert("error petición ajax");
                        },
                        success: function(data) {

                            Lobibox.notify('success', {
                                title: 'Completado',
                                msg: 'Trabajo eliminado correctamente'
                            });
                        }
                    });


                }else if (type === 'no'){
                    Lobibox.notify('info', {
                        msg: 'Trabajo no eliminado'
                    });
                }
            }
        });
        
        window.location.reload();
    }
    
    function modificarCliente(idCliente) {
                    
                    var dirCli = $('#cliDireccion').val();
                    var cliEmail = $('#cliEmail').val();
                    var cliTelefono = $('#cliTelefono').val();
                    var cliPass = $('#cliPassword').val();
                    var cliPassConf = $('#cliPasswordConf').val();
                    
                    if (cliPass === '' || cliPassConf === '') {
                        alert("Inserte un password");
                    }
                    else if (cliPass !== cliPassConf) {
                        alert("Los passwords no coinciden");
                    }
                    else {
                                                          
                        $.ajax({
                            type: "POST",
                            url: "../../app/ajax/ajax_modificarcliente.php",
                            data: { idcliente: idCliente, clidir: dirCli, cliemail: cliEmail, clitelefono: cliTelefono, clipass: cliPass },
                            dataType: "html",
                            success: function(data) {

                                Lobibox.notify('success', {
                                    title: 'Completado',
                                    msg: 'Cliente modificado correctamente'
                                });
                            }
                        });
                    
                    }
                    
                    window.location.reload();
        
    }
</script>

</body>

</html>
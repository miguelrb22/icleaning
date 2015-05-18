<html lang="es">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCleaning</title>

    <!-- Bootstrap CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="public/css/landing.css" rel="stylesheet">

    <link href="public/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


    <!-- Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <?php

    $path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

    require_once($path.'/icleaning/app/logic/index_logic.php');    
    ?>

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
            <a class="navbar-brand topnav" href="#">iCleaning</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#services">Servicios</a>
                </li>
                <li>
                    <a href="#about">Nosotros</a>
                </li>
                <li>
                    <a href="#contact">Contacto</a>
                </li>
                <?php
                    session_start();
                    
                    if ($_SESSION) {
                                                               
                        if ($_SESSION['name']) { 

                            //Cliente
                            if ($_SESSION['login'] == 1) {

                                require_once($path.'/icleaning/app/controllers/ClienteController.php');
                                require_once($path.'/icleaning/app/models/Cliente.php');

                                $clienteController = new ClienteController();
                                $cliente = $clienteController->getClienteEmail($_SESSION['name']);

                                $varSesion = 'Bienvenido ' . $cliente->getNombre();

                            }
                            //Empleado
                            else if ($_SESSION['login'] == 2) {

                                require_once($path.'/icleaning/app/controllers/EmpleadoController.php');
                                require_once($path.'/icleaning/app/models/Trabajador.php');
                                
                                $empleadoController = new EmpleadoController();
                                $trabajador = $empleadoController->getEmpleadoEmail($_SESSION['name']);
                                
                                $varSesion = 'Bienvenido ' . $trabajador->getNombre();
                                
                            }

                            else { $varSesion = ''; }


                            echo '<li>';
                            echo '<a>' . $varSesion . '</a>';
                            echo '</li>';

                            echo '<li>';
                            echo "<button style='margin-top:4%;' onclick='logout()' class='btn btn-danger'><i class='fa fa-key'></i> <span>Logout</span></button>";
                            echo '</li>';

                        }
                    }
                ?>
                
                
                <li>
                    <button style="margin-top:4%;" class="btn btn-success" data-toggle="modal" data-target="#myModal2"><i class="fa fa-key"></i> <span>Área Privada</span></button>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- Header -->
<a name=""></a>
<div class="intro-header">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <h1>iCleaning</h1>
                    <h3>Tu entorno siempre limpio</h3>
                    <hr class="intro-divider">
                    <ul class="list-inline intro-social-buttons">

                        <li>
                            <button class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal"><i class="fa fa-share"></i> <span class="network-name"> Buscar </span></button>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.intro-header -->

<!-- Page Content -->

<a name="services"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Interiores</h2>
                <p class="lead">En iCleaning somos expertos en limpieza de interiores, tanto casas particulares como en oficinas.</p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="public/images/oficina.jpg" alt="Oficinas limpias">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->

<div class="content-section-b">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Exteriores</h2>
                <p class="lead">Tanto interiores, como exteriores. En icleaning limpiamos las ventanas de su casa u oficia por fuera.</p>
            </div>
            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                <img class="img-responsive" src="public/images/exterior.jpg" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-b -->

<div class="content-section-a">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Piscinas</h2>
                <p class="lead">Si lo que buscas es mantener limpia tu piscina, en icleaning tenemos un servicio inmejorable para ello.</p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="public/images/piscina.jpg" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>

<div class="content-section-b">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Y muchos más...</h2>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <h4 class="text-primary">Aparcamientos</h4>
            <img class="img-responsive" src="public/images/parking.jpg" alt="">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <h4 class="text-primary">Trasteros</h4>
            <img class="img-responsive" src="public/images/trastero.jpg" alt="">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <h4 class="text-primary">Obras</h4>
            <img class="img-responsive" src="public/images/finobra.jpg" alt="">
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
            <h4 class="text-primary">Comunidad</h4>
            <img class="img-responsive" src="public/images/comunidades.jpg" alt="">
        </div>
    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->

<a name="about"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Acerca de iCleaning</h2>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">¿Por qué elegirnos?</div>
                            <div class="panel-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        <text>Reserva de manera sencilla y segura</text>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        <text>Ahorra tiempo y dinero</text>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        <text>Olvídate de comprar productos de limpieza</text>
                                    </li>
                                    <li class="list-group-item">
                                        <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        <text>Optimiza el tiempo de tu limpieza</text>
                                    </li>
                                </ul>  
                            </div>
                    </div> 
                </div>
                <div class="col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">Garantía y Seguridad</div>
                        <div class="panel-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    <text>100% garantía de conformidad</text>
                                </li>
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    <text>Cancelaciones y modificaciones de reservas flexibles</text>
                                </li>
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    <text>Profesionales de confianza en tu ciudad</text>
                                </li>
                                <li class="list-group-item">
                                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                    <text>Pago seguro utilizando certificado SSL</text>
                                </li>
                            </ul>  
                        </div>
                    </div> 
                </div>
        </div>

    </div>
    <!-- /.container -->

</div>

<a name="contact"></a>
<div class="banner">

    <div class="container">

        <div class="row">
            <div class="col-lg-6">
                <h2>Conecta con iCleaning</h2>
            </div>
            <div class="col-lg-6">
                <ul class="list-inline banner-social-buttons">
                    <li>
                        <a href="" class="btn btn-info btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                    </li>
                    <li>
                        <a href="" class="btn btn-info btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                    </li>
                    <li>
                        <a href="" class="btn btn-info btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.banner -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li>
                        <a href="#">Inicio</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="#about">Nosotros</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="#services">Servicios</a>
                    </li>
                    <li class="footer-menu-divider">⋅</li>
                    <li>
                        <a href="#contact">Contacto</a>
                    </li>
                    <li>
                        <button style="margin-top:2%;" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal3"><i class="fa fa-key"></i> <span>Administración</span></button>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright © iCleaning 2015. Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</footer>


<!-- Ventana modal INICIAR SESION administracion-->
<!-- Modal -->
<div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Acceso administracion</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="app/logic/adminLogin.php">

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control"  placeholder="Usuario" name="name">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control"  placeholder="Contraseña" name="pass">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">¡Entrar!</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Acceso para registrados</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="app/logic/login.php">

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" class="form-control"  placeholder="Usuario" name="name">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" class="form-control"  placeholder="Contraseña" name="pass">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">¡Entrar!</button>
                    </div>
                </form>
                <form action="resources/views/crearcliente.php">
                            <input type="submit" class="btn btn-primary" value="Crear Cuenta">
                </form>
            </div>

        </div>
    </div>
</div>


<!-- Ventana modal -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Encuentra lo que buscas facilmente</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="resources/views/trabajadores.php">

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <select class="selectpicker form-control" data-live-search="true"
                                        title="Selecciona una zona" name="zona">
                                    <option value="" disabled selected>Selecciona la zona</option>
                                    <?php select_zonas(); ?>


                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-magic"></i></span>
                                <select class="selectpicker form-control" data-live-search="true"
                                        title="Selecciona una zona" name="especialidad">
                                    <option value="" disabled selected>Elige la especialidad</option>
                                    <?php select_especialidades(); ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" class="form-control" id="datetimepicker4" placeholder="Fecha" name="fecha">
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        
                        <?php 
                        
                        if ($_SESSION) {
                            
                            if ($_SESSION['login'] == 1) {
                                
                                echo "<button type='submit' class='btn btn-primary'>A Limpiar!</button>";
                                
                            }
                            else {
                                echo "<button type='submit' class='btn btn-primary disabled'>Debe de iniciar sesion</button>";
                            }
                        }
                        else {
                            echo "<button type='submit' class='btn btn-primary disabled'>Debe de iniciar sesion</button>";
                        }
                        
                        ?>
                        
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<!-- jQuery -->
<script src="public/js/jquery.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="public/bootstrap/js/bootstrap.min.js"></script>

<script src="public/js/moment.min.js"></script>

<script src="public/js/bootstrap-datetimepicker.js"></script>

<script type="text/javascript">
    $(function () {
        $('#datetimepicker4').datetimepicker({
            locale: 'es',
            format: 'L'
        });
    });
</script>

<script>

function logout() {
                                    
                        $.ajax({
                            type: "POST",
                            url: "app/logic/logout.php",
                            data: { },
                            dataType: "html",
                            error: function() {
                                alert("error petición ajax");
                            },
                            success: function(data) {

                                Lobibox.notify('success', {
                                    title: 'Completado',
                                    msg: 'Cliente desconectado correctamente'
                                });
                            }
                        });
                    
}

</script>



</body>

</html>
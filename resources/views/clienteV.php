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
                    <a href="#infgen">Perfil Cliente</a>
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

        <div class="clearfix"></div>
        <h2 class="section-heading">Perfil Cliente</h2>

        <?php
        include_once '../../app/controllers/ClienteController.php';
        include_once '../../app/models/Cliente.php';


        $clienteController = new ClienteController();

        $cliente = $clienteController->getCliente(29);


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
                            <input class="form-control" type="text" id="formGroup" value="<?php echo $nombre ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Telefono: </label>
                            <div class="input-group col-sm-2">
                                <span class = "input-group-addon"><span class = "glyphicon glyphicon-phone"></span></span>
                                <input class="form-control" type="text" id="formGroup" value="<?php echo $telefono ?>">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Apellidos: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo $apellidos ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Email: </label>
                            <div class="input-group col-sm-3">
                                <span class = "input-group-addon">@</span>
                                <input class="form-control" type="text" id="formGroup" value="<?php echo $email ?>">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">DNI: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" id="formGroup" value="<?php echo $dni ?>" disabled>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Direccion: </label>
                            <div class="col-sm-3">
                                <input class="form-control" type="text" id="formGroup" value="<?php echo $direccion ?>">
                            </div>
                        </div>
                    </div><br />


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Cambiar contraseña: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="formGroup">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Confirmar contraseña: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" id="formGroup">
                        </div>
                    </div> <br />


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup"></label>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-floppy-saved"</span> Guardar </button>
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

<!-- Bootstrap Core JavaScript -->
<script src="../../public/js/bootstrap.min.js"></script>

</body>

</html>
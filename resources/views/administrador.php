<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCleaning</title>

    
    <!-- Bootstrap CSS -->
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="../../public/css/landing.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../public/lolibox/dist/css/LobiBox.min.css">


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
                    <a href="#zcliente">Zona Clientes</a>
                </li>
                <li>
                    <a href="#zempleado">Zona Empleados</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Header -->
<a name="zcliente"></a>
<div class="content-section-a">

    <div class="container">


        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Zona Clientes</h2>
                
                <div class="panel panel-default">
                    <div class="panel-heading">Buscar Cliente</div>
                    <div class="panel-body">
                        <form id="formcliente">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar por DNI" name="dnicli" id="dnicli">
                              <span class="input-group-btn">
                                  <button class="btn btn-default" type="submit" id="getclient">Buscar</button>
                              </span>
                            </div>
                        </form>

                        <!-- /input-group -->
                    </div>

                </div>
            </div>

        <div class="row">

            <div id="administrador-result"></div>

        </div>
                
    </div>
    <!-- /.container -->

</div>

<!-- Header -->
<a name="zempleado"></a>
<div class="content-section-a">

    <div class="container">

        <div class="row">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Zona Empleados</h2>
                
                <div class="panel panel-default">
                    <div class="panel-heading">Buscar Empleado</div>
                    <div class="panel-body">
                        <form id="formempleado">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Buscar por DNI" name="dniemp" id="dniemp">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="submit" id="getempleado">Buscar</button>
                                    </span>
                            </div><!-- /input-group -->
                        </form>

                        <button class="btn btn-warning btn-xs" id="gettodosempleados">Mostrar todos</button>
                    </div>
                </div>
            </div>
        
            <div class="row">

                <div id="administradorempleado-result" class="col col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>

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


<!-- Bootstrap Core JavaScript -->
<script src="../../public/js/bootstrap.min.js"></script>


<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
<script>
    $(document).ready(function() {


        $("#formcliente").submit(function(e) {

            e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../../app/logic/buscarCliente.php",
                    data: $("#formcliente").serialize(),
                    dataType: "html",
                    error: function() {
                        alert("error petición ajax");
                    },
                    success: function(data) {


                        $('#administrador-result').html(data);

                    }
                });
        });
        
        $("#gettodosempleados").click(function(e) {

            e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../../app/logic/todosEmpleados.php",
                    dataType: "html",
                    error: function() {
                        alert("error petición ajax");
                    },
                    success: function(data) {

                        $('#administradorempleado-result').html(data);

                    }
                });
        });

        $("#formempleado").submit(function(e) {

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: "../../app/logic/buscarEmpleado.php",
                data: $("#formempleado").serialize(),
                dataType: "html",
                error: function() {
                    alert("error petición ajax");
                },
                success: function(data) {

                    $('#administradorempleado-result').html(data);

                }
            });
        });

    });

    
    function deleteEmpleado(dniEmpleado) {

        Lobibox.confirm({
            msg: "¿Estas seguro que deseas eliminar el usuario?",
            callback: function ($this, type, ev) {
                if (type === 'yes'){

                    $('#'+dniEmpleado).hide();

                    $.ajax({
                        type: "POST",
                        url: "../../app/ajax/ajax_borrarempleado.php",
                        data: { aux: dniEmpleado},
                        dataType: "html",
                        error: function() {
                            alert("error petición ajax");
                        },
                        success: function(data) {

                            Lobibox.notify('success', {
                                title: 'Borrado',
                                msg: 'Usuario borrado correctamente'
                            });

                        }
                    });


                }else if (type === 'no'){
                    Lobibox.notify('info', {
                        msg: 'Te has salvado por los pelos'
                    });
                }
            }
        });



    }


</script>
</body>

</html>

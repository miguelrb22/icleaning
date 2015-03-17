<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Limpiezas personalizadas</title>

    <!-- Bootstrap core CSS -->


    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
    <link rel="stylesheet" href="datepicker/css/bootstrap-material-datepicker.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    <link href="css/style.css" rel="stylesheet">




    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<header class="main-header">
    <nav class="navbar navbar-default"  id="navmain">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="height:100px">
                    <div id="pp"> <img src="logo.png" width="192" height="60"></img> </div>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse" style="margin-top:none">
                <ul class="nav navbar-nav navbar-right" style="margin-top:30px">

                    <li><a href="#"><span id="menuspan">Interiores</span></a></li>
                    <li><a href="#"><span id="menuspan">Exteriores</span></a></li>
                    <li><a href="#"><span id="menuspan">Piscinas</span></a></li>

                    <li><button type="button" class="btn btn-success" id="acceso1" data-toggle="modal" data-target="#myModal" data-placement="bottom" title="Acceso franquiciadores" style="margin-top:10px">Área privada</button></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</header>



<div class="container">
    <div class="row ">
        <form  id="bc" class="form-inline well" role="form">
            <div style="margin-left: 20%;">
                
                <div class="form-group">
                    <select  style="color:white;"  class="selectbuscador form-control">
                        <?php require_once 'php/prueba2.php'; ?>

                    </select>
                </div>
                
                <div class="form-group">
                    <select style="color:white;" class="selectbuscador2 form-control" minlength="60">
                        <option  style="color:white;" value="">Piscinas</option>

                    </select>
                </div>

                <div class="form-group">
                    <input style="color:white;" type="text" id="date-format" class="form-control" placeholder="Fecha">
                </div>

                <div class="form-group">
                    <input style="color:white;" type="text" class="form-control" name="busqueda1" placeholder="Buscar..."/>
                </div>


                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>
</div>


<footer class="footer">
    <div class="container">
        <p class="text-muted">iCleaning</p>
    </div>
</footer>


<!-- Modal -->
<div class="modal fade bs-example-modal-sm" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Control de acceso</h4>
            </div>
            <div class="modal-body">
                <form class="form-inline row">


                    <div class="form-group col col-lg-12 col-xs-12 col-md-12 col-sm-12">
                        <label class="sr-only" for="exampleInputAmount">Usuario</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-user-plus"></i>
                            </div>
                            <input type="text" class="form-control" id="Usuariot" placeholder="Usuario">
                        </div>
                    </div>

                    <div class="form-group col col-lg-12 col-xs-12 col-md-12 col-sm-12">
                        <label class="sr-only" for="exampleInputAmount">Contraseña</label>
                        <div class="input-group">
                            <div class="input-group-addon"><i class="fa fa-key"></i></div>
                            <input type="text" class="form-control" id="Contraseña" placeholder="Contraseá">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Entrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="datepicker/js/bootstrap-material-datepicker.js"></script>
<script src="datepicker/js/bootstrap-material-datepicker.js"></script>


<script type="text/javascript">

    $( document ).ready(function() {

        $('#date-format').bootstrapMaterialDatePicker({ format : 'DD MMMM YYYY', lang: 'es' });

        $.material.init();

    });
</script>
</body>
</html>
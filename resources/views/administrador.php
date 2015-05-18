<?php

error_reporting(E_ALL ^ E_NOTICE);
session_start();
$path = substr($_SERVER['DOCUMENT_ROOT'],0,15);

if ( (!isset($_SESSION['name'])) || $_SESSION['activa'] != 1 || $_SESSION['admin']  != 1){

    header('location: ../../index.php');
}
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
    <link href="../../public/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS -->
    <link href="../../public/css/landing.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../../public/lolibox/dist/css/LobiBox.min.css">
    <link rel="stylesheet" href="../../public/datatables/media/css/jquery.dataTables.min.css">



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

                    <form action="http://google.com">
                        <button type ="submit" style="margin-top: 5%" class="btn btn-danger">Cuadro de mando</button>
                    </form>
                </li>
                <li>
                    <a href="#zcliente">Zona Clientes</a>
                </li>
                <li>
                    <a href="#zempleado">Zona Empleados</a>
                </li>
                <li>
                    <a href="#zcrearempleado">Crear Empleado</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<?php
include_once '../../app/logic/index_logic.php';
?>

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
                                        <button class="btn btn-default" type="submit" id="getempleado">Buscar</button>
                                    </span>
                            </div><!-- /input-group -->
                        </form>

                        <button class="btn btn-warning btn-xs" id="gettodosclientes">Mostrar todos</button>
                    </div>
                </div>
            </div>

            <div class="row">

                <div id="administrador-result" class="col col-xs-12 col-sm-12 col-md-12 col-lg-12"></div>
                <div class="paginacion"></div>
            </div>


    </div>

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

<a name="zcrearempleado"></a>
<div class="content-section-a">



    <div class="container">

        <div class="clearfix"></div>
        <h2 class="section-heading">Crear Empleado</h2>

        <div class="row">
            <div class="col-xs-4 col-md-2">
                <a href="#" class="thumbnail">
                    <img src="http://www.velaporti.com/images/no_perfil_M.png" class="img-rounded" alt="imagen" width="174" height="50">
                </a>

            </div>

            <button type="button" class="btn btn-info btn-group-sm"> Cambiar imagen </button>

            <br />
            <br />

        </div>



        <div class="panel panel-primary">
            <div class="panel-heading">Datos</div>
            <div class="panel-body">

                <form class = "form-horizontal"> <br />

                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Nombre: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="traNombre" id="traNombre" value="" >
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Telefono: </label>
                            <div class="input-group col-sm-2">
                                <span class = "input-group-addon"><span class = "glyphicon glyphicon-phone"></span></span>
                                <input class="form-control" type="text" name="traTelefono" id="traTelefono" value="">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Apellidos: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="traApellidos" id="traApellidos" value="">
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Email: </label>
                            <div class="input-group col-sm-3">
                                <span class = "input-group-addon">@</span>
                                <input class="form-control" type="text" name="traEmail" id="traEmail" value="">
                            </div>
                        </div>

                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">NIF: </label>
                        <div class="col-sm-3">
                            <input class="form-control" type="text" name="traNif" id="traNif" value="" >
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">Numero de cuenta: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="traCuenta" id="traCuenta" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class = "col-sm-2 control-label" for="formGroup">SIP: </label>
                            <div class="col-sm-4">
                                <input class="form-control" type="text" name="traSip" id="traSip" value="">
                            </div>
                        </div>

                    </div><br />


                    <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-1">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-globe"></i></span>
                                <select class="selectpicker form-control" data-live-search="true"
                                        title="Selecciona una zona" id="zona" name="zona">
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
                                        title="Selecciona una zona" id="especialidad" name="especialidad">
                                    <option value="" disabled selected>Elige la especialidad</option>
                                    <?php select_especialidades(); ?>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">

                        <label class = "col-sm-2 control-label" for="formGroup">Años experiencia: </label>
                        <div class="col-sm-2">
                            <input class="form-control" type="text" name="traExperiencia" id="traExperiencia" value="" >
                        </div>

                    </div> <br />


                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="formGroup">Descripcion</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" rows="6" name="traDescripcion" id="traDescripcion" ></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class = "col-sm-2 control-label" for="formGroup">Insertar contraseña: </label>
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
                                echo "<button type='submit' onclick='crearTrabajador()' class='btn btn-success btn-lg'><span class='glyphicon glyphicon-floppy-saved'</span> Guardar </button>";
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


        <!-- Bootstrap Core JavaScript -->

        <script src="../../public/datatables/media/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript" charset="utf8" src="../../public/js/bootpag.js"></script>

        <script src="../../public/js/bootstrap.min.js"></script>

 <?php

  $clientes = New ClienteController();
 $total = $clientes->getTotalClientes();

 ?>
<script type="text/javascript">

    var total = <?php echo $total; ?>;

    var count = total;  //variable para contar el total de franquicias y mostrar en relacion con el nº de paginas
    var paginas = 0;
    if (count%10 != 0){
        paginas = Math.floor(count/10)+1;
    }else{
        paginas = count/10; //4 es el número de items que queremos que aparezcan.
    }

    $(document).ready(function() {



        $('.paginacion').hide();

        $('#todosEmp').DataTable();


        $('.paginacion').bootpag({
            total: paginas,
            page: 1,
            maxVisible: 3,
            leaps: true,
            firstLastUse: true,
            first: '←',
            last: '→',
            wrapClass: 'pagination',
            activeClass: 'active',
            disabledClass: 'disabled',
            nextClass: 'next',
            prevClass: 'prev',
            lastClass: 'last',
            firstClass: 'first'

        }).on("page", function(event, num) {



            $.ajax({

                type: "post",
                url: "../../app/ajax/ajax_paginacion_clientes.php",
                data: {page : num},
                dataType: "html",
                error: function () {
                    alert("Error en la petición");
                },
                success: function (data) {

                    $("#tbodyCli").html(data);

                }
            });
        });



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

        $("#gettodosclientes").click(function(e) {

            e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: "../../app/logic/todosClientes.php",
                    dataType: "html",
                    error: function() {
                        alert("error petición ajax");
                    },
                    success: function(data) {

                        $('#administrador-result').html(data)

                        $('.paginacion').show();


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
                        $('#todosEmp').DataTable();
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

    function deleteCliente(dniCliente) {

        Lobibox.confirm({
            msg: "¿Estas seguro que deseas eliminar el usuario?",
            callback: function ($this, type, ev) {
                if (type === 'yes'){

                    $('#'+dniCliente).hide();

                    $.ajax({
                        type: "POST",
                        url: "../../app/ajax/ajax_borrarcliente.php",
                        data: { aux: dniCliente},
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

    function crearTrabajador() {

                    var traTelefono = $('#traTelefono').val();
                    var traEmail = $('#traEmail').val();
                    var traCuenta = $('#traCuenta').val();
                    var traDescripcion = $('#traDescripcion').val();
                    var traPass = $('#traPass').val();
                    var traPassConf = $('#traPassConf').val();
                    var traExperiencia = $('#traExperiencia').val();
                    var traNif = $('#traNif').val();
                    var traApellidos = $('#traApellidos').val();
                    var traNombre = $('#traNombre').val();
                    var traSip = $('#traSip').val();
                    var traZona = $('#especialidad').val();
                    var traEspecialidad = $('#zona').val();

                    if (traPass === '' || traPassConf === '') {
                        alert("Contraseña vacia");
                    }
                    else if (traPass !== traPassConf) {
                        alert("No coinciden las contraseñas");
                    }
                    else if (traTelefono === '' || traEmail === '' || traCuenta === '' || traDescripcion === '' || traExperiencia === '' || traNif === '' || traNombre === '' || traApellidos === '' || traSip === '') {
                        alert("No se admite ningun campo vacio");
                    }
                    else {

                        $.ajax({
                            type: "POST",
                            url: "../../app/ajax/ajax_crearempleado.php",
                            data: { traespecialidad: traEspecialidad, trazona: traZona, trasip: traSip, tranombre: traNombre, traapellidos: traApellidos, tranif: traNif, traexperiencia: traExperiencia, tratelefono: traTelefono, traemail: traEmail, tracuenta: traCuenta, tradescripcion: traDescripcion, trapass: traPass},
                            dataType: "html",
                            success: function(data) {

                                Lobibox.notify('success', {
                                    title: 'Completado',
                                    msg: 'Trabajador creado correctamente'
                                });
                            }
                        });
                    }

    }


</script>
</body>

</html>

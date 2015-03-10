
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Limpiezas personalizadas</title>

    <!-- Bootstrap core CSS -->
    
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/css/material.min.css" />
    <link rel="stylesheet" href="datepicker/css/bootstrap-material-datepicker.css" />
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
    
    <link href="css/style.css" rel="stylesheet">
    
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
    <script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="datepicker/js/bootstrap-material-datepicker.js"></script>

   


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
                        <div id="pp"> <img src="logo.png" width="192" height="112"></img> </div>
                    </a>
                  </div>
                  <div id="navbar" class="navbar-collapse collapse" style="margin-top:none">
                    <ul class="nav navbar-nav navbar-right" style="margin-top:30px">
                     
                       <li><a href="#"><span id="menuspan">Interiores</span></a></li>
                      <li><a href="#"><span id="menuspan">Exteriores</span></a></li>
                      <li><a href="#"><span id="menuspan">Piscinas</span></a></li>

                      <li><button type="button" class="btn btn-success" id="acceso1" data-toggle="modal"  data-target="#registro" data-placement="bottom" title="Acceso franquiciadores" style="margin-top:10px">Área privada</button></li>
                    </ul>
                  </div><!--/.nav-collapse -->
                </div><!--/.container-fluid -->
            </nav>
        </header>


      
      <div class="container">
                <div class="row ">
                    <form  id="bc" class="form-inline well" role="form">
                        <div style="margin-left: 20%;"><div class="form-group">
                            <select  style="color:white;"  class="selectbuscador form-control">
                                <option  style="color:white;" value="">Exteriores</option>
                                
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


    <!-- Bootstrap core JavaScript
    ================================================== -->
    
    <script src="datepicker/js/bootstrap-material-datepicker.js"></script>


    <script type="text/javascript">
    
    $( document ).ready(function() {
        
        $('#date-format').bootstrapMaterialDatePicker({ format : 'DD MMMM YYYY', lang: 'es' });
        
        $.material.init();

});
    </script>
  </body>
</html>
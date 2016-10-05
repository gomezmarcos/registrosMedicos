<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" 
        integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" 
        crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="http://localhost/dev.clinica/public/css/fileinput.min.css/"/>
    
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>


    <!-- Latest compiled and minified JavaScript -->
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
    -->
    <script src="http://localhost/dev.clinica/public/js/fileinput.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
        crossorigin="anonymous"></script>        

    <script src="http://localhost/dev.clinica/public/js/fileinput_locale_es.js" type="text/javascript"></script>

   <title>Estudios Clinicos</title>

     <script>
     $(function () {
      $( "#dialog-confirm" ).dialog({
        resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $( this ).dialog( "close" );
            },
            Cancel: function() {
              $( this ).dialog( "close" );
            }
          }
      });
          // $("#btn-nuevo-laboratorio").button().on( "click", function() {
          $(".btn-mock").button().on( "click", function() {
            $( "#dialog-confirm" ).dialog('open');
          });
      

    });
      </script>


</head>
<body>
    <!-- jquery dialog -->
    <div id="dialog-confirm" title="Agregar Nuevo">
        <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
        Esta seguro que desea agregar un nuevo elemento?</p>
        <div class="form-group">
          <label for="usr">Nombre:</label>
          <input type="text" class="form-control" id="usr">
        </div>
        <div class="form-group">
          <label for="usr">Descripcion:</label>
          <input type="text" class="form-control" id="usr">
        </div>
        <div class="form-group">
            <label class="btn btn-primary" for="my-file-selector">
                <input id="my-file-selector" type="file" style="display:none;">Agregar Imagen
            </label>
        </div>


    </div>

    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/old/datosPersonales">Registro Medico Personal</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li id="liDP"><a href="/old/datosPersonales">Datos Personales</a></li>
                    <li id="liEC"><a href="/old/estudiosClinicos">Estudios Clinicos</a></li>
                    <li id="liAC"><a href="/old/antecedentesClinicos">Antecedentes Clinicos</a></li>
                    <li id="liV"><a href="/old/varios">Varios</a></li>
                    <li id="liEP"><a href="/old/editarPerfil">Editar Perfil</a></li>
                    <li>
                        <a onclick="alert('Admin: No implementado aun.');" href="#contact">Cerrar Sesion <span class="glyphicon glyphicon-off"/></a>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!-- Page Content -->
    @yield('content')
</body>
</html>

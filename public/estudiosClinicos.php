<!DOCTYPE php>
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
    <link rel="stylesheet" href="css/fileinput.min.css"/>
    
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
    <script type="text/javascript" src="js/fileinput.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" 
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" 
        crossorigin="anonymous"></script>        

    <script src="js/fileinput_locale_es.js" type="text/javascript"></script>

   <title>Estudios Clinicos</title>


</head>
<body>
    <nav class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Rossaro Software</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Datos Personales</a></li>
                    <li><a href="#about">Estudios Clinicos</a></li>
                    <li><a href="#contact">Varios</a></li>
                    <li><a href="#contact">Editar Perfil</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <!-- Page Content -->

    <div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-2">
                <img class="img-responsive img-rounded" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-10">
                    <h1 id="h1-nombre">Martin Hayon</h1>                
                    <p>DNI 28695708 Edad: 33 años </p>
                    <p>Domicilio: Caracas 2345 1º B Bloque Ciudad Autónoma de Buenos Aires</p>
                    <p>Argentina</p>                
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <h3 class="page-header">Estudios Clinicos</h3>
            <ul class="nav nav-tabs">
              <li class="active"><a href="#">Laboratorio</a></li>
              <li><a href="#">RX</a></li>
              <li><a href="#">Ecografia</a></li>
              <li><a href="#">Otros</a></li>
            </ul>
            <div>
                <table class="table">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Nombre</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>2016-05-22</td>
                    <td>Receta toma de medicacion</td>
                    <td>
                        <a href="#">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="#">
                            <i class="fa fa-remove"></i>
                        </a>
                    </td>
                </tr>

                <tr>
                    <td>2016-05-22</td>
                    <td>Receta toma de medicacion</td>
                    <td>
                        <a href="#">
                            <i class="fa fa-eye"></i>
                        </a>
                         <a href="#">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-remove"></i>
                        </a>
                        </td>
                </tr>
                </tbody>
                </table>
            </div>

            <div class="well">
                <label class="control-label">Elegir Archivos</label>
                <!--
                <input id="input-es" name="input-es[]" type="file"  class="file" multiple data-show-upload="false" data-show-caption="true">
                -->
                <input id="input-es" type="file" multiple /> 

                <div class = "row" style="margin:10px">
   
                    <div class = "col-sm-6 col-md-3">
                        <a href = "#" class = "thumbnail">
                        <img class="img-responsive img-rounded" alt="Generic Placeholder" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg">
                      </a>
                      <div class = "caption">
                        <h3>Thumbnail label</h3>
                        <p>Some sample text. Some sample text. Pero es un texto muy muy muy largooooo</p>
                        <p><a href = "#" class = "btn btn-default" role = "button">Eliminar</a></p>
                      </div>
                    </div>
                   
                    <div class = "col-sm-6 col-md-3">
                        <a href = "#" class = "thumbnail">
                            <img class="img-responsive img-rounded" alt="Generic Placeholder" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg">
                        </a>
                        <div class = "caption">
                            <h3>Thumbnail label</h3>
                            <p>Some sample text. Some sample text. Pero es un texto muy muy muy largooooo</p>
                            <p><a href = "#" class = "btn btn-default" role = "button">Eliminar</a></p>
                        </div>
                   </div>
                   
                   <div class = "col-sm-6 col-md-3">
                      <a href = "#" class = "thumbnail">
                        <img class="img-responsive img-rounded" alt="Generic Placeholder" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg">
                      </a>
                   </div>
                   
                   <div class = "col-sm-6 col-md-3">
                      <a href = "#" class = "thumbnail">
                        <img class="img-responsive img-rounded" alt="Generic Placeholder" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg">
                      </a>
                   </div>
                </div>
            </div>
        </div>
    </div>

       <script type="text/javascript">
    $(document).ready(function() {
        console.log("se lee");
        var name = "";
        $("#input-es").fileinput({
            'uploadUrl': "public/php/videos/upload",
            'uploadAsync': true,
            // maxFileCount: 1,
            'allowedFileExtensions': ["jpg", "jpeg", "jpeg", "gif"],
            'maxFileSize': 2000,
            'elErrorContainer': "#error",
            // previewFileType: "video",
            'browseLabel': "Examinar ...",
            'uploadLabel': "Subir Imagenes",
            'removeLabel': "Borrar Imagenes",
            'browseClass': "btn btn-success",
            'showUploadedThumbs': false,
            'dropZoneEnabled':false
            // 'initialCaption': "Subi tus documentos!"
            // uploadExtraData: {videoname: name}
        });

/*
      
        $('#input-es').on('fileuploaded', function(event, data, previewId, index) {
           var form = data.form, files = data.files, extra = data.extra, 
            response = data.response, reader = data.reader;
                    // obtenerFilesEstudio(0,56, function(){ dibujarGrillaFiles(GLOBAL_filesusuarios, 'div-files');});
                    
        });
*/
        
    });
   </script>
</body>
</html>

@extends('old.layoutInitial')
@section('content')
<script>
     $(function () {
      
     $("#liEP").addClass('active');

    });
</script>
<div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-2">
          
                <img class="img-responsive img-rounded" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg" alt="profile">
                   
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-10">
                <h1 id="h1-nombre" style="display:none;">Daniel Valentini</h1>
                <div id="div-resumen" style="display: none;"><p>This is a template that is great for small businesses. It doesn't have too much fancy flare to it, but it makes a great use of the standard Bootstrap core components. Feel free to use this template for any project you want!</p>
                    <a class="btn btn-primary btn-lg" href="#" style="display: none">Call to Action!</a>
                </div>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row --><br>
       <div class="row">
           <div class="col-md-9 docs-buttons" id="botones-edicion" style="display: none;">
        <!-- <h3 class="page-header">Toolbar:</h3> -->
        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="move" title="Move">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;move&quot;)">
              <span class="fa fa-arrows"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="setDragMode" data-option="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setDragMode&quot;, &quot;crop&quot;)">
              <span class="fa fa-crop"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="zoom" data-option="0.1" title="Zoom In">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;zoom&quot;, 0.1)">
              <span class="fa fa-search-plus"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="zoom" data-option="-0.1" title="Zoom Out">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;zoom&quot;, -0.1)">
              <span class="fa fa-search-minus"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="move" data-option="-10" data-second-option="0" title="Move Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;move&quot;, -10, 0)">
              <span class="fa fa-arrow-left"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="10" data-second-option="0" title="Move Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;move&quot;, 10, 0)">
              <span class="fa fa-arrow-right"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="-10" title="Move Up">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;move&quot;, 0, -10)">
              <span class="fa fa-arrow-up"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="move" data-option="0" data-second-option="10" title="Move Down">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;move&quot;, 0, 10)">
              <span class="fa fa-arrow-down"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="-45" title="Rotate Left">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;rotate&quot;, -45)">
              <span class="fa fa-rotate-left"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="rotate" data-option="45" title="Rotate Right">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;rotate&quot;, 45)">
              <span class="fa fa-rotate-right"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="scaleX" data-option="-1" title="Flip Horizontal">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;scaleX&quot;, -1)">
              <span class="fa fa-arrows-h"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="scaleY" data-option="-1" title="Flip Vertical">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;scaleY&quot;, -1)">
              <span class="fa fa-arrows-v"></span>
            </span>
          </button>
        </div>

        <div class="btn-group hidden">
          <button type="button" class="btn btn-primary" data-method="crop" title="Crop">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;crop&quot;)">
              <span class="fa fa-check"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="clear" title="Clear">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;clear&quot;)">
              <span class="fa fa-remove"></span>
            </span>
          </button>
        </div>

        <div class="btn-group hidden">
          <button type="button" class="btn btn-primary" data-method="disable" title="Disable">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;disable&quot;)">
              <span class="fa fa-lock"></span>
            </span>
          </button>
          <button type="button" class="btn btn-primary" data-method="enable" title="Enable">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;enable&quot;)">
              <span class="fa fa-unlock"></span>
            </span>
          </button>
        </div>

        <div class="btn-group">
          <button type="button" class="btn btn-primary" data-method="reset" title="Reset">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;reset&quot;)">
              <span class="fa fa-refresh"></span>
            </span>
          </button>
          <label class="btn btn-primary btn-upload" for="inputImage" title="Upload image file">
            <input type="file" class="sr-only" id="inputImage" name="file" accept="image/*">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="Import image with Blob URLs">
              <span class="fa fa-upload"></span>
            </span>
          </label>
          <button type="button" class="btn btn-primary hidden" data-method="destroy" title="Destroy">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;destroy&quot;)">
              <span class="fa fa-power-off"></span>
            </span>
          </button>
        </div>

        <div class="btn-group btn-group-crop">
          <button type="button" class="btn btn-primary" data-method="getCroppedCanvas">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;getCroppedCanvas&quot;)">
                Guardar             
            </span>
          </button>
          <button type="button" class="btn btn-primary" id="btn-cancelar">
              Cancelar
          </button>
    
        </div>

        <!-- Show the cropped image in modal -->
        <div class="modal fade docs-cropped" id="getCroppedCanvasModal" aria-hidden="true" aria-labelledby="getCroppedCanvasTitle" role="dialog" tabindex="-1" style="display: none;">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="getCroppedCanvasTitle">Preview</h4>
              </div>
              <div class="modal-body"><canvas width="434" height="244"></canvas></div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a class="btn btn-primary" id="save-file">Guardar</a>

              </div>
            </div>
          </div>
        </div><!-- /.modal -->

        <button type="button" class="btn btn-primary hidden" data-method="getData" data-option="" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;getData&quot;)">
            Get Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="setData" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setData&quot;, data)">
            Set Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="getContainerData" data-option="" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;getContainerData&quot;)">
            Get Container Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="getImageData" data-option="" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;getImageData&quot;)">
            Get Image Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="getCanvasData" data-option="" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;getCanvasData&quot;)">
            Get Canvas Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="setCanvasData" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setCanvasData&quot;, data)">
            Set Canvas Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="getCropBoxData" data-option="" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;getCropBoxData&quot;)">
            Get Crop Box Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="setCropBoxData" data-target="#putData">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="$().cropper(&quot;setCropBoxData&quot;, data)">
            Set Crop Box Data
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="moveTo" data-option="0">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.moveTo(0)">
            0,0
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="zoomTo" data-option="1">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.zoomTo(1)">
            100%
          </span>
        </button>
        <button type="button" class="btn btn-primary hidden" data-method="rotateTo" data-option="180">
          <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="cropper.rotateTo(180)">
            180°
          </span>
        </button>
        <input type="text" class="form-control hidden" id="putData" placeholder="Get data to here or set data with this value">
      </div><!-- /.docs-buttons -->

      <div class="col-md-3 docs-toggles" style="display: none;">
        <!-- <h3 class="page-header">Toggles:</h3> -->
        <div class="btn-group btn-group-justified" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" class="sr-only" id="aspectRatio0" name="aspectRatio" value="1.7777777777777777">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 16 / 9">
              16:9
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio1" name="aspectRatio" value="1.3333333333333333">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 4 / 3">
              4:3
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio2" name="aspectRatio" value="1">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 1 / 1">
              1:1
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio3" name="aspectRatio" value="0.6666666666666666">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: 2 / 3">
              2:3
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="aspectRatio4" name="aspectRatio" value="NaN">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="aspectRatio: NaN">
              Free
            </span>
          </label>
        </div>

        <div class="btn-group btn-group-justified" data-toggle="buttons">
          <label class="btn btn-primary active">
            <input type="radio" class="sr-only" id="viewMode0" name="viewMode" value="0" checked="">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="View Mode 0">
              VM0
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="viewMode1" name="viewMode" value="1">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="View Mode 1">
              VM1
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="viewMode2" name="viewMode" value="2">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="View Mode 2">
              VM2
            </span>
          </label>
          <label class="btn btn-primary">
            <input type="radio" class="sr-only" id="viewMode3" name="viewMode" value="3">
            <span class="docs-tooltip" data-toggle="tooltip" title="" data-original-title="View Mode 3">
              VM3
            </span>
          </label>
        </div>

        <div class="dropdown dropup docs-options">
          <button type="button" class="btn btn-primary btn-block dropdown-toggle" id="toggleOptions" data-toggle="dropdown" aria-expanded="true">
            Toggle Options
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="toggleOptions" role="menu">
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="responsive" checked="">
                responsive
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="restore" checked="">
                restore
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="checkCrossOrigin" checked="">
                checkCrossOrigin
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="checkOrientation" checked="">
                checkOrientation
              </label>
            </li>

            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="modal" checked="">
                modal
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="guides" checked="">
                guides
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="center" checked="">
                center
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="highlight" checked="">
                highlight
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="background" checked="">
                background
              </label>
            </li>

            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="autoCrop" checked="">
                autoCrop
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="movable" checked="">
                movable
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="rotatable" checked="">
                rotatable
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="scalable" checked="">
                scalable
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="zoomable" checked="">
                zoomable
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="zoomOnTouch" checked="">
                zoomOnTouch
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="zoomOnWheel" checked="">
                zoomOnWheel
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="cropBoxMovable" checked="">
                cropBoxMovable
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="cropBoxResizable" checked="">
                cropBoxResizable
              </label>
            </li>
            <li role="presentation">
              <label class="checkbox-inline">
                <input type="checkbox" name="toggleDragModeOnDblclick" checked="">
                toggleDragModeOnDblclick
              </label>
            </li>
          </ul>
        </div><!-- /.dropdown -->

        <a class="btn btn-default btn-block" data-toggle="tooltip" href="https://fengyuanchen.github.io/cropperjs" title="" data-original-title="Cropper without jQuery">Cropper.js</a>

      </div><!-- /.docs-toggles -->
    </div>
        <hr>

        <!-- Call to Action Well -->
        <div class="row" style="display:none">
            <div class="col-lg-12">
                <div class="well text-center">
                    This is a well that is a great spot for a business tagline or phone number for easy access!
                </div>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        <!-- Content Row -->
        <div class="row" style="display: none">
            <div class="col-md-4">
                <h2>Heading 1</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Heading 2</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
            <div class="col-md-4">
                <h2>Heading 3</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe rem nisi accusamus error velit animi non ipsa placeat. Recusandae, suscipit, soluta quibusdam accusamus a veniam quaerat eveniet eligendi dolor consectetur.</p>
                <a class="btn btn-default" href="#">More Info</a>
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="well">
                    <h2>Datos Personales</h2>
                    <label>Nombres</label>
                        <div id="ig-txtnombres" class="input-group"><input id="txtnombres" class="form-control" type="text" value="Daniel" readonly="readonly">            <span id="span-ig-txtnombres" class="input-group-btn">
                <button id="btn-edit-txtnombres" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtnombres" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtnombres" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Apellidos</label>
                    <div id="ig-txtapellidos" class="input-group"><input id="txtapellidos" class="form-control" type="text" value="Valentini " readonly="readonly">            <span id="span-ig-txtapellidos" class="input-group-btn">
                <button id="btn-edit-txtapellidos" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtapellidos" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtapellidos" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Domicilio</label>
                    <div id="ig-txtdomicilio" class="input-group"><input id="txtdomicilio" class="form-control" type="text" value="Arias 2345 1º B Bloque" readonly="readonly">            <span id="span-ig-txtdomicilio" class="input-group-btn">
                <button id="btn-edit-txtdomicilio" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtdomicilio" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtdomicilio" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Fecha de Nacimiento</label>
                    1990-02-12                    <div id="ig-txtdate" class="input-group"><input id="txtdate" class="form-control" type="date" value="1990-02-12" readonly="readonly">            <span id="span-ig-txtdate" class="input-group-btn">
                <button id="btn-edit-txtdate" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtdate" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtdate" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Documento</label>
                    <div id="ig-txtdocumento" class="input-group"><input id="txtdocumento" class="form-control" type="text" value="DNI 30333222" readonly="readonly">            <span id="span-ig-txtdocumento" class="input-group-btn">
                <button id="btn-edit-txtdocumento" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtdocumento" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtdocumento" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Localidad</label>
                    <div id="ig-txtlocalidad" class="input-group"><input id="txtlocalidad" class="form-control" type="text" value="Ciudad Autónoma de Buenos Aires" readonly="readonly">            <span id="span-ig-txtlocalidad" class="input-group-btn">
                <button id="btn-edit-txtlocalidad" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtlocalidad" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtlocalidad" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Provincia</label>
                    <div id="ig-txtprovincia" class="input-group"><input id="txtprovincia" class="form-control" type="text" value="Argentina" readonly="readonly">            <span id="span-ig-txtprovincia" class="input-group-btn">
                <button id="btn-edit-txtprovincia" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtprovincia" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtprovincia" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Mail</label>
                    <div id="ig-txtmail" class="input-group"><input id="txtmail" class="form-control" type="email" value="dvalentini@gmail.com" readonly="readonly">            <span id="span-ig-txtmail" class="input-group-btn">
                <button id="btn-edit-txtmail" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtmail" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtmail" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Teléfono Celular</label>
                    <div id="ig-txttelefonocelular" class="input-group"><input id="txttelefonocelular" class="form-control" type="tel" value="1226547656" readonly="readonly">            <span id="span-ig-txttelefonocelular" class="input-group-btn">
                <button id="btn-edit-txttelefonocelular" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txttelefonocelular" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txttelefonocelular" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Teléfono</label>
                    <div id="ig-txttelefono" class="input-group"><input id="txttelefono" class="form-control" type="tel" value="1567822222" readonly="readonly">            <span id="span-ig-txttelefono" class="input-group-btn">
                <button id="btn-edit-txttelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txttelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txttelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="well">
                    <h2>Datos de Emergencia</h2>
                    <label>Grupo Sanguíneo</label>
                    <div id="ig-contactosgruposanguineo" class="input-group"><input id="contactosgruposanguineo" class="form-control" type="text" value="Factor A   RH negativo" readonly="readonly">            <span id="span-ig-contactosgruposanguineo" class="input-group-btn">
                <button id="btn-edit-contactosgruposanguineo" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosgruposanguineo" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosgruposanguineo" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>                   
                    <label>Alérgico a:</label>
                    <div id="ig-contactosalergico" class="input-group"><input id="contactosalergico" class="form-control" type="text" value="Penicilina" readonly="readonly">            <span id="span-ig-contactosalergico" class="input-group-btn">
                <button id="btn-edit-contactosalergico" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosalergico" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosalergico" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Comunicarse con:</label>
                    <div id="ig-contactoscomunicarse" class="input-group"><input id="contactoscomunicarse" class="form-control" type="text" value="Lorena Nilda (Esposa)" readonly="readonly">            <span id="span-ig-contactoscomunicarse" class="input-group-btn">
                <button id="btn-edit-contactoscomunicarse" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscomunicarse" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscomunicarse" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>   
                    <label>Teléfono:</label>
                    <div id="ig-contactoscomunicarsetelefono" class="input-group"><input id="contactoscomunicarsetelefono" class="form-control" type="text" value="1154321155" readonly="readonly">            <span id="span-ig-contactoscomunicarsetelefono" class="input-group-btn">
                <button id="btn-edit-contactoscomunicarsetelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscomunicarsetelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscomunicarsetelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>   
                    
                    <label>Comunicarse con (Opción 2):</label>
                    <div id="ig-contactoscomunicarse2" class="input-group"><input id="contactoscomunicarse2" class="form-control" type="text" value="Marcelo Malon (Amigo)" readonly="readonly">            <span id="span-ig-contactoscomunicarse2" class="input-group-btn">
                <button id="btn-edit-contactoscomunicarse2" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscomunicarse2" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscomunicarse2" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>   
                    <label>Teléfono (Opción 2):</label>
                    <div id="ig-contactoscomunicarsetelefono2" class="input-group"><input id="contactoscomunicarsetelefono2" class="form-control" type="text" value="1198783214" readonly="readonly">            <span id="span-ig-contactoscomunicarsetelefono2" class="input-group-btn">
                <button id="btn-edit-contactoscomunicarsetelefono2" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscomunicarsetelefono2" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscomunicarsetelefono2" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    
                    <label>Comunicarse con (Opción 3):</label>
                    <div id="ig-contactoscomunicarse3" class="input-group"><input id="contactoscomunicarse3" class="form-control" type="text" value="Mirta New " readonly="readonly">            <span id="span-ig-contactoscomunicarse3" class="input-group-btn">
                <button id="btn-edit-contactoscomunicarse3" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscomunicarse3" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscomunicarse3" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>   
                    <label>Teléfono (Opción 3):</label>
                    <div id="ig-contactoscomunicarsetelefono3" class="input-group"><input id="contactoscomunicarsetelefono3" class="form-control" type="text" value="1134445466" readonly="readonly">            <span id="span-ig-contactoscomunicarsetelefono3" class="input-group-btn">
                <button id="btn-edit-contactoscomunicarsetelefono3" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscomunicarsetelefono3" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscomunicarsetelefono3" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    
                    <label>Médico de Cabecera</label>
                    <div id="ig-contactosmedico" class="input-group"><input id="contactosmedico" class="form-control" type="text" value="Dr. Juan Mike" readonly="readonly">            <span id="span-ig-contactosmedico" class="input-group-btn">
                <button id="btn-edit-contactosmedico" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosmedico" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosmedico" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Teléfono</label>
                    <div id="ig-contactosmedicotelefono" class="input-group"><input id="contactosmedicotelefono" class="form-control" type="phone" value="4455 7887" readonly="readonly">            <span id="span-ig-contactosmedicotelefono" class="input-group-btn">
                <button id="btn-edit-contactosmedicotelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosmedicotelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosmedicotelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Cobertura Médica</label>
                    <div id="ig-contactoscobertura" class="input-group"><input id="contactoscobertura" class="form-control" type="text" value="OMINT" readonly="readonly">            <span id="span-ig-contactoscobertura" class="input-group-btn">
                <button id="btn-edit-contactoscobertura" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactoscobertura" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactoscobertura" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Plan</label>
                    <div id="ig-contactosplan" class="input-group"><input id="contactosplan" class="form-control" type="text" value="DUO" readonly="readonly">            <span id="span-ig-contactosplan" class="input-group-btn">
                <button id="btn-edit-contactosplan" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosplan" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosplan" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Nro. Socio</label>
                    <div id="ig-contactosnrosocio" class="input-group"><input id="contactosnrosocio" class="form-control" type="text" value="100022-42234324" readonly="readonly">            <span id="span-ig-contactosnrosocio" class="input-group-btn">
                <button id="btn-edit-contactosnrosocio" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosnrosocio" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosnrosocio" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Telefono</label>
                    <div id="ig-contactosostelefono" class="input-group"><input id="contactosostelefono" class="form-control" type="text" value="0-800-222-9876" readonly="readonly">            <span id="span-ig-contactosostelefono" class="input-group-btn">
                <button id="btn-edit-contactosostelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactosostelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactosostelefono" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                    <label>Sitio Web</label>
                    <div id="ig-contactososweb" class="input-group"><input id="contactososweb" class="form-control" type="text" value="www.omint.com.ar" readonly="readonly">            <span id="span-ig-contactososweb" class="input-group-btn">
                <button id="btn-edit-contactososweb" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-contactososweb" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-contactososweb" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                </div>
            </div>


    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="well">
                <h4>Observaciones
                <div id="ig-txtobservaciones" class="input-group"><textarea id="txtobservaciones" class="form-control" style="height: 250px" readonly="readonly">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vitae metus eu sapien sodales pellentesque. Donec lacinia turpis vitae est posuere accumsan. Vestibulum tincidunt, ante sed bibendum viverra, eros velit eleifend magna, ac dapibus ipsum augue vitae diam. Donec at metus non dui pretium molestie in et mauris. Vivamus ultrices lorem quis ultrices ultricies. Quisque ornare nisi nulla, eu rhoncus arcu dignissim vel. Suspendisse sit amet auctor dolor. Vestibulum elementum hendrerit rutrum. Ut ac semper massa, non cursus justo. Quisque finibus erat nunc, vel consectetur libero imperdiet pretium. Nam bibendum pharetra eleifend. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Integer ut lacus cursus, sagittis urna id, ultricies dolor.

Ver que mas se puede agregar</textarea>            <span id="span-ig-txtobservaciones" class="input-group-btn">
                <button id="btn-edit-txtobservaciones" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtobservaciones" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtobservaciones" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
            </h4></div>
        </div>
    </div> 
    <div class="row">
        <div class="col-lg-12">
            <h4 class="page-header">Datos de la cuenta</h4>
                <label>Usuario</label>
                <input class="form-control" type="email" value="daniel.valentini@gmail.com" readonly="">
                <br>
                <a class="btn btn-info">Cambiar Contraseña</a>
        </div>
    </div> 
        

        <script src="plugins/cropper/dist/croper-main.js"></script>

    <!-- Footer -->
            <footer>
            <div class="row" style="display: none">
                <div class="col-lg-12">
                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&amp;txt=Publicidad&amp;w=890&amp;h=100" class="img-responsive center-block" alt="banner">
                    
               </div>
            </div>
        </footer>
     

    <script type="text/javascript" src="js/mbeditip.js?v=!"></script>

    <!-- Bootstrap Core JavaScript -->
    <script>$("#li-profile").addClass(' active');</script>
    <script>
        
    

        $( "#txtnombres" ).editip(function(){
            actualizarcontacto(3, 'contactosnombres',$( "#txtnombres" ).val(), 1);            
        });
        $( "#txtapellidos" ).editip(function(){
            actualizarcontacto(3, 'contactosapellidos',$( "#txtapellidos" ).val(), 1);        
        });
        
        $( "#txtdomicilio" ).editip(function(){
            actualizarcontacto(3, 'contactosdomicilio',$( "#txtdomicilio" ).val(), 1);        
        });
        
        $( "#txtdocumento" ).editip(function(){
            actualizarcontacto(3, 'contactosdocumento',$( "#txtdocumento" ).val(), 1);        
        });
        
        $( "#txtdate" ).editip(function(){
            actualizarcontacto(3, 'contactosfechanacimiento',$( "#txtdate" ).val(), 1);        
        });
        $( "#txtobservaciones" ).editip(function(){
            actualizarcontacto(3, 'contactosnotas', $( "#txtobservaciones" ).val(), 1);        
        });
        $( "#txtlocalidad" ).editip(function(){
            actualizarcontacto(3, 'contactoslocalidad',$( "#txtlocalidad" ).val(), 1);        
        });
        $( "#txtprovincia" ).editip(function(){
            actualizarcontacto(3, 'contactosprovincia',$( "#txtprovincia" ).val(), 1);        
        });
        $( "#txtmail" ).editip(function(){
            actualizarcontacto(3, 'contactosmail',$( "#txtmail" ).val(), 1);        
        });
        $( "#txttelefonocelular" ).editip(function(){
            actualizarcontacto(3, 'contactostelefonocelular',$( "#txttelefonocelular" ).val(), 1);        
        });
        $( "#txttelefono" ).editip(function(){
            actualizarcontacto(3, 'contactostelefono',$( "#txttelefono" ).val(), 1);        
        });

        $( "#contactosgruposanguineo" ).editip(function(){
            actualizarcontacto(3, 'contactosgruposanguineo',$( "#contactosgruposanguineo" ).val(), 1);        
        });
                $( "#contactosalergico" ).editip(function(){
            actualizarcontacto(3, 'contactosalergico',$( "#contactosalergico" ).val(), 1);        
        });
                $( "#contactosmedico" ).editip(function(){
            actualizarcontacto(3, 'contactosmedico',$( "#contactosmedico" ).val(), 1);        
        });
                $( "#contactosmedicotelefono" ).editip(function(){
            actualizarcontacto(3, 'contactosmedicotelefono',$( "#contactosmedicotelefono" ).val(), 1);        
        });
                $( "#contactoscobertura" ).editip(function(){
            actualizarcontacto(3, 'contactoscobertura',$( "#contactoscobertura" ).val(), 1);        
        });
                $( "#contactosplan" ).editip(function(){
            actualizarcontacto(3, 'contactosplan',$( "#contactosplan" ).val(), 1);        
        });
                $( "#contactosnrosocio" ).editip(function(){
            actualizarcontacto(3, 'contactosnrosocio',$( "#contactosnrosocio" ).val(), 1);        
        });
                $( "#contactoscomunicarse" ).editip(function(){
            actualizarcontacto(3, 'contactoscomunicarse',$( "#contactoscomunicarse" ).val(), 1);        
        });
                $( "#contactoscomunicarsetelefono" ).editip(function(){
            actualizarcontacto(3, 'contactoscomunicarsetelefono',$( "#contactoscomunicarsetelefono" ).val(), 1);        
        });

               $( "#contactoscomunicarse2" ).editip(function(){
            actualizarcontacto(3, 'contactoscomunicarse2',$( "#contactoscomunicarse2" ).val(), 1);        
        });
                $( "#contactoscomunicarsetelefono2" ).editip(function(){
            actualizarcontacto(3, 'contactoscomunicarsetelefono2',$( "#contactoscomunicarsetelefono2" ).val(), 1);        
        });
        
              $( "#contactoscomunicarse3" ).editip(function(){
            actualizarcontacto(3, 'contactoscomunicarse3',$( "#contactoscomunicarse3" ).val(), 1);        
        });
                $( "#contactoscomunicarsetelefono3" ).editip(function(){
            actualizarcontacto(3, 'contactoscomunicarsetelefono3',$( "#contactoscomunicarsetelefono3" ).val(), 1);        
        });
        $( "#contactosostelefono" ).editip(function(){
            actualizarcontacto(3, 'contactosostelefono',$( "#contactosostelefono" ).val(), 1);        
        });
        $( "#contactososweb" ).editip(function(){
            actualizarcontacto(3, 'contactososweb',$( "#contactososweb" ).val(), 1);        
        });

//$('#img-perfil').cropper({
//  aspectRatio: 16 / 9,
//  crop: function(e) {
//    // Output the result data for cropping image.
//    console.log(e.x);
//    console.log(e.y);
//    console.log(e.width);
//    console.log(e.height);
//    console.log(e.rotate);
//    console.log(e.scaleX);
//    console.log(e.scaleY);
//  }
//});

$('#btn-cancelar').on('click', function(){
    $('#img-perfil').cropper('destroy');
    $('#botones-edicion').hide();
});


$('#img-perfil').on('click', function(){
  $image.on({
    'build.cropper': function (e) {
      console.log(e.type);
    },
    'built.cropper': function (e) {
      console.log(e.type);
    },
    'cropstart.cropper': function (e) {
      console.log(e.type, e.action);
    },
    'cropmove.cropper': function (e) {
      console.log(e.type, e.action);
    },
    'cropend.cropper': function (e) {
      console.log(e.type, e.action);
    },
    'crop.cropper': function (e) {
      console.log(e.type, e.x, e.y, e.width, e.height, e.rotate, e.scaleX, e.scaleY);
    },
    'zoom.cropper': function (e) {
      console.log(e.type, e.ratio);
    }
  }).cropper(options);
  
        $('#botones-edicion').show();
});

$('#save-file').on('click', function (){
 result = $('#img-perfil').cropper('getCroppedCanvas');
 
 
 
 
 var blobUpload = result.toDataURL();
 
 actualizarcontacto(2, 'contactosimagen', blobUpload, 1, function(){
    $('#img-perfil').cropper('destroy');
    $('#botones-edicion').hide();
    $('#img-perfil').attr("src",blobUpload);
    $('#getCroppedCanvasModal').modal('hide');
     
 });
 
});

function resizeImagen(){
        var mainCanvas;
        var deferred = $.Deferred();
        var img = new Image();
        var halfSize = function (i) {
           var canvas = document.createElement("canvas");
           canvas.width = i.width / 2;
           canvas.height = i.height / 2;
           var ctx = canvas.getContext("2d");
           ctx.drawImage(i, 0, 0, canvas.width, canvas.height);
           return canvas;
       };

        img.onload = function() {
            deferred.resolve(img);
        };
        
        
        img.src = $("#img-perfil").attr('src');
        
        mainCanvas = document.createElement("canvas");
    
        mainCanvas.width = img.width;
        mainCanvas.height = img.height;
        var ctx = mainCanvas.getContext("2d");
        ctx.drawImage(img, 0, 0, mainCanvas.width, mainCanvas.height);
        size = parseInt(128, 10);
        while (mainCanvas.width > size) {
            mainCanvas = halfSize(mainCanvas);
        }
        
      
        $('#img-perfil').attr('src', mainCanvas.toDataURL("image/jpeg"));
        
     

}
    </script>
    



</div>
@endsection

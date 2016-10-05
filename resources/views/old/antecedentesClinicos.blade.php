@extends('old.layoutInitial')
@section('content')
<script>
     $(function () {
      
     $("#liAC").addClass('active');

    });
</script>
<div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-2">
                <img class="img-responsive img-rounded" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg" alt="">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-10">
                    <h1 id="h1-nombre">Daniel Valentini</h1>                
                    <p>DNI 28695777 Edad: 33 años </p>
                    <p>Domicilio: Arias Ciudad Autónoma de Buenos Aires</p>
                    <p>Argentina</p>                
            </div>

        </div>
        <!-- /.row -->

        <hr>
        <!-- Content Row Grilla para Documentos-->
        <div class="row">
            <div class="col-md-12">
                <h3 class="page-header" style="margin-top: -10px">Antecendentes Clínicos  </h3>
             <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">General</a></li>
              <li role="presentation"><a href="#internaciones" aria-controls="internaciones" role="tab" data-toggle="tab">Internaciones</a></li>
              <li role="presentation"><a href="#medicacion" aria-controls="medicacion" role="tab" data-toggle="tab">Medicación</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">
                    <div class="row">
                        <div class="col-md-12">
                            <br><label>Enfermedad de Base</label><br>
                            <div id="ig-txtenfermedadbase" class="input-group"><textarea id="txtenfermedadbase" class="form-control" style="height: 150px" readonly="readonly">HIPERTENSION ARTERIAL
ASMA CRONICA


</textarea>            <span id="span-ig-txtenfermedadbase" class="input-group-btn">
                <button id="btn-edit-txtenfermedadbase" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtenfermedadbase" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtenfermedadbase" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>
                            <br><label>Alergias</label>
                            <div id="ig-txtalergias" class="input-group"><input id="txtalergias" class="form-control" type="text" value="PENICILINA" readonly="readonly">            <span id="span-ig-txtalergias" class="input-group-btn">
                <button id="btn-edit-txtalergias" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtalergias" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtalergias" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>                        
                            <br><label>Implantes</label>
                            <div id="ig-txtimplantes" class="input-group"><input id="txtimplantes" class="form-control" type="text" value="Marcapasos, con respuesta al esfuerzo" readonly="readonly">            <span id="span-ig-txtimplantes" class="input-group-btn">
                <button id="btn-edit-txtimplantes" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtimplantes" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtimplantes" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>                        
                            <br><label>Antitetánica</label>
                            <div id="ig-txtanti" class="input-group"><input id="txtanti" class="form-control" type="text" value="Aplicada el 12/01/2016" readonly="readonly">            <span id="span-ig-txtanti" class="input-group-btn">
                <button id="btn-edit-txtanti" class="btn btn-default" type="button"><i class="glyphicon glyphicon-pencil"></i></button>
                <button style="display:none;" id="btn-save-txtanti" class="btn btn-default" type="button"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                <button style="display:none;" id="btn-cancel-txtanti" class="btn btn-default" type="button"><i class="glyphicon glyphicon-remove"></i></button>
            </span></div>                        
                            <br>
                            <label>Hábitos Personales</label><br>
                            <input type="checkbox" aria-label="..."> <span>Bebe </span>
                            <input type="checkbox" aria-label="..."> <span>Fuma </span>
                            <input type="checkbox" aria-label="..."> <span>Practica Derporte </span>

                         </div>
                    </div>
  
                </div>
                <div role="tabpanel" class="tab-pane" id="internaciones">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-default pull-right" id="btn-agregar-internacion"> Agregar</a><br>
                            <div id="div-internaciones"><div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Descripción</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <tr>
                        <td style="width:120px"><input type="date" style="border:none;" id="varios-date-31" value="2016-05-17" onchange="actualizarvarios(12, 'variosfecha', $('#varios-date-31').val() + ' 00:00:00', 31)"></td>
                        <td><textarea id="varios-descripcion-31" class="form-control" style="height:auto;" onblur="actualizarvarios(12, 'variosdescripcion', $('#varios-descripcion-31').val(), 31)">Operación de un quiste en la rodilla, sanatorio otamendi, dr dario luis perez cel 155.897.6547</textarea></td>
                        <td><a class="fa fa-trash-o" onclick="eliminarInternacion(31, function(){dibujaInternaciones();});"></a></td>
                        </tr> <tr>
                        <td style="width:120px"><input type="date" style="border:none;" id="varios-date-48" value="2015-08-11" onchange="actualizarvarios(12, 'variosfecha', $('#varios-date-48').val() + ' 00:00:00', 48)"></td>
                        <td><textarea id="varios-descripcion-48" class="form-control" style="height:auto;" onblur="actualizarvarios(12, 'variosdescripcion', $('#varios-descripcion-48').val(), 48)">Cirugía endoscopica de Epiplón - Trinidad Quilmes</textarea></td>
                        <td><a class="fa fa-trash-o" onclick="eliminarInternacion(48, function(){dibujaInternaciones();});"></a></td>
                        </tr>    </tbody></table>
                        </div></div>
                        </div>
                    </div>
     
                </div>
                <div role="tabpanel" class="tab-pane" id="medicacion">
                    <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-default pull-right" id="btn-agregar-medicacion"> Agregar</a><br>
                            <div id="div-medicacion"><div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Droga</th>
                                        <th>Posología</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <tr>
                        <td><input id="varios-medicacion-nombre-32" class="form-control" type="text" onblur="actualizarvarios(12, 'variosdescripcion', $('#varios-medicacion-nombre-32').val(), 32)" value="IBUPIRAC FLEX"></td>
                        <td><input id="varios-medicacion-aux1-32" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux1', $('#varios-medicacion-aux1-32').val(), 32)" value="Ibuprofeno + Diclofenac"></td>
                        <td><input id="varios-medicacion-aux2-32" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux2', $('#varios-medicacion-aux2-32').val(), 32)" value="1 por dia"></td>
                        <td><a class="fa fa-trash-o" onclick="eliminarMedicacion(32, function(){dibujaMedicaciones();});"></a></td>
                        </tr> <tr>
                        <td><input id="varios-medicacion-nombre-40" class="form-control" type="text" onblur="actualizarvarios(12, 'variosdescripcion', $('#varios-medicacion-nombre-40').val(), 40)" value="AMPIPLOX"></td>
                        <td><input id="varios-medicacion-aux1-40" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux1', $('#varios-medicacion-aux1-40').val(), 40)" value="ampicilina  500mg"></td>
                        <td><input id="varios-medicacion-aux2-40" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux2', $('#varios-medicacion-aux2-40').val(), 40)" value="1 comp cada 12hs"></td>
                        <td><a class="fa fa-trash-o" onclick="eliminarMedicacion(40, function(){dibujaMedicaciones();});"></a></td>
                        </tr> <tr>
                        <td><input id="varios-medicacion-nombre-47" class="form-control" type="text" onblur="actualizarvarios(12, 'variosdescripcion', $('#varios-medicacion-nombre-47').val(), 47)" value="TAURAL"></td>
                        <td><input id="varios-medicacion-aux1-47" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux1', $('#varios-medicacion-aux1-47').val(), 47)" value="RANITIDINA"></td>
                        <td><input id="varios-medicacion-aux2-47" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux2', $('#varios-medicacion-aux2-47').val(), 47)" value="1 COMP ANTES DE CADA COMIDA"></td>
                        <td><a class="fa fa-trash-o" onclick="eliminarMedicacion(47, function(){dibujaMedicaciones();});"></a></td>
                        </tr> <tr>
                        <td><input id="varios-medicacion-nombre-50" class="form-control" type="text" onblur="actualizarvarios(12, 'variosdescripcion', $('#varios-medicacion-nombre-50').val(), 50)" value=""></td>
                        <td><input id="varios-medicacion-aux1-50" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux1', $('#varios-medicacion-aux1-50').val(), 50)" value=""></td>
                        <td><input id="varios-medicacion-aux2-50" class="form-control" type="text" onblur="actualizarvarios(12, 'variosaux2', $('#varios-medicacion-aux2-50').val(), 50)" value=""></td>
                        <td><a class="fa fa-trash-o" onclick="eliminarMedicacion(50, function(){dibujaMedicaciones();});"></a></td>
                        </tr>    </tbody></table>
                        </div></div>
                        </div>
                    </div>

                </div>
            </div>
            
                
                
              
                

            </div>
        </div>
        <!-- /.row -->

        <!-- Footer -->
                <footer>
            <div class="row" style="display: none">
                <div class="col-lg-12">
                    <img src="https://placeholdit.imgix.net/~text?txtsize=33&amp;txt=Publicidad&amp;w=890&amp;h=100" class="img-responsive center-block" alt="banner">
                    
               </div>
            </div>
        </footer>

    </div>
@endsection
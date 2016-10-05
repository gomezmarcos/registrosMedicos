@extends('old.layoutInitial')
@section('content')
<script>
     $(function () {
      
     $("#liEC").addClass('active');

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
                    <h1 id="h1-nombre">Daniel Rossaro</h1>                
                    <p>DNI 28695708 Edad: 33 años </p>
                    <p>Domicilio: Caracas 2345 1º B Bloque Ciudad Autónoma de Buenos Aires</p>
                    <p>Argentina</p>                
            </div>
            <!-- /.col-md-4 -->
        </div>
        <!-- /.row -->

        <hr>

        <!-- Call to Action Well -->
        <div class="row">
            <div class="col-lg-12">
                <h3 class="page-header" style="margin-top: -10px">Estudios Clínicos  </h3>
                 <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Laboratorio</a></li>
                  <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">RX</a></li>
                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Ecografías</a></li>
                  <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Otros</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="home">
                        <br>
                        <button class="btn btn-default pull-right btn-mock" id="btn-nuevo-laboratorio">Nuevo</button>
                        <div id="div-laboratorio"><div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <tr id="row-lab-55">
                        <td style="">2016-05-26 12:51:17</td>
                        <td>Receta toma de medicacion hg</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/orden_laboratorio.jpg">
                            <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(55, function(){$('#row-lab-55').hide();});"></i></a></td>
                        </tr> <tr id="row-lab-56">
                        <td style="">2016-05-27 10:59:58</td>
                        <td>Nuevo Estudio</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/orden_laboratorio.jpg">
                            <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(56, function(){$('#row-lab-56').hide();});"></i></a></td>
                        </tr> <tr id="row-lab-61">
                        <td style="">2016-05-30 13:18:59</td>
                        <td>Estudio Test</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/orden_laboratorio.jpg">
                            <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(61, function(){$('#row-lab-61').hide();});"></i></a></td>
                        </tr>     </tbody></table>
                        </div></div>
                    </div>
                  <div role="tabpanel" class="tab-pane" id="profile">                        
                        <br>
                        <button class="btn btn-default pull-right btn-mock" id="btn-nuevo-rx">Nuevo</button>
                        <div id="div-rx"><div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <tr id="row-lab-54">
                        <td style="">2016-05-24 12:07:11</td>
                        <td>Tomografia Computada de Cerebro</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/orden_laboratorio.jpg">
                            <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(54, function(){$('#row-lab-54').hide();});"></i></a></td>
                        </tr>    </tbody></table>
                        </div></div>                </div>
                    <div role="tabpanel" class="tab-pane col-md-12" id="messages">
                        <br>
                        <button class="btn btn-default pull-right col-md-1 btn-mock" id="btn-nuevo-eco">Nuevo</button>
                        <div id="div-eco" class="col-md-12" style="margin:10px">
                            <div class="well">
                                No hay estudios cargados.
                            </div>
                        </div>                 
                    </div>
                    <div role="tabpanel" class="tab-pane" id="settings">
                        <br>
                        <button class="btn btn-default pull-right btn-mock" id="btn-nuevo-otros">Nuevo</button>
                        <div id="div-otros"><div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Nombre</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <tr id="row-lab-63">
                        <td style="">2016-05-30 23:33:53</td>
                        <td>Nuevo Estudio</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/orden_laboratorio.jpg">
                            <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(63, function(){$('#row-lab-63').hide();});"></i></a></td>
                        </tr> <tr id="row-lab-64">
                        <td style="">2016-06-01 20:31:51</td>
                        <td>Nuevo Estudio</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/orden_laboratorio.jpg">
                            <i class="fa fa-eye"></i>
                            </a>
                        </td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(64, function(){$('#row-lab-64').hide();});"></i></a></td>
                        </tr>    </tbody></table>
                        </div></div> 
                    </div>
                </div>

                
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->


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
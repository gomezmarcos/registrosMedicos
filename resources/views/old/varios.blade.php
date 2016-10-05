@extends('old.layoutInitial')
@section('content')
<script>
     $(function () {
      
     $("#liV").addClass('active');

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

<div class="row">
            <div class="col-lg-12">
                <h3 class="page-header" style="margin-top: -10px">Varios</h3>
                </div>
                </div>
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
                        <td>Constancia de CUIT</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/constancia_cuil.jpg">
                        <i class="fa fa-eye"></i></a></td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(55, function(){$('#row-lab-55').hide();});"></i></a></td>
                        </tr> <tr id="row-lab-56">
                        <td style="">2016-05-27 10:59:58</td>
                        <td>Documento Nacional de Identidad</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/constancia_cuil.jpg">
                        <i class="fa fa-eye"></i></a></td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(56, function(){$('#row-lab-56').hide();});"></i></a></td>
                        </tr> <tr id="row-lab-61">
                        <td style="">2016-05-30 13:18:59</td>
                        <td>Pasaporte</td>
                        <td></td>
                        <td><a href="http://localhost/dev.clinica/public/img/constancia_cuil.jpg">
                        <i class="fa fa-eye"></i></a></td>
                        <td style="text-align:right;"><a><i class="fa fa-trash-o" onclick="eliminarEstudio(61, function(){$('#row-lab-61').hide();});"></i></a></td>
                        </tr>     </tbody></table>
                        </div></div>
  </div> <!-- end container -->
@endsection
@extends('old.layoutInitial')
@section('content')
<script>
     $(function () {
      
     $("#liDP").addClass('active');

    });
</script>
<div class="container">

        <!-- Heading Row -->
        <div class="row">
            <div class="col-md-2">
                        <img class="img-responsive img-rounded" alt="Perfil" id="img-perfil" src="http://today.ucf.edu/files/2012/02/Madani-Kaveh-2-21-12-396x3961.jpg">
            </div>
            <!-- /.col-md-8 -->
            <div class="col-md-10">
                <h1 id="h1-nombre">Daniel Valentini</h1>
                <div id ="div-resumen" style="display: block;">
                    <p>DNI 33321111 Edad: 36 años </p>
                    <p>Domicilio: Arias 1233 Ciudad Autónoma de Buenos Aires</p>
                    <p>Argentina</p>
                    <p><h4 class="page-header" style="color: red">Información en Caso de Emergencia</h4>
                    <div class="well">
                    <i class="glyphicon glyphicon-tint red"></i> Grupo Sanguíneo: <label class="label label-danger">Factor A   RH positivo</label><br><br>
                    <i class="glyphicon glyphicon-ban-circle"></i> Alergías:  <label class="label label-danger">Penicilina</label><br><br>
                    <i class="glyphicon glyphicon-scissors"></i> Implantes:  <label class="label label-danger">Cadera</label><br><br>
                    <i class="glyphicon glyphicon-option-vertical"></i> Antitetánica: Aplicada el 12/01/2015<br><br>
                    </div>
                    <div class="well">
                    <h4 style="font-weight: bold;">Cobertura Médica</h4>
                    <p>OSDE 310 9999 3322 5678 1223</p>
                    <p>Télefonos: 0-800-222-OSDE</p>
                    <p>Sitio Web: www.osde.com.ar </p>
                    </div>
               
                    <div class="well">
                    <i class="glyphicon glyphicon-plus-sign"></i> Médico de cabecera: <strong>Dr. Alberto Marccisio</strong>  <strong><label class="label label-danger">4555 5555</label></strong><br>
                    </div>
                
                    <div class="well">
        
                    <h4 style="font-weight: bold;">Contactar en caso de Emergencia</h4><br>
                    <i class="glyphicon glyphicon-user"></i>   Lorena Esposito (Esposa) Nro. <strong><label class="label label-danger">11 6 234 4455</label></strong><br><br>
                    <i class="glyphicon glyphicon-user"></i>   Adrián Bertoni (Amigo) Nro. <strong><label class="label label-danger">1531134567</label></strong><br><br>
                    <i class="glyphicon glyphicon-user"></i>   Beatriz Nogueira  Nro. <strong><label class="label label-danger">1598876554</label></strong><br><br>
                    </div>  
@endsection

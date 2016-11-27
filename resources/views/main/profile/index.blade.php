@extends('layoutInitial')

@section('stylesAndScripts')
    <script src="{{env('APP_STATIC_PATH')}}/js/module/module-profile.js"></script>
    <!--<script src="/js/module/module-profile.js"></script>-->
@endsection

@section('title')
   <title>RMP::Editar Perfil</title>
@endsection

@section('content')
<div class="container">
    <h3 class="page-header">Editar Perfil</h3>
<p>En esta seccion podremos editar informacion para que ante alguna eventualidad, nuestros datos esten claros y la ayuda sea pertinente.</p>


    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#generalData">Datos Personales</a></li>
        <li><a data-toggle="tab" href="#healthCare">Obra Social</a></li>
        <li><a data-toggle="tab" href="#contacts">Contactos</a></li>
        <li><a data-toggle="tab" href="#headDoctor">Medico de Cabecera</a></li>
    </ul>

    <div class="tab-content">
        @include('main.profile.generalData')
        @include('main.profile.healthCare')
        @include('main.profile.contacts')
        @include('main.profile.headDoctor')
    </div>
</div> <!-- end container -->
@endsection

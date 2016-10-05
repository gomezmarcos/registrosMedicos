@extends('layoutInitial')

@section('stylesAndScripts')
    <script src="/js/module/module-profile.js"></script>
@endsection

@section('title')
   <title>RMP::Editar Perfil</title>
@endsection

@section('content')
<div class="container">
    <h3 class="page-header">Editar Perfil</h3>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#generalData">Datos Personales</a></li>
        <li><a data-toggle="tab" href="#info">Info</a></li>
        <li><a data-toggle="tab" href="#healthCare">Obra Social</a></li>
        <li><a data-toggle="tab" href="#contacts">Contactos</a></li>
        <li><a data-toggle="tab" href="#headDoctor">Medico de Cabecera</a></li>
    </ul>

    <div class="tab-content">
        @include('main.profile.generalData')
        @include('main.profile.info')
        @include('main.profile.healthCare')
        @include('main.profile.contacts')
        @include('main.profile.headDoctor')
    </div>
</div> <!-- end container -->
@endsection
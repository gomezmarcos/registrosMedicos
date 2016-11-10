@extends('layoutInitial')

@section('stylesAndScripts')
    <script src="/js/module/module-clinicHistory-admittion.js"></script>
    <script src="/js/module/module-clinicHistory-medication.js"></script>
@endsection

@section('title')
   <title>RMP::Antecedentes Clinicos</title>
@endsection

@section('content')
<div class="container">
    <h3 class="page-header">Antecedentes Clinicos</h3>
    <div class="alert alert-info text-center" >Aqui puede cargar toda la documentacion con sus antecedentes para ayudar a conseguir un mejor diagnostico.</div>

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#generalData">General</a></li>
        <li><a data-toggle="tab" href="#admittions">Internaciones</a></li>
        <li><a data-toggle="tab" href="#medications">Medicamentos</a></li>
    </ul>

    <div class="tab-content">
        @include('main.clinicHistory.generalData')
        @include('main.clinicHistory.admittions')
        @include('main.clinicHistory.medications')
    </div>
</div> <!-- end container -->
@endsection

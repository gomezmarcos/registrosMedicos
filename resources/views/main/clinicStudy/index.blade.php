@extends('layoutInitial')

@section('stylesAndScripts')
    <script src="/js/module/module-clinicStudy-laboratory.js"></script>
    <script src="/js/module/module-clinicStudy-rx.js"></script>
    <script src="/js/module/module-clinicStudy-eco.js"></script>
    <script src="/js/module/module-clinicStudy-otro.js"></script>
@endsection

@section('title')
   <title>RMP::Estudios Clinicos</title>
@endsection

@section('content')
<div class="container">
    <h3 class="page-header">Estudios Clinicos</h3>
<script >
    $(function () {
        $(".container>ul.nav li").removeClass('active');
        $("a[href='#{{$study}}']").click();
    });

</script>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#laboratory">Laboratorio</a></li>
        <li><a data-toggle="tab" href="#rx">RX</a></li>
        <li><a data-toggle="tab" href="#eco">Ecografias</a></li>
        <li><a data-toggle="tab" href="#other">Otros</a></li>
    </ul>

    <div class="tab-content">
        @include('main.clinicStudy.laboratory')
        @include('main.clinicStudy.rx')
        @include('main.clinicStudy.eco')
        @include('main.clinicStudy.other')
    </div>
</div> <!-- end container -->


@endsection

@extends('layoutTyc') 

@section('content')
<div class="container">
    <div class="row">
    <!--<form class="form-horizontal" role="form" method="POST" action="{{ url('/tyc/store') }}">-->
    <form class="form-horizontal" role="form" method="POST" action="/tyc/store">
        {{ csrf_field() }}
        <p>
        hola holhola holhola holhola holhola holhola holhola holhola holhola holaaaaaaaaahola hola
hola holahola holahola holahola holahola holahola holahola holahola holahola holahola holahola hola
hola holahola holahola holahola holahola holahola holahola holahola holahola holahola holahola hola
hola holahola holahola holahola holahola holahola holahola holahola holahola holahola holahola hola
        </p>
        <input type="submit" value="Aceptar Terminos" class="btn btn-success"/>
        <a href="/logout" class="btn btn-danger">No Aceptar Terminos</a>
    </form>
   </div>
</div>
@endsection

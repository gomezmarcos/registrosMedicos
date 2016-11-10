@extends('layoutInitial') 

@section('content')
<div class="container">
    <div class="row">
    <!--<form class="form-horizontal" role="form" method="POST" action="{{ url('/tyc/store') }}">-->
    <form class="form-horizontal" role="form" method="POST" action="/tyc/store">
        {{ csrf_field() }}
        hola hola
        <input type="submit" value="Aceptar"/>
    </form>
   </div>
</div>
@endsection

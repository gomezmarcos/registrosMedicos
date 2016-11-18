@extends('layoutInitial')
@section('content')
<script>
     $(function () {
      
      $("a[href='/resume']").parent().addClass("active");//actualiza el nav general activo
     $("#liDP").addClass('active');

    });
</script>
<div class="container">

<div class="media">
  <div class="media-left">
    <img class="media-object  img-rounded" style="width:200px" alt="Perfil" id="img-perfil" src="{{$dp->path or '/images/admin/no_user.png'}}">
  </div>
  <div class="media-body">
<p>
    <h1 class="media-heading">{{$p->lastNames . ', ' . $p->names}}</h1>
    <p style="margin-left:15px">
            <b>
            @if ( $p->dniType  !== '')
                {{$p->dniType}} 
            @else
                DNI
            @endif
            :</b>
            {{$p->dni}} <br>
            @if ( $p->birthDate  !== '')
                <b>Fecha de Nacimiento: </b>{{$p->birthDate }}</br>
            @endif
            {{($p->address!== '')? $p->address . ', ' :  ''}} 
            {{($p->city!== '')? $p->city . ', ' :  ''}} 
            {{($p->state!== '')? $p->state . '- ' :  ''}} 
            {{($p->country!== '')? $p->country . '.' :  ''}} </br>
    </p>
  </div>

    <ul class="nav nav-tabs">
        <h4 class="page-header" style="color: red">Información en Caso de Emergencia</h4></br>
        <li class="active"><a data-toggle="tab" href="#contacto">Datos Personales</a></li>
        <li><a data-toggle="tab" href="#info">Informacion General</a></li>
        <li><a data-toggle="tab" href="#obraSocial">Obra Social</a></li>
        <li><a data-toggle="tab" href="#cercanos">Contactos Cercanos</a></li>
        <li><a data-toggle="tab" href="#medicos">Medicos de Cabecera</a></li>
    </ul>

    <div class="tab-content">
        <div id="contacto" class="tab-pane active">
            <div style="margin:20px">
                <p>Datos de contacto para ubicar al titular del servicio.</p>
                <table class="table table-hover">
                    @if ( $p->email1  !== '')
                    <tr><td><i class="glyphicon glyphicon-envelope"></i></td><td>{{ $p->email1 or ''}}<span></td></tr>
                    @endif
                    @if ( $p->email2  !== '')
                    <tr><td><i class="glyphicon glyphicon-envelope"></i></td><td>{{ $p->email2 or ''}}</td>
                    @endif
                    @if ( $p->cellPhone1  !== '')
                    <tr><td><i class="glyphicon glyphicon-phone"></i></td><td>{{ $p->cellPhone1 or ''}}</td>
                    @endif
                    @if ( $p->cellPhone2  !== '')
                    <tr><td><i class="glyphicon glyphicon-phone"></i></td><td>{{ $p->cellPhone2 or ''}}</td>
                    @endif
                    @if ( $p->phone1  !== '')
                    <tr><td><i class="glyphicon glyphicon-phone-alt"></i></td><td>{{ $p->phone1 or ''}}</td>
                    @endif
                    @if ( $p->phone2  !== '')
                    <tr><td><i class="glyphicon glyphicon-phone-alt"></i></td><td>{{ $p->phone2 or ''}}</td>
                    @endif
                </table>
            </div>
        </div>
        <div id="info" class="tab-pane fade">
            <div style="margin:20px">
                <p>Informacion importante que debe ser tenida en cuenta antes de una intervencion importante.</p>
                <table class="table table-hover">
                    <tr><td>Grupo Sanguineo</td><td>{{ $pi->bloodType or 'No ha sido cargado'}}</td></tr>
                    <tr><td>Alergias</td><td>{{ $pi->allergies or 'No han sido cargadas'}}</td></tr>
                    <tr><td>Implantes</td><td>{{ $pi->implants or 'No han sido cargados'}}</td></tr>
                    <tr><td>Vacunas</td><td>{{ $pi->vaccines or 'No han sido cargadas'}}</td></tr>
                    <tr><td>Antecedentes Familiares</td><td>{{ $pi->antecedentes or 'No han sido cargadas'}}</td></tr>
                </table>
            </div>
        </div>
        <div id="obraSocial" class="tab-pane fade">
                    <div style="margin:20px">
                        <p>Informacion de la Obra Social.</p>
                        <table class="table table-hover">
                        <tr><td>Empresa</td><td>{{ $phc->name or 'No ha sido cargado'}}</td></tr>
                        <tr><td>Plan</td><td>{{ $phc->plan or 'No ha sido cargado'}}</td></tr>
                        <tr><td>Numero de Cliente</td><td>{{ $phc->healthCareId or 'No ha sido cargado'}}</td></tr>
                        <tr><td>Telefono</td><td>{{ $phc->phone or 'No ha sido cargado'}}</td></tr>
                        <tr><td>Sitio Web</td><td>{{ $phc->web or 'No ha sido cargado'}}</td></tr>
                        <tr><td>Contacto</td><td>{{ $phc->contact or 'No ha sido cargado'}}</td></tr>
                        </table>
                    </div>
        </div>
        <div id="cercanos" class="tab-pane fade">
            <div style="margin:20px">
                <p>Informacion de los contactos a comunicar en caso de algun accidente.</p>
                @if ($pc->name1 == '' and $pc->name2 == '' and $pc->name3 == '')
                    <div class="well">Todavia no ha cargado contactos a quien informar.</div>
                @endif
                <table class="table table-hover">
                        @if ( $pc->name1  !== '')
                        <b>Fecha de Nacimiento: </b>{{$p->birthDate }}</br>
                        <tr>
                            <td>
                                <i class="glyphicon glyphicon-user"></i>
                                {{$pc->name1 or ''}} {{ $pc->link1 !== '' ? '(' . $pc->link1 . ')' : '' }}
                            </td>
                            <td>{{$pc->contact1 or ''}}</td>
                        </tr>
                        @endif
                        @if ( $pc->name2  !== '')
                        <tr>
                            <td>
                                <i class="glyphicon glyphicon-user"></i>
                                {{$pc->name2 or ''}}({{$pc->link2 or ''}})
                            </td>
                            <td>{{$pc->contact2 or ''}}</td>
                        </tr>
                        @endif
                        @if ( $pc->name3  !== '')
                        <tr>
                            <td>
                                <i class="glyphicon glyphicon-user"></i>
                                {{$pc->name3 or ''}} {{ $pc->link3 !== '' ? '(' . $pc->link3 . ')' : '' }}
                            </td>
                            <td>{{$pc->contact3 or ''}}</td>
                        </tr>
                        @endif
                 </table>
            </div>  
        </div>
        <div id="medicos" class="tab-pane fade">
            <div style="margin:20px">
                <p>Informacion de los medicos de cabecera a consultar en caso de ser necesario.</p>
                @if ($phd->name1 == '' and $phd->name2 == '')
                    <div class="well">Todavia no ha cargado medicos de cabecera.</div>
                @endif
                <table class="table table-hover">
                        @if ( $phd->name1  !== '')
                        <tr><td>
                                <i class="glyphicon glyphicon-plus-sign"></i>
                                {{$phd->name1 or ''}}
                            </td>
                            <td>{{$phd->contact1 or ''}}</td>
                            <td>{{$phd->note1 or ''}}</td>
                        </tr>
                        @endif
                        @if ( $phd->name2  !== '')
                        <tr><td>
                                <i class="glyphicon glyphicon-plus-sign"></i>
                                {{$phd->name2 or ''}}
                            </td>
                            <td>{{$phd->contact2 or ''}}</td>
                            <td>{{$phd->note2 or ''}}</td>
                        </tr>
                        @endif
                 </table>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

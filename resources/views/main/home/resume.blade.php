@extends('layoutInitial')
@section('content')
<script>
     $(function () {
        $("a[href='/resume']").parent().addClass("active");//actualiza el nav general activo
        $("#liDP").addClass('active');
        jQuery.each($("[name='area'"), function(i,val){
            matches = $(val).text().match(/\n/g);
            breaks = matches ? matches.length+1 : 2;
            $(val).attr('rows',breaks);
        });
     });
</script>
<div class="container">

<div class="media">
  <div class="media-left">
  </div>
  <div class="media-body">
    <div class="row">
        <!-- <div class="col-md-3"> -->
        <div class="pull-left">
            <img class="media-object  img-rounded" style="max-height:250px;max-width:250px" alt="Perfil" id="img-perfil" 
                src="{{ $dp->path or env('APP_STATIC_PATH') . '/images/admin/no_user.png' }}">
        </div>
        <div class="col-md-9">
        <!--<p style="margin-left:15px">-->
            <p>
                <h1 class="media-heading">{{$p->lastNames . ', ' . $p->names}}</h1>
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
    </div>

    <ul class="nav nav-tabs">
        <h4 class="page-header" style="color: red"><i class="fa fa-ambulance"></i> Información de Emergencia</h4></br>
        <li class="active"><a data-toggle="tab" href="#contacto">Datos Personales</a></li>
        <li><a data-toggle="tab" href="#info">Informacion General</a></li>
        <li><a data-toggle="tab" href="#obraSocial">Obra Social</a></li>
        <li><a data-toggle="tab" href="#medicos">Medicos de Cabecera</a></li>
    </ul>

    <div class="tab-content">
        <div id="contacto" class="tab-pane active">
            <div style="margin:20px">
                <table class="table table-hover">
                    <caption>Datos del Titular</caption>
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
            <div style="margin:20px">
                @if ($pc->name1 == '' and $pc->name2 == '' and $pc->name3 == '')
                    <div class="well">Todavia no ha cargado contactos a quien informar.</div>
                @else
                <table class="table table-hover">
                    <caption>Contactos a llamar en caso de Emergencia</caption>
                        @if ( $pc->name1  !== '')
                        <tr>
                            <td>
                                <i class="glyphicon glyphicon-user"></i>
                                {{$pc->name1 or ''}} {{ $pc->link1 ? '(' . $pc->link1 . ')' : '' }}
                            </td>
                            <td>{{$pc->contact1 or ''}}</td>
                        </tr>
                        @endif
                        @if ( $pc->name2  !== '')
                        <tr>
                            <td>
                                <i class="glyphicon glyphicon-user"></i>
                                {{$pc->name2 or ''}} {{ $pc->link2 ? '(' . $pc->link2 . ')' : '' }}
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
                @endif
            </div>  
        </div>
        <div id="info" class="tab-pane fade">
            <div style="margin:20px">
                <table class="table table-hover">
                    <caption>Informacion Personal</caption>
                    <tr><td><i class="fa fa-tint"></i> Grupo Sanguineo</td>
                        <td>{{ Form::textarea('bloodType', $pi->bloodType==''?'No han sido cargadas':$pi->bloodType,  ['class' => 'form-control','readonly', 'name'=>'area'] ) }}</td>
                    <tr><td><i class="fa fa-ban"></i> Alergias</td>
                        <td>{{ Form::textarea('allergies', $pi->allergies==''?'No han sido cargadas':$pi->allergies,  ['class' => 'form-control','readonly', 'name'=>'area'] ) }}</td>
                    <tr><td><i class="fa fa-scissors"></i> Implantes</td>
                        <td>{{ Form::textarea('implants', $pi->implants==''?'No han sido cargadas':$pi->implants,  ['class' => 'form-control','readonly', 'name'=>'area'] ) }}</td>
                    <tr><td><i class="fa fa-eyedropper"></i> Vacunas</td>
                        <td>{{ Form::textarea('vaccines', $pi->vaccines==''?'No han sido cargadas':$pi->vaccines,  ['class' => 'form-control','readonly', 'name'=>'area'] ) }}</td>
                    <tr><td><i class="fa fa-users"></i> Antecedentes Familiares</td>
                        <td>{{ Form::textarea('antecedentes', $pi->antecedentes==''?'No han sido cargadas':$pi->antecedentes,  ['class' => 'form-control','readonly', 'name'=>'area'] ) }}</td>
                    </tr>
                </table>
                @if($pi->fuma or $pi->bebe or $pi->deporte or $pi->otro)
                <table class="table table-hover">
                    <caption>Habitos Personales</caption>
                    @if($pi->fuma )
                    <tr>
                        <td class="col-md-1"><i class="fa fa-fire"/></td>
                        <td class="col-md-1">Fuma</td>
                        <td class="col-md-10">{{ $pi->fuma or ''}}</td>
                    </tr>
                    @endif
                    @if($pi->bebe )
                    <tr><td><i class="fa fa-beer"></i> </td><td>Bebe</td><td>{{ $pi->bebe or ''}}</td></tr>
                    @endif
                    @if($pi->deporte )
                    <tr><td><i class="fa fa-soccer-ball-o"></i></td><td>Deportes</td><td>{{ $pi->deporte or ''}}</td></tr>
                    @endif
                    @if($pi->otro )
                    <tr><td>  <i class="fa fa-flash"></i> </td><td>Otro</td><td>{{ $pi->otro or ''}}</td></tr>
                    @endif
                </table>
                @endif
            </div>
        </div>

        <div id="obraSocial" class="tab-pane fade">
            <div style="margin:20px">
                <table class="table table-hover">
                    <caption>Obra Social</caption>
                    <tr><td>Empresa</td><td>{{ $phc->name or 'No ha sido cargado'}}</td></tr>
                    <tr><td>Plan</td><td>{{ $phc->plan or 'No ha sido cargado'}}</td></tr>
                    <tr><td>Numero de Cliente</td><td>{{ $phc->healthCareId or 'No ha sido cargado'}}</td></tr>
                    <tr><td>Telefono</td><td>{{ $phc->phone or 'No ha sido cargado'}}</td></tr>
                    <tr><td>Sitio Web</td><td>{{ $phc->web or 'No ha sido cargado'}}</td></tr>
                    <!--
                    <tr><td>Contacto</td><td>{{ $phc->contact or 'No ha sido cargado'}}</td></tr>
                    -->
                </table>
            </div>
        </div>

        <div id="medicos" class="tab-pane fade">
            <div style="margin:20px">
                @if ($phd->name1 == '' and $phd->name2 == '')
                    <div class="well">Todavia no ha cargado medicos de cabecera.</div>
                @else
                <table class="table table-hover">
                    <caption>Medicos</caption>
                        @if ( $phd->name1  !== '')
                        <tr><td>
                                <i class="fa fa-user-md"></i>
                                {{$phd->name1 or ''}}
                            </td>
                            <td><i class="fa fa-at"></i> {{$phd->contact1 or ''}}</td>
                            <td><i class="fa fa-sticky-note-o"></i> {{$phd->note1 or ''}}</td>
                        </tr>
                        @endif
                        @if ( $phd->name2  !== '')
                        <tr><td>
                                <i class="fa fa-user-md"></i>
                                {{$phd->name2 or ''}}
                            </td>
                            <td><i class="fa fa-at"></i> {{$phd->contact2 or ''}}</td>
                            <td><i class="fa fa-sticky-note-o"></i> {{$phd->note2 or ''}}</td>
                        </tr>
                        @endif
                 </table>
                @endif
            </div>
        </div>
    </div>
    </div>
</div>
@endsection

@extends('layoutInitial')

@section('stylesAndScripts')
    <script src="/js/module/module-misc.js"></script>
@endsection

@section('title')
   <title>RMP::Varios</title>
@endsection

@section('content')
    <div id="createMiscDialog" title="Agregar nueva entrada" class="container">
        <form action="/misc" id="miscForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Esta seguro que desea agregar un nuevo elemento?</p>
            
            <div class="form-group">
              <label for="title" class="control-label">Titulo</label>
              <input type="text" class="form-control" name="title" required data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="date">Fecha</label>
              <input type="text" class="form-control" name="date" id="date">
            </div>

<!--
            <label class="control-label">Select File</label>
            <input id="input-1" type="file" multiple class="file">
    
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div id="file-validation" class="alert alert-danger hidden">Debe elegir un archivo!</div>
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <span class="fileinput-filename"></span>
                <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Examinar</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" name="file">
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                </div>
            </div>
-->
        </form>
    </div>

    <div id="deleteMiscDialog" title="Atenion! Eliminando." class="container">
        <form action="/misc/" id="deleteMiscForm" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete" />
    
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Esta seguro que desea eliminar este elemento?</p>
        </form>
    </div>

    <div id="editMiscDialog" title="Atenion! Editando." class="container">
        <form action="/misc/miscId" id="editMiscForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="put" />
    
            <p>
                <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                Esta seguro que desea actualizar este elemento?
            </p>
            <div class="form-group">
              <label for="title">Titulo</label>
              <input type="text" class="form-control" name="title" id="title" required data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>
            <div class="form-group">
              <label for="date">Fecha</label>
              <input type="text" class="form-control" name="date" id="dateEditForm">
            </div>

<!--
            <div class="fileinput fileinput-new" data-provides="fileinput">
                <div id="file-validation" class="alert alert-danger hidden">Debe elegir un archivo!</div>
                <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;"></div>
                <i data-dismiss="fileinput" id="editMiscDeleteFile" class="fa fa-trash" ></i>
                <span class="fileinput-filename"></span>
                <div>
                    <span class="btn btn-default btn-file"><span class="fileinput-new">Examinar</span>
                    <span class="fileinput-exists">Cambiar</span>
                        <input type="file" name="filee" required>
                    </span>
                    <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                </div>
            </div>
-->
        </form>
    </div>

    <div id="miscDocEditionDialog" title="Atenion! Editando." class="container">
      <div class="form-group form-group-sm">
        <input id="miscInputFile" name="miscInputFile[]" type="file" multiple class="file-loading">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="put" />
      </div>
    </div>

<div class="container">
    <hr>
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header" style="margin-top: -10px">Varios</h3>
            <div class="alert alert-info text-center" >Aqui puede cargar toda la documentacion que considere imporante que no sean especificos de las otras cateogorias.</div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane active" id="home">
        <div class="row">
        <button class="btn btn-primary  btn-mock" id="btn-nuevo-laboratorio">Nuevo Documento</button>
        </div>
        <div class="row">
        <!-- <button class="btn btn-default pull-right btn-mock" id="btn-nuevo-laboratorio">Nuevo</button> -->
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
                <tbody> 

                    @foreach ($miscs as $m)
                    <tr id="row-misc-{{ $m->id }}">
                        <td id="miscId" style="display:none">{{ $m->id }}</td>
                        <td id="miscDate">{{$m->date or ''}}</td>
                        <td id="miscTitle">{{ $m->title }}</td>
                        <td>
                            <a href="#" name="editMisc">
                                <i class="fa fa-edit"></i>
                            </a>
                              <a href="#" name="btnEditMiscDoc">
                                  <i class="fa fa-picture-o"></i>
                              </a>
                        </td>
                        <td>
                            <a href="#">
                                <i class="fa fa-trash-o" name="deleteMisc">
                                    <input type="hidden" id="miscId" value="{{$m->id}}"/>
                                </i>
                            </a>
                        </td>
                    
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div></div>
  </div> <!-- end container -->
@endsection

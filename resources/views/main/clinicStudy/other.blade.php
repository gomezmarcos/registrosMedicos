<div id="other" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Otros</h3>
      <div class="alert alert-info text-center">Aqui puede cargar sus estudios que no aplican para las otras categorias como son Laboratorio, Rayos(Rx) y Ecografias</div>

    <div class="col-md-12">
        <div class="row">
            <button class="btn btn-primary btn-create-otro-data" id="btnNewOtro">Nuevo Estudio</button>
        </div>
        <div class="row">
        <div id="div-otro"><div class="table-responsive">
        <!--<div id="div-laboratorio"><div class="table-responsive"> -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> 

                    @if($otroStudies->isEmpty())
                      <tr">
                        <td></td>
                        <td colspan="3">No hay estudios cargados aun.</td>
                      </tr>
                    @else
                      @foreach ($otroStudies as $otro)
                      <tr id="row-misc-{{ $otro->id }}">
                          <td id="id" style="display:none">{{ $otro->id }}</td>
                          <td id="date">{{$otro->date or '24/09/1983'}}</td>
                          <td id="title">{{ $otro->title }}</td>
                          <td>
                              <a href="#" name="btnEditOtroData">
                                  <i class="fa fa-edit" ></i>
                              </a>
                              <a href="#" name="btnEditOtroDoc">
                                  <i class="fa fa-picture-o"></i>
                              </a>
                          </td>
                          <td>
                              <a href="#">
                                  <i class="fa fa-trash-o" name="btnDeleteOtro">
                                      <input type="hidden" id="otroId" value="{{$otro->id}}"/>
                                  </i>
                              </a>
                          </td>
                      </tr>
                      @endforeach
                    @endif 
                </tbody>
            </table>
        </div>
</div>
    </div>

    </div>
    </form>
</div> <!-- menu container -->
  <div id="createOtroDataDialog" title="Agregar nueva entrada" class="container">
      <form action="/storeOtroStudy" id="createOtroDataForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
  
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="put" />

          <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
          Esta seguro que desea agregar un nuevo elemento?</p>
          
          <div class="form-group">
            <label for="title" class="control-label">Titulo</label>
            <input type="text" class="form-control" name="title" data-error="Este campo es requerido">
            <div class="help-block with-errors"></div>
          </div>

          <div class="form-group">
            <label for="date">Fecha</label>
            <input type="text" class="form-control" name="createOtroDate" id="createOtroDate">
          </div>
      </form>
  </div>

    <div id="editOtroDataDialog" title="Atenion! Editando." class="container">
        <form action="/updateOtroStudy/otroId" id="editOtroDataForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

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
            <input type="text" class="form-control" name="editOtroDate" id="editOtroDate">
          </div>
      </form>
  </div>
    <div id="otroDocEditionDialog" title="Atenion! Editando." class="container">
      <div class="form-group form-group-sm">
        <input id="otroInputFile" name="otroInputFile[]" type="file" multiple class="file-loading">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="put" />
      </div>
    </div>

    <div id="deleteOtroDialog" title="Atenion! Eliminando." class="container">
      <form action="/deleteOtroStudy/OtroId" id="deleteOtroForm" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="delete" />
  
          <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
          Esta seguro que desea eliminar este elemento?</p>
      </form>
    </div>

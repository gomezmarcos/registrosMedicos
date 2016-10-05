<div id="eco" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Ecografias</h3>

    <div class="col-md-12">
        <button class="btn btn-default pull-right btn-create-eco-data" id="btnNewEco">Nuevo</button>
        <div id="div-eco"><div class="table-responsive">
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
                    @if($ecoStudies->isEmpty())
                      <tr">
                        <td></td>
                        <td colspan="3">No hay estudios cargados aun.</td>
                      </tr>
                    @else
                      @foreach ($ecoStudies as $e)
                      <tr id="row-misc-{{ $e->id }}">
                          <td id="id" style="display:none">{{ $e->id }}</td>
                          <td id="date">{{$e->date or '24/09/1983'}}</td>
                          <td id="title">{{ $e->title }}</td>
                          <td>
                              <a href="#" name="btnEditEcoData">
                                  <i class="fa fa-edit" ></i>
                              </a>
                              <a href="#" name="btnEditEcoDoc">
                                  <i class="fa fa-picture-o"></i>
                              </a>
                          </td>
                          <td>
                              <a href="#">
                                  <i class="fa fa-trash-o" name="btnDeleteEco">
                                      <input type="hidden" id="ecoId" value="{{$e->id}}"/>
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

    <div class="form-group col-md-12 ">
      <p class="pull-right">
        <input type="submit" class="btn btn-success" value="Guardar">
        <a href="profile" class="btn btn-default">Cancelar</a>
        </p>
    </div>
</div>
</form>
</div> <!-- menu container -->

  <div id="createEcoDataDialog" title="Agregar nueva entrada" class="container">
      <form action="/storeEcoStudy" id="createEcoDataForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
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
            <input type="text" class="form-control" name="createEcoDate" id="createEcoDate">
          </div>
      </form>
  </div>

    <div id="editEcoDataDialog" title="Atenion! Editando." class="container">
        <form action="/updateEcoStudy/ecoId" id="editEcoDataForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

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
            <input type="text" class="form-control" name="editEcoDate" id="editEcoDate">
          </div>
      </form>
  </div>

    <div id="ecoDocEditionDialog" title="Atenion! Editando." class="container">
      <div class="form-group form-group-sm">
        <input id="ecoInputFile" name="ecoInputFile[]" type="file" multiple class="file-loading">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="put" />
      </div>
    </div>

    <div id="deleteEcoDialog" title="Atenion! Eliminando." class="container">
      <form action="/deleteStudy/EcoId" id="deleteEcoForm" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="delete" />
  
          <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
          Esta seguro que desea eliminar este elemento?</p>
      </form>
    </div>

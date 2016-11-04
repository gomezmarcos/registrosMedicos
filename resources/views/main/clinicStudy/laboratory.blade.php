<div id="laboratory" class="tab-pane fade in active">

  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="put" />
      <h3>Laboratorio</h3>
      <div class="alert alert-info text-center" >Aqui puede cargar todos sus estudios de Laboratorio. Es una manera facil de mantener organizada sus estudios y que sean de facil acceso al buscarlos.</div>

    <div class="col-md-12">
        <div class="row">
        <button class="btn btn-primary  btn-create-laboratory-data" id="btnNewLab">Nuevo Estudio</button>
        </div>
        <div class="row">
        <div id="div-laboratorio">
          <div class="table-responsive">
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
                  @foreach ($labStudies as $s)
                  <tr id="row-misc-{{ $s->id }}">
                      <td id="id" style="display:none">{{ $s->id }}</td>
                      <td id="date">{{$s->date or '24/09/1983'}}</td>
                      <td id="title">{{ $s->title }}</td>
                      <td>
                          <a href="#" name="btnEditLabData">
                            <i class="fa fa-edit" ></i>
                          </a>
                          <a href="#" name="btnEditLabDoc">
                            <i class="fa fa-picture-o"></i>
                          </a>
                      </td>
                      <td>
                        <a href="#">
                          <i class="fa fa-trash-o" name="btnDeleteLab">
                            <input type="hidden" id="labId" value="{{$s->id}}"/>
                          </i>
                        </a>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
            </table>
          </div>
        </div>
        </div>

      </div>
    </form>
  </div> <!-- menu container -->

  <div id="createLaboratoryDataDialog" title="Agregar nueva entrada" class="container">
      <form action="/storeLaboratoryStudy" id="createLaboratoryDataForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
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
            <input type="text" class="form-control" name="createLabDate" id="createLabDate">
          </div>
          <!-- <input type="button" class="form-control" name="checkPassword" id="checkPassord"/> -->
        <!-- <button type="button" class="btn btn-default" data-dismiss="modal"/> -->
      </form>
  </div>

  <div id="editLaboratoryDataDialog" title="Atenion! Editando." class="container">
        <form action="/updateLaboratoryStudy/studyId" id="editLaboratoryDataForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

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
            <input type="text" class="form-control" name="editLabDate" id="editLabDate">
          </div>
      </form>
  </div>

    <div id="labDocEditionDialog" title="Atenion! Editando." class="container">
      <div class="form-group form-group-sm">
        <input id="inputFile" name="inputFile[]" type="file" multiple class="file-loading">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="_method" value="put" />
      </div>
    </div>

    <div id="deleteLabDialog" title="Atenion! Eliminando." class="container">
      <form action="/deleteLaboratoryStudy/laboratoryId" id="deleteLabForm" method="post">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="_method" value="delete" />
  
          <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
          Esta seguro que desea eliminar este elemento?</p>
      </form>
    </div>

<input type="hidden" id="product-images" >
<input type="hidden" id="initialPreview" >
<input type="hidden" id="initialPreviewConfig" >

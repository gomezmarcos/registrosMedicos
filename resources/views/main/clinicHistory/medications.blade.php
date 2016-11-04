<div id="medications" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Medicamentos</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <button class="btn btn-primary btn-create-medication" id="btnNewMedication">Nuevo Medicamento</button>

        <div id="div-medications">
          <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Droga</th>
                        <th>Posologia</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody> 

                    @foreach ($medications as $m)
                    <tr id="row-misc-{{ $m->id }}">
                        <td id="id" style="display:none">{{ $m->id }}</td>
                        <td id="name">{{$m->name or 'Calefina'}}</td>
                        <td id="drug">{{ $m->drug or 'droga' }}</td>
                        <td id="posology">{{ $m->posology or 'cada 4 horas'}}</td>
                        <td>
                            <a href="#" name="btnEditMedication">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <i class="fa fa-trash-o" name="btnDeleteMedication">
                                    <input type="hidden" id="medicationId" value="{{$m->id}}"/>
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

    <div class="form-group col-md-12 ">
      <p class="pull-right">
        <input type="submit" class="btn btn-success" value="Guardar">
        <a href="profile" class="btn btn-default">Cancelar</a>
    </p>
    </div>
    </form>
</div> <!-- menu container -->

<!-- begin - create new addmision modal-->
    <div id="createMedicationDialog" title="Agregar nueva entrada" class="container">
        <form action="/clinicHistory/storeMedication" id="createMedicationForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Esta seguro que desea agregar un nuevo medicamento?</p>
            
            <div class="form-group">
              <label for="title" class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="title" class="control-label">Droga</label>
              <input type="text" class="form-control" name="drug" data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="date">Posologia</label>
              <input type="text" class="form-control" name="posology" >
            </div>
        </form>
    </div>
<!-- end - create new addmision modal-->

<!-- begin - delete addmision modal-->
    <div id="deleteMedicationDialog" title="Atenion! Eliminando." class="container">
        <form action="/clinicHistory/medication/medicationId" id="deleteMedicationForm" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete" />
    
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Esta seguro que desea eliminar este medicamento?</p>
        </form>
    </div>
<!-- end - delete addmision modal-->

<!-- begin - update addmision modal-->
    <div id="editMedicationDialog" title="Atenion! Editando." class="container">
        <form action="/clinicHistory/medication/medicationId" id="editMedicationForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="post" />
    
            <p>
                <span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
                Esta seguro que desea actualizar este elemento?
            </p>
            <div class="form-group">
              <label for="title" class="control-label">Nombre</label>
              <input type="text" class="form-control" name="name" id="medicationName" data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="drug" class="control-label">Droga</label>
              <input type="text" class="form-control" name="drug" id="medicationDrug" data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="posology">Posologia</label>
              <input type="text" class="form-control" name="posology" id="medicationPosology" >
            </div>
        </form>
    </div>
<!-- end - update addmision modal-->

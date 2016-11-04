<div id="admittions" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Internaciones</h3>

    <div class="col-md-12">
        <button class="btn btn-primary btn-create-admittion" id="btnNewAdmittion">Nueva Internacion</button>
        <div id="div-laboratorio"><div class="table-responsive">
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

                    @foreach ($admittions as $a)
                    <tr id="row-misc-{{ $a->id }}">
                        <td id="admittionId" style="display:none">{{ $a->id }}</td>
                        <td id="admittionDate">{{$a->date or '24/09/1983'}}</td>
                        <td id="admittionDescription">{{ $a->description }}</td>
                        <td>
                            <a href="#" name="btnEditAdmittion">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <i class="fa fa-trash-o" name="btnDeleteAdmittion">
                                    <input type="hidden" id="admittionId" value="{{$a->id}}"/>
                                </i>
                            </a>
                        </td>
                    
                    </tr>
                    @endforeach
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

<!-- begin - create new addmision modal-->
    <div id="createAdmittionDialog" title="Agregar nueva entrada" class="container">
        <form action="/clinicHistory/storeAdmittion" id="createAdmittionForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
    
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Esta seguro que desea agregar un nuevo elemento?</p>
            
            <div class="form-group">
              <label for="title" class="control-label">Titulo</label>
              <input type="text" class="form-control" name="title" data-error="Este campo es requerido">
              <div class="help-block with-errors"></div>
            </div>

            <div class="form-group">
              <label for="date">Fecha</label>
              <input type="text" class="form-control" name="date" id="createAdmittionDate">
            </div>
        </form>
    </div>
<!-- end - create new addmision modal-->

<!-- begin - delete addmision modal-->
    <div id="deleteAdmittionDialog" title="Atenion! Eliminando." class="container">
        <form action="/clinicHistory/admittion/admittionId" id="deleteAdmittionForm" method="post">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="delete" />
    
            <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>
            Esta seguro que desea eliminar este elemento?</p>
        </form>
    </div>
<!-- end - delete addmision modal-->

<!-- begin - update addmision modal-->
    <div id="editAdmittionDialog" title="Atenion! Editando." class="container">
        <form action="/clinicHistory/admittion/admittionId" id="editAdmittionForm" method="post" enctype="multipart/form-data" data-toggle="validator" role="form">

            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="_method" value="post" />
    
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
              <input type="text" class="form-control" name="date" id="editAdmittionDate">
            </div>
        </form>
    </div>
<!-- end - update addmision modal-->

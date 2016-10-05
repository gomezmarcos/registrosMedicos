<div id="medications" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Medicamentos</h3>

    <!-- basic container -->
    <div class="col-md-12">

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
                        <td id="medicationnId" style="display:none">{{ $m->id }}</td>
                        <td id="medicationDate">{{$m->name or 'Calefina'}}</td>
                        <td id="medicationDescription">{{ $m->drug or 'droga' }}</td>
                        <td id="medicationPosology">{{ $m->posology or 'cada 4 horas'}}</td>
                        <td>
                            <a href="#" name="editMisc">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <i class="fa fa-trash-o" name="deleteMisc">
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

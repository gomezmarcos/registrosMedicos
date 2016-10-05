<div id="other" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Otros</h3>

    <div class="col-md-12">
        <button class="btn btn-default pull-right btn-create-admittion" id="btnNewAdmittion">Nuevo</button>
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

					{{--
                    @foreach ($admittions as $a)
                    <tr id="row-misc-{{ $a->id }}">
                        <td id="admittionId" style="display:none">{{ $a->id }}</td>
                        <td id="admittionDate">{{$a->date or '24/09/1983'}}</td>
                        <td id="admittionDescription">{{ $a->description }}</td>
                    --}}

                        @for ($i = 0; $i < 1; $i++)
                        <td id="admittionId" style="display:none">3</td>
                        <td id="admittionDate">24/09/1983</td>
                        <td id="admittionDescription">Estudio particular #{{$i}}</td>

                        <td>
                            <a href="#" name="btnEditAdmittion">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                        <td>
                            <a href="#">
                                <i class="fa fa-trash-o" name="btnDeleteAdmittion">
									{{--
                                    <input type="hidden" id="admittionId" value="{{$a->id}}"/>
                                    --}}
                                    <input type="hidden" id="admittionId" value="3"/>
                                </i>
                            </a>
                        </td>
                    
                    </tr>
					{{--
                    @endforeach
                    --}}
                    @endfor
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
<div id="info" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

    


  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Buscar nombre!</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group ">
              <label for="bloodType" class="control-label">Grupo Sanguineo</label>
              {{ Form::select('bloodType', array($listBloodTypes), $pi->bloodType, ['class' => 'form-control']) }}
              
        </div>        

        <div class="form-group ">
              <label for="allergies" class="control-label">Alergias</label>
              <input type="text" name="allergies" class="form-control" 
                value="{{ $pi->allergies or '' }}"> 
        </div>        
        
        <div class="form-group ">
              <label for="implants" class="control-label">Implantes</label>
              {{ Form::textarea('implants', $pi->implants,  ['class' => 'form-control']) }}
        </div>

        <div class="form-group ">
              <label for="vaccines" class="control-label">Vacunas</label>
              {{ Form::textarea('vaccines', $pi->vaccines,  ['class' => 'form-control']) }}
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

<div id="headDoctor" class="tab-pane fade">
  <form action="/profileHeadDoctor/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Medicos de Cabecera</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group col-md-4">
              <label for="name1" class="control-label">Nombre</label>
              <input type="text" name="name1" class="form-control" 
                value="{{ $phd->name1 or '' }}" >
        </div>        

        <div class="form-group col-md-4">
              <label for="contact1" class="control-label">Telefono o Mail</label>
              <input type="text" name="contact1" class="form-control" 
                value="{{ $phd->contact1 or '' }}"> 
        </div>        
        
        <div class="form-group col-md-4">
              <label for="note1" class="control-label">Notas</label>
              <input type="text" name="note1" class="form-control" 
                value="{{ $phd->note1 or '' }}"> 
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group col-md-4">
              <label for="name2" class="control-label">Nombre</label>
              <input type="text" name="name2" class="form-control" 
                value="{{ $phd->name2 or '' }}" >
        </div>        

        <div class="form-group col-md-4">
              <label for="contact2" class="control-label">Telefono o Mail</label>
              <input type="text" name="contact2" class="form-control" 
                value="{{ $phd->contact2 or '' }}"> 
        </div>        
        
        <div class="form-group col-md-4">
              <label for="note2" class="control-label">Notas</label>
              <input type="text" name="note2" class="form-control" 
                value="{{ $phd->note2 or '' }}"> 
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

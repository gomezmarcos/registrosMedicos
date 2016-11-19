<div id="contacts" class="tab-pane fade">
  <form action="/profileContact/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Contactos de Urgencia</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group col-md-4">
              <label for="name1" class="control-label"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" name="name1" class="form-control" 
                value="{{ $pc->name1 or '' }}" >
        </div>        

        <div class="form-group col-md-4">
              <label for="link1" class="control-label"><i class="fa fa-chain"></i> Relacion</label>
              <input type="text" name="link1" class="form-control" 
                value="{{ $pc->link1 or '' }}"> 
        </div>        
        
        <div class="form-group col-md-4">
              <label for="contact1" class="control-label"><i class="fa fa-at"></i> Telefono o Mail</label>
              <input type="text" name="contact1" class="form-control" 
                value="{{ $pc->contact1 or '' }}"> 
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group col-md-4">
              <label for="name2" class="control-label"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" name="name2" class="form-control" 
                value="{{ $pc->name2 or '' }}" >
        </div>        

        <div class="form-group col-md-4">
              <label for="link2" class="control-label"><i class="fa fa-chain"></i> Relacion</label>
              <input type="text" name="link2" class="form-control" 
                value="{{ $pc->link2 or '' }}"> 
        </div>        
        
        <div class="form-group col-md-4">
              <label for="contact2" class="control-label"><i class="fa fa-at"></i> Telefono o Mail</label>
              <input type="text" name="contact2" class="form-control" 
                value="{{ $pc->contact2 or '' }}"> 
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group col-md-4">
              <label for="name3" class="control-label"><i class="fa fa-user"></i> Nombre</label>
              <input type="text" name="name3" class="form-control" 
                value="{{ $pc->name3 or '' }}" >
        </div>        

        <div class="form-group col-md-4">
              <label for="link3" class="control-label"><i class="fa fa-chain"></i> Relacion</label>
              <input type="text" name="link3" class="form-control" 
                value="{{ $pc->link3 or '' }}"> 
        </div>        
        
        <div class="form-group col-md-4">
              <label for="contact3" class="control-label"><i class="fa fa-at"></i> Telefono o Mail</label>
              <input type="text" name="contact3" class="form-control" 
                value="{{ $pc->contact3 or '' }}"> 
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

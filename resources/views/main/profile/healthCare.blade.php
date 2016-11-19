<div id="healthCare" class="tab-pane fade">
  <form action="/profileHealthCare/2" method="post"
    data-toggle="validator" role="form">

  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />

      <h3>Cobertura Medica</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group col-md-4">
              <label for="name" class="control-label"><i class="fa fa-building"></i> Obra Social</label>
              <input type="text" name="name" class="form-control" 
                value="{{ $phc->name or '' }}" >
        </div>        

        <div class="form-group col-md-4">
              <label for="plan" class="control-label"><i class="fa fa-star"></i> Plan</label>
              <input type="text" name="plan" class="form-control" 
                value="{{ $phc->plan or '' }}"> 
        </div>        
        
        <div class="form-group col-md-4">
              <label for="healthCareId" class="control-label"><i class="fa fa-hashtag"></i> Numero de Cliente</label>
              <input type="text" name="healthCareId" class="form-control" 
                value="{{ $phc->healthCareId or '' }}"> 
        </div>

        <div class="form-group">
              <label for="phone" class="control-label"><i class="fa fa-phone"></i> Telefono</label>
              <input type="text" name="phone" class="form-control" 
                value="{{ $phc->phone or '' }}" >
        </div>        

        <div class="form-group">
              <label for="web" class="control-label"><i class="fa fa-sticky-note-o"></i> Sitio Web</label>
              <input type="text" name="web" class="form-control" 
                value="{{ $phc->web or '' }}" >
        </div>

        <div class="form-group">
              <label for="contact" class="control-label"><i class="fa fa-chain"></i> Contacto</label>
              <input type="text" name="contact" class="form-control" 
                value="{{ $phc->contact or '' }}" >
        </div>
        
        <div class="form-group col-md-12 ">
          <p class="pull-right">
              <input type="submit" class="btn btn-success" value="Guardar">
              <a href="profile" class="btn btn-default">Cancelar</a>
          </p>
        </div>

      </div> <!-- basic container -->
      </form>
    </div> <!-- menu container -->

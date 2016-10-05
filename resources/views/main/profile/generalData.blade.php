
<div id="generalData" class="tab-pane fade in active">
    

  <form action="/profile/2" method="post"
    enctype="multipart/form-data" data-toggle="validator" role="form">


  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
  <input type="hidden" name="_profilePicture" id="_profilePicture" value="{{ $profilePicture }}" >

  <h3>Datos Generales</h3>
  <!-- basic container-->
  <div class="col-md-12">
  <div class="col-md-4">

    
        <div class="form-group">
          <label class="control-label ">Foto de Perfil</label>
          <input id="profilePicture" name="profilePicture" type="file" class="file col-md-5">
        </div>
        <script type="text/javascript">
          $("#profilePicture").fileinput({
              showUpload: false,//upload del componente
              showRemove: false,//remove del componente
              initialPreviewShowDelete: false,//delete del thumbnail
              // minFileCount:1,
              initialPreview: [
              // 'http://kartik-v.github.io/bootstrap-fileinput-samples/samples/Desert.jpg'
                $("#_profilePicture").val(),
              ],
              initialPreviewAsData: true,
              initialPreviewConfig: [
                  {caption: "Perfil", key: 1, type:"image"},
              ],
              initialPreviewFileType: 'image',
              purifyHtml:true,
              previewZoomSettings: {
                image: {width: "auto", height: "100%"},
                pdf: {width: "100%", height: "100%", 'min-height': "480px"},
                other: {width: "auto", height: "100%", 'min-height': "480px"}
              },
          });

        </script>
    <!--
      <label for="file" class="control-label">Foto de Perfil</label>
      <div class="form-group">
          <div class="fileinput fileinput-new" data-provides="fileinput">
              <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 150; height: 150px;"></div>
              <i data-dismiss="fileinput" id="editMiscDeleteFile" class="fa fa-trash" ></i>

              <div>
                  <span class="btn btn-default btn-file"><span class="fileinput-new">Examinar</span>
                  <span class="fileinput-exists">Cambiar</span>
                      <input type="file" name="file" id="file">
                      <input type="hidden" id="hasFile" value="{{ $p->documentProfile->name or '' }}">
                  </span>
                  <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
              </div>
          </div>
      </div>
      -->
      </div>
    <div class="col-md-8">
      <div class="form-group">
            <label for="names" class="control-label">Nombres</label>
            <input type="text" name="names" class="form-control" 
              value="{{ $p->names or '' }}" 
              required data-error="Este campo es requerido">
            <div class="help-block with-errors"></div>
      </div>        

      <div class="form-group">
            <label for="lastNames" class="control-label">Apellidos</label>
            <input type="text" name="lastNames" class="form-control" 
              value="{{ $p->lastNames or '' }}" 
              required data-error="Este campo es requerido">
            <div class="help-block with-errors"></div>
      </div>        
      <div class="form-group col-md-3">
        <label for="dniType" class="control-label">Tipo</label>
        {{ Form::select('dniType', array($listDniTypes), $p->dniType, ['class' => 'form-control']) }}
       
        <div class="help-block with-errors"></div>
      </div>

      <div class="form-group col-md-9">
        <label for="dni" class="control-label">DNI</label>
        <input type="text" name="dni" class="form-control" 
          value="{{ $p->dni or '' }}" 
          required data-error="Este campo es requerido">
        <div class="help-block with-errors"></div>
      </div>
   </div> 
   
  </div>
  
  <div class="col-md-12">
      <div class="form-group col-md-4">
            <label for="address" class="control-label">Direccion</label>
            <input type="text" name="address" class="form-control" 
              value="{{ $p->address or '' }}" 
              required data-error="Este campo es requerido">
            <div class="help-block with-errors"></div>
      </div>
      <div class="form-group col-md-4">
            <label for="city" class="control-label">Ciudad</label>
            <input type="text" name="city" class="form-control" 
              value="{{ $p->city or '' }}" 
              required data-error="Este campo es requerido">
            <div class="help-block with-errors"></div>
      </div>
      <div class="form-group col-md-4">
            <label for="state" class="control-label">Provincia</label>
            <input type="text" name="state" class="form-control" 
              value="{{ $p->state or '' }}" 
              required data-error="Este campo es requerido">
            <div class="help-block with-errors"></div>
      </div>
  </div>
  
  

  <div class="form-group col-md-6">
    <label for="email1" class="control-label">email</label>
    <input type="text" name="email1" class="form-control" 
      value="{{ $p->email1 or '' }}" >
    <div class="help-block with-errors"></div>
  </div>
    
  <div class="form-group col-md-6">
    <label for="email2" class="control-label">email Alternativo</label>
    <input type="text" name="email2" class="form-control" 
      value="{{ $p->email2 or '' }}" >
    <div class="help-block with-errors"></div>
  </div>

  <div class="form-group col-md-6">
    <label for="cellPhone1" class="control-label">Celular</label>
    <input type="text" name="cellPhone1" class="form-control" 
      value="{{ $p->cellPhone1 or '' }}" >
    <div class="help-block with-errors"></div>
  </div>

  <div class="form-group col-md-6">
    <label for="cellPhone2" class="control-label">Celular Alternativo</label>
    <input type="text" name="cellPhone2" class="form-control" 
      value="{{ $p->cellPhone2 or '' }}" >
    <div class="help-block with-errors"></div>
  </div>

  <div class="form-group col-md-6">
    <label for="phone1" class="control-label">Telefono</label>
    <input type="text" name="phone1" class="form-control" 
      value="{{ $p->phone1 or '' }}" >
    <div class="help-block with-errors"></div>
  </div>

  <div class="form-group col-md-6">
    <label for="phone2" class="control-label">Telefono Alternativo</label>
    <input type="text" name="phone2" class="form-control" 
      value="{{ $p->phone2 or '' }}" >
    <div class="help-block with-errors"></div>
  </div>

  <div class="form-group col-md-12 ">
    <p class="pull-right">
        <input type="submit" class="btn btn-success" value="Guardar">
        <a href="profile" class="btn btn-default">Cancelar</a>
    </p>
  </div>
</form>
</div>

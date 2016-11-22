<div id="info" class="tab-pane fade">
  <form action="/profileInfo/2" method="post"
    data-toggle="validator" role="form">

<script>
     $(function () {
        jQuery.each($("[name='area'"), function(i,val){
            matches = $(val).text().match(/\n/g);
            breaks = matches ? matches.length+1 : 2;
            $(val).attr('rows',breaks);
        });

         $("[name='area']").change(function(){
            //var matches = $("[name='area'").val().match(/\n/g);
            var matches = $(this).val().match(/\n/g);
            breaks = matches ? matches.length + 1 : 2;
            $(this).attr('rows',breaks);
         });

         $("[name='area']").keyup(function(){
            var matches = $(this).val().match(/\n/g);
            breaks = matches ? matches.length + 1 : 2;
            $(this).attr('rows',breaks);
         });
     });
</script>
    


  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="_method" value="put" />
      <h3>Buscar nombre!</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group ">
              <label for="bloodType" class="control-label"><i class="fa fa-tint"></i> Grupo Sanguineo</label>
              {{ Form::select('bloodType', array($listBloodTypes), $pi->bloodType, ['class' => 'form-control']) }}
              
        </div>        

        <div class="form-group ">
              <label for="allergies" class="control-label"><i class="fa fa-ban"></i> Alergias</label>
              <input type="text" name="allergies" class="form-control" 
                value="{{ $pi->allergies or '' }}"> 
        </div>        
        
        <div class="row">
        
        <div class="form-group col-md-4">
              <label for="implants" class="control-label"><i class="fa fa-scissors"></i> Implantes</label>
              {{ Form::textarea('implants', $pi->implants,  ['class' => 'form-control', 'name'=>'area']) }}
        </div>

        <div class="form-group col-md-4">
              <label for="vaccines" class="control-label"><i class="fa fa-eyedropper"></i> Vacunas</label>
              {{ Form::textarea('vaccines', $pi->vaccines,  ['class' => 'form-control', 'name'=>'area']) }}
        </div>

        <div class="form-group col-md-4">
              <label for="antecedentes" class="control-label"><i class="fa fa-users"></i> Antecedentes Familiares</label>
              {{ Form::textarea('antecedentes', $pi->antecedentes,  ['class' => 'form-control', 'name'=>'area']) }}
        </div>

        </div>

        <div class="form-group " >
              <label for="fuma" class="control-label " ><i class="fa fa-fire"></i> Fuma? Con que frecuencia?</label>
              <input type="text" name="fuma" class="form-control " value="{{ $pi->fuma or '' }}" style="border-style:dotted;"> 
        </div>        
        <div class="form-group " >
              <label for="bebe" class="control-label " ><i class="fa fa-beer"></i> Bebe? Con que frecuencia?</label>
              <input type="text" name="bebe" class="form-control " value="{{ $pi->bebe or '' }}" style="border-style:dotted;"> 
        </div>        
        <div class="form-group " >
              <label for="deporte" class="control-label " ><i class="fa fa-soccer-ball-o"></i> Hace Deporte? Con que frecuencia?</label>
              <input type="text" name="deporte" class="form-control " value="{{ $pi->deporte or '' }}" style="border-style:dotted;"> 
        </div>        
        <div class="form-group " >
              <label for="otro" class="control-label " ><i class="fa fa-flash"></i> Otro habito? Con que frecuencia?</label>
              <input type="text" name="otro" class="form-control col-md-6" value="{{ $pi->otro or '' }}" style="border-style:dotted;"> 
        </div>        
        
    </div>
        <div class="form-group ">
            <p class="pull-right" style="margin-top:15px">
                <input type="submit" class="btn btn-success" value="Guardar">
                <a href="profile" class="btn btn-default">Cancelar</a>
            </p>
        </div>

    </form>
</div> <!-- menu container -->

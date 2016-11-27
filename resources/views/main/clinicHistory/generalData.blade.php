<div id="generalData" class="tab-pane fade in active">
<form action="/clinicHistory/general" method="post" data-toggle="validator" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="put" />
<script>
     $(function () {
        jQuery.each($(".area"), function(i,val){
            matches = $(val).text().match(/\n/g);
            breaks = matches ? matches.length+1 : 2;
            $(val).attr('rows',breaks);
        });

         $(".area]").change(function(){
            //var matches = $("[name='area'").val().match(/\n/g);
            var matches = $(this).val().match(/\n/g);
            breaks = matches ? matches.length + 1 : 2;
            $(this).attr('rows',breaks);
         });

         $(".area]").keyup(function(){
            var matches = $(this).val().match(/\n/g);
            breaks = matches ? matches.length + 1 : 2;
            $(this).attr('rows',breaks);
         });
     });
</script>
    <h3>General</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group ">
              <label for="bloodType" class="control-label"><i class="fa fa-tint"></i> Grupo Sanguineo</label>
              {{ Form::select('bloodType', array($listBloodTypes), $ch->bloodType, ['class' => 'form-control']) }}
              
        </div>        

        <div class="row">
            <div class="form-group col-md-6">
                <label for="diseases" class="control-label"><i class="fa fa-heartbeat"></i> Enfermedades Base</label>
                {{ Form::textarea('diseases', $ch->diseases ,  ['class' => 'form-control area']) }}
            </div>

            <div class="form-group col-md-6">
                <label for="allergies" class="control-label"><i class="fa fa-ban"></i> Alergias</label>
                {{ Form::textarea('allergies', $ch->allergies,  ['class' => 'form-control area']) }}
            </div>        
        </div>
        
            <div class="row">
        
                <div class="form-group col-md-4">
                    <label for="implants" class="control-label"><i class="fa fa-scissors"></i> Implantes</label>
                    {{ Form::textarea('implants', $ch->implants,  ['class' => 'form-control area']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="vaccines" class="control-label"><i class="fa fa-eyedropper"></i> Vacunas</label>
                    {{ Form::textarea('vaccines', $ch->vaccines,  ['class' => 'form-control area']) }}
                </div>

                <div class="form-group col-md-4">
                    <label for="antecedentes" class="control-label"><i class="fa fa-users"></i> Antecedentes Familiares</label>
                    {{ Form::textarea('antecedentes', $ch->antecedentes,  ['class' => 'form-control area']) }}
                </div>

            </div>

        <div class="form-group " >
              <label for="fuma" class="control-label " ><i class="fa fa-fire"></i> Fuma? Con que frecuencia?</label>
              <input type="text" name="fuma" class="form-control " value="{{ $ch->fuma or '' }}" style="border-style:dotted;"> 
        </div>        
        <div class="form-group " >
              <label for="bebe" class="control-label " ><i class="fa fa-beer"></i> Bebe? Con que frecuencia?</label>
              <input type="text" name="bebe" class="form-control " value="{{ $ch->bebe or '' }}" style="border-style:dotted;"> 
        </div>        
        <div class="form-group " >
              <label for="deporte" class="control-label " ><i class="fa fa-soccer-ball-o"></i> Hace Deporte? Con que frecuencia?</label>
              <input type="text" name="deporte" class="form-control " value="{{ $ch->deporte or '' }}" style="border-style:dotted;"> 
        </div>        
        <div class="form-group " >
              <label for="otro" class="control-label " ><i class="fa fa-flash"></i> Otro habito? Con que frecuencia?</label>
              <input type="text" name="otro" class="form-control col-md-6" value="{{ $ch->otro or '' }}" style="border-style:dotted;"> 
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

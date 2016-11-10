<div id="generalData" class="tab-pane fade in active">
<form action="/clinicHistory/general" method="post" data-toggle="validator" role="form">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="hidden" name="_method" value="put" />
    <h3>General</h3>

    <!-- basic container -->
    <div class="col-md-12">
        <div class="form-group ">
            <label for="allergies" class="control-label">Alergias</label>
            <input type="text" name="allergies" class="form-control" value="{{ $ch->allergies or '' }}"> 
        </div>        

        <div class="form-group col-md-4">
            <label for="diseases" class="control-label">Enfermedades Base</label>
            {{ Form::textarea('diseases', $ch->diseases ,  ['class' => 'form-control']) }}
        </div>

        
        <div class="form-group col-md-4">
            <label for="implants" class="control-label">Implantes</label>
            {{ Form::textarea('implants', $ch->implants,  ['class' => 'form-control']) }}
        </div>

        <div class="form-group col-md-4">
            <label for="vaccines" class="control-label">Vacunas</label>
            {{ Form::textarea('vaccines', $ch->vaccines,  ['class' => 'form-control']) }}
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

@extends('layoutTyc') 

@section('title')
   <title>RMP::Términos y Condiciones</title>
@endsection

@section('content')
<div class="container">
    <div class="row">
    <!--<form class="form-horizontal" role="form" method="POST" action="{{ url('/tyc/store') }}">-->
    <form class="form-horizontal" role="form" method="POST" action="/tyc/store">
        {{ csrf_field() }}


<p><strong>T&eacute;rminos y condiciones de uso &ndash; Pol&iacute;tica de Privacidad</strong></p>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">El acceso a esta plataforma se realiza a trav&eacute;s de </span><strong><em>www.registrosmedicos.com.ar</em></strong></p>
<p>&nbsp;</p>
<p><strong>T&eacute;rminos y condiciones generales de uso</strong></p>
<p>&nbsp;</p>
<p><span style="font-weight: 400;">La utilizaci&oacute;n de los servicios que presta esta aplicaci&oacute;n est&aacute;n sujetos a los t&eacute;rminos y condiciones generales que se establecen a continuaci&oacute;n.</span></p>
<p><span style="font-weight: 400;">Este servicio es arancelado, de forma anual.</span></p>
<p><span style="font-weight: 400;">Toda persona para ser USUARIO debe estar registrado.</span></p>
<p><span style="font-weight: 400;">Se define como USUARIO registrado a aquella persona que ingresa a la Plataforma, mediante el formato requerido y mantiene al d&iacute;a su abono al mismo.</span></p>
<p><span style="font-weight: 400;">El USUARIO no podr&aacute; cambiar el objetivo de uso de la plataforma, y si as&iacute; lo hiciese, todo ser&aacute; baja su estricta responsabilidad.</span></p>
<p><span style="font-weight: 400;">La informaci&oacute;n que se encuentra en la plataforma de referencia corresponde al USUARIO y su contenido y uso es responsabilidad exclusiva del mismo.</span></p>
<p><span style="font-weight: 400;">El USUARIO es el responsable de mantener actualizada su informaci&oacute;n.</span></p>
<p><span style="font-weight: 400;">La carga puede ser realizada en forma directa por el USUARIO, siguiendo las instrucciones indicadas en el manual on &ndash; line, que se adjunta.</span></p>
<p><span style="font-weight: 400;">Si el USUARIO lo desea puede solicitar que el Personal de Registro M&eacute;dico Personal, realice la carga de informaci&oacute;n, tarea con arancelamiento extra ( no incluida en el abono del servicio ), siendo siempre la responsabilidad el USUARIO, sobre los datos ingresados a la plataforma.</span></p>
<p><span style="font-weight: 400;">Si la informaci&oacute;n de registro, suministrada por el USUARIO, sufre modificaciones, estas deben ser informadas a Registro Medico Personal, mediante los canales informados.</span></p>
<p><span style="font-weight: 400;">Al recibir la contrase&ntilde;a de ingreso el USUARIO se compromete a modificarla y si lo cree necesario lo puede realizar las veces que lo requiera.</span></p>
<p><span style="font-weight: 400;">Los USUARIOS menores de edad no podr&aacute;n estar registrados en soledad, deben estar representados por un mayor.</span></p>
<p>&nbsp;</p>
<p><strong>Pol&iacute;tica de Privacidad</strong></p>
<p>&nbsp;</p>
<p><strong>Registro Medico Personal</strong><span style="font-weight: 400;"> se hace responsable por la privacidad de la informaci&oacute;n entregada por el USUARIO, no revelar&aacute;, ni compartir&aacute; esta informaci&oacute;n sin el consentimiento del MISMO.</span></p>
<p><span style="font-weight: 400;">El USUARIO ser&aacute; responsable de la privacidad y veracidad de sus datos, como as&iacute; de los par&aacute;metros estipulados para el ingreso y uso de esta plataforma.</span></p>
<p>&nbsp;</p>
<p>&nbsp;</p>


        </p>

        <input type="submit" value="Aceptar Terminos" class="btn btn-success"/>
        <a href="/logout" class="btn btn-danger">No Aceptar Terminos</a>
    </form>
   </div>
</div>
@endsection

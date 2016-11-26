$(function () {

  $("a[href='/profile']").parent().addClass("active");//actualiza el nav general activo

	var documentId = $("#hasFile").val();
	if ( documentId != '') {
    	$(".thumbnail").html("<img src='http://localhost:8000/images/profile/"+ documentId +  "'/>");
    } else {
    	$(".thumbnail").html("<img src='https://addons.cdn.mozilla.net/static/img/zamboni/anon_user.png' />");//default no image
    }

    $("#editMiscDeleteFile").on("click", function(){
      $("#editMiscDialog input[name='file']" ).val("");//borra el archivo del input file tag
      $("#editMiscDialog .thumbnail").html("");//borra la imagen de la vista
    });

    //$( "#birthdate" ).datepicker();
    //$( "#birthdate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
    $( "#birthdate" ).datepicker( {
          changeMonth: true,
          changeYear: true
    });
    //$( "#birthdate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
    $.datepicker.regional['es'] = {
        showButtonPanel: true,
        closeText: 'Cerrar',
        prevText: '<Ant',
        nextText: 'Sig>',
        currentText: 'Hoy',
        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
        dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
        weekHeader: 'Sm',
        dateFormat: 'dd/mm/yy',
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);
    //$( "#birthdate" ).datepicker( "option", "regional","es");
});

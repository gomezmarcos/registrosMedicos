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

});

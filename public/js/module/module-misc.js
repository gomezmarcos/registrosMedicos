    $(function () {

      $("a[href='/misc']").parent().addClass("active");//actualiza el nav general activo
        
        $('#miscForm').validator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
            // handle the invalid form...
          } else {
            // everything looks good!
            if( $( "#createMiscDialog input[name='file']" ).val()==""){
              $("#file-validation").removeClass("hidden");
              $("#miscDialog #file-validation");
              e.preventDefault();
            } else {
              $( "#createMiscDialog" ).dialog("close");
            }
          }
        });

        $( "#createMiscDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $("#miscForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#deleteMiscDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var miscId = $("#deleteMiscDialog").data('tag').children[0].value;
              $("#deleteMiscForm").attr("action", "/misc/"+miscId);
              $("#deleteMiscForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#editMiscDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
            var trClicked = $("#editMiscDialog").data('tag').closest("tr");
            var miscDate = $(trClicked).find("#miscDate").text();
            var miscTitle = $(trClicked).find("#miscTitle").text();
            var miscDocumentFileT = $(trClicked).find("#miscDocumentFile").text();
            if (miscDocumentFileT.trim()) {
              $("#editMiscDialog .thumbnail").html("<img src='http://localhost:8000"+miscDocumentFileT +  "'/>");
            } else {
              $("#editMiscDialog .thumbnail").html("");
            }
            $("#editMiscDialog").find("#title").val(miscTitle);
            $("#editMiscDialog").find("#dateEditForm").val(miscDate);
          },
          buttons: {
            "Actualizar": function() {
              var miscId = $("#editMiscDialog").data('tag').closest("tr").id;
              $("#editMiscForm").attr("action", "/misc/"+miscId.split('-')[2]);
              $("#editMiscForm").submit();
              // $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });


        $('#editMiscForm').validator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
            // handle the invalid form...
          } else {
            // everything looks good!
            if( $("#editMiscDialog img").length == 0){
              $("#editMiscForm #file-validation").removeClass("hidden");
              e.preventDefault();
            } else if ($("#editMiscForm #title").val() == ""){
              e.preventDefault();
            } else {
              $( "#createMiscDialog" ).dialog("close");
            }
          }
        });

        $("#editMiscDeleteFile").on("click", function(){
          $("#editMiscDialog input[name='filee']" ).val("");//borra el archivo del input file tag
          $("#editMiscDialog .fileinput-filename").text("");//borra el nombre del archivo mostrado
          $("#editMiscDialog .thumbnail").html("");//borra la imagen de la vista
        });

        $("[name='deleteMisc'").on( "click", function() {
            $( "#deleteMiscDialog" ).data('tag', this);
            $( "#deleteMiscDialog" ).dialog('open');
        });

        $("[name='editMisc'").on( "click", function() {
            $( "#editMiscDialog" ).data('tag', this);
            $( "#editMiscDialog" ).dialog('open');
        });

        $(".btn-mock").button().on( "click", function() {
            $( "#createMiscDialog" ).dialog('open');
        });

        $( "#date" ).datepicker();
        $( "#date" ).datepicker( "option", "dateFormat", "d/mm/yy" );
        $( "#dateEditForm" ).datepicker();
        $( "#dateEditForm" ).datepicker( "option", "dateFormat", "d/mm/yy" );

    });

    $(function () {
      //test
        // $("a[href='/studies']").parent().addClass("active");//actualiza el nav general activo

        $( "#createOtroDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $("#createOtroForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#deleteOtroDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var id = $("#deleteOtroDialog").data('tag').children[0].value;
              $("#deleteOtroForm").attr("action", "/destroyOtroStudy/"+id);
              $("#deleteOtroForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnDeleteOtro'").on( "click", function() {
            $( "#deleteOtroDialog" ).data('tag', this);
            $( "#deleteOtroDialog" ).dialog('open');
        });

        $( "#otroDocEditionDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          width: "70%",
          buttons: {
            "Cerrar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#editOtroDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
              var trClicked = $("#editOtroDataDialog").data('tag').closest("tr");
              var eDate = $(trClicked).find("#date").text();
              var eTitle = $(trClicked).find("#title").text();
              $("#editOtroDataDialog").find("#title").val(eTitle);
              $("#editOtroDataDialog").find("#editOtroDate").val(eDate);
          },
          buttons: {
            "Actualizar": function() {
              var studyId = $("#editOtroDataDialog").data('tag').closest("tr").id;
              $("#editOtroDataForm").attr("action", "/updateOtroStudy/"+studyId.split('-')[2]);
              $("#editOtroDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $(".btn-create-otro-data").button().on( "click", function(event) {
            event.preventDefault();
            $( "#createOtroDataDialog" ).dialog('open');
        });

        $( "#createOtroDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Crear": function() {
              $("#createOtroDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnEditOtroData'").on( "click", function() {
            $( "#editOtroDataDialog" ).data('tag', this);
            $( "#editOtroDataDialog" ).dialog('open');
            //talvez modificar el form.action alcanzaria para no repetir dialogs
        });

        $("[name='btnEditOtroDoc'").on( "click", function() {
            var docId = $(this).closest("tr").find("#id").html();
            // var studyType = $(this).closest('.tab-content').children().first().attr("id");
            var studyType = $(this).closest('div').parent().attr('id').split('-')[1]
            $.get( "/studyImages?studyType="+studyType+"&docId="+docId, function( data ) {
              $('#otroInputFile').fileinput('destroy');
              $('#otroInputFile').fileinput({
                language: "es",
                allowedFileExtensions: ["jpg", "jpeg", "png", "gif", "pdf"],
                allowedFileTypes: ['image','object'],
                maxFileSize: 2000,
                initialPreview: data[0],
                uploadUrl: "/updateLaboratoryDocStudy", // server upload action
                uploadExtraData : {
                  '_token' : $("input[name='_token']").val(),
                  'studyType' : studyType,
                  'docId' : docId
                  },
                deleteExtraData : {
                  '_token' : $("input[name='_token']").val(),
                  'studyType' : studyType,
                  'docId' : docId
                  },
                mainClass: "input-group",
                uploadAsync: true,
                showUpload: true,
                overwriteInitial: false,
                purifyHtml: true,
                initialPreviewAsData: true, // identify if you are sending preview data only and not the raw markup
                initialPreviewFileType: 'image', // image is the default and can be overridden in config below
                previewZoomSettings: {
                  image: {width: "auto", height: "100%"},
                  pdf: {width: "100%", height: "100%", 'min-height': "480px"},
                  other: {width: "auto", height: "100%", 'min-height': "480px"}
                },
                initialPreviewConfig: data[1],
              });

            $( "#otroDocEditionDialog" ).data('tag', this);
            $( "#otroDocEditionDialog" ).dialog('open');
        });
       
        $("#initialPreview").val('"../img/13.jpg", "../img/15.jpeg", "../img/pdf-file.pdf"');

    });
        $( "#editOtroDate" ).datepicker();
        $( "#editOtroDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
        $( "#createOtroDate" ).datepicker();
        $( "#createOtroDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
});

    $(function () {
      //test
        // $("a[href='/studies']").parent().addClass("active");//actualiza el nav general activo

        $( "#createRxDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $("#createRxForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#deleteRxDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var id = $("#deleteRxDialog").data('tag').children[0].value;
              $("#deleteRxForm").attr("action", "/destroyRxStudy/"+id);
              $("#deleteRxForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnDeleteRx'").on( "click", function() {
            $( "#deleteRxDialog" ).data('tag', this);
            $( "#deleteRxDialog" ).dialog('open');
        });

        $( "#rxDocEditionDialog" ).dialog({
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

        $( "#editRxDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
              var trClicked = $("#editRxDataDialog").data('tag').closest("tr");
              var eDate = $(trClicked).find("#date").text();
              var eTitle = $(trClicked).find("#title").text();
              $("#editRxDataDialog").find("#title").val(eTitle);
              $("#editRxDataDialog").find("#editRxDate").val(eDate);
          },
          buttons: {
            "Actualizar": function() {
              var studyId = $("#editRxDataDialog").data('tag').closest("tr").id;
              $("#editRxDataForm").attr("action", "/updateRxStudy/"+studyId.split('-')[2]);
              $("#editRxDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $(".btn-create-rx-data").button().on( "click", function(event) {
            event.preventDefault();
            $( "#createRxDataDialog" ).dialog('open');
        });

        $( "#createRxDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Crear": function() {
              $("#createRxDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnEditRxData'").on( "click", function() {
            $( "#editRxDataDialog" ).data('tag', this);
            $( "#editRxDataDialog" ).dialog('open');
            //talvez modificar el form.action alcanzaria para no repetir dialogs
        });

        $("[name='btnEditRxDoc'").on( "click", function() {
            var docId = $(this).closest("tr").find("#id").html();
            var studyType = $(this).closest('div').parent().attr('id').split('-')[1]
            $.get( "/studyImages?studyType="+studyType+"&docId="+docId, function( data ) {
              $('#rxInputFile').fileinput('destroy');
              $('#rxInputFile').fileinput({
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

            $( "#rxDocEditionDialog" ).data('tag', this);
            $( "#rxDocEditionDialog" ).dialog('open');
        });
       
        $("#initialPreview").val('"../img/13.jpg", "../img/15.jpeg", "../img/pdf-file.pdf"');

    });
        $( "#editRxDate" ).datepicker( {
            changeMonth: true,
            changeYear: true
        });
        $( "#createRxDate" ).datepicker( {
            changeMonth: true,
            changeYear: true
        });
});

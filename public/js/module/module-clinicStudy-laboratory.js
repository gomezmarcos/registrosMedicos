    $(function () {
        $("a[href='/studies']").parent().addClass("active");//actualiza el nav general activo

        $( "#createLabDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $("#createAdmittionForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#deleteLabDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var id = $("#deleteLabDialog").data('tag').children[0].value;
              $("#deleteLabForm").attr("action", "/destroyLaboratoryStudy/"+id);
              $("#deleteLabForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnDeleteLab'").on( "click", function() {
            $( "#deleteLabDialog" ).data('tag', this);
            $( "#deleteLabDialog" ).dialog('open');
        });

        $( "#labDocEditionDialog" ).dialog({
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

        $( "#editLaboratoryDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
              var trClicked = $("#editLaboratoryDataDialog").data('tag').closest("tr");
              var eDate = $(trClicked).find("#date").text();
              var eTitle = $(trClicked).find("#title").text();
              $("#editLaboratoryDataDialog").find("#title").val(eTitle);
              $("#editLaboratoryDataDialog").find("#editLabDate").val(eDate);
          },
          buttons: {
            "Actualizar": function() {
              var studyId = $("#editLaboratoryDataDialog").data('tag').closest("tr").id;
              $("#editLaboratoryDataForm").attr("action", "/updateLaboratoryStudy/"+studyId.split('-')[2]);
              $("#editLaboratoryDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $(".btn-create-laboratory-data").button().on( "click", function(event) {
            event.preventDefault();
            $( "#createLaboratoryDataDialog" ).dialog('open');
        });

        $( "#createLaboratoryDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Crear": function() {
              $("#createLaboratoryDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnEditLabData'").on( "click", function() {
            $( "#editLaboratoryDataDialog" ).data('tag', this);
            $( "#editLaboratoryDataDialog" ).dialog('open');
        });

        $("[name='btnEditLabDoc'").on( "click", function() {
            var docId = $(this).closest("tr").find("#id").html();
            var studyType = $(this).closest('.tab-content').children().first().attr("id");
            $.get( "/studyImages?studyType="+studyType+"&docId="+docId, function( data ) {
              $('#inputFile').fileinput('destroy');
              $('#inputFile').fileinput({
                language: "es",
                allowedFileExtensions: ["jpg", "jpeg", "png", "gif", "pdf"],
                maxFileSize: 2000,
                initialPreview: data[0],
                uploadUrl: "/updateLaboratoryDocStudy", // server upload action
                uploadExtraData : {
                  '_token' : $("input[name='_token']").val(),
                  'docId' : docId,
                  'studyType' : studyType
                  },
                deleteExtraData : {
                  '_token' : $("input[name='_token']").val(),
                  'docId' : docId,
                  'studyType' : studyType
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

            $( "#labDocEditionDialog" ).data('tag', this);
            $( "#labDocEditionDialog" ).dialog('open');
        });
       
        $("#initialPreview").val('"../img/13.jpg", "../img/15.jpeg", "../img/pdf-file.pdf"');

    });
        $( "#editLabDate" ).datepicker();
        $( "#editLabDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
        $( "#createLabDate" ).datepicker();
        $( "#createLabDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
});

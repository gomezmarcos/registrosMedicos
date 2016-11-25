    $(function () {
      //test
        // $("a[href='/studies']").parent().addClass("active");//actualiza el nav general activo

        $( "#createEcoDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $("#createEcoForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#deleteEcoDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var id = $("#deleteEcoDialog").data('tag').children[0].value;
              $("#deleteEcoForm").attr("action", "/destroyEcoStudy/"+id);
              $("#deleteEcoForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnDeleteEco'").on( "click", function() {
            $( "#deleteEcoDialog" ).data('tag', this);
            $( "#deleteEcoDialog" ).dialog('open');
        });

        $( "#ecoDocEditionDialog" ).dialog({
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

        $( "#editEcoDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
              var trClicked = $("#editEcoDataDialog").data('tag').closest("tr");
              var eDate = $(trClicked).find("#date").text();
              var eTitle = $(trClicked).find("#title").text();
              $("#editEcoDataDialog").find("#title").val(eTitle);
              $("#editEcoDataDialog").find("#editEcoDate").val(eDate);
          },
          buttons: {
            "Actualizar": function() {
              var studyId = $("#editEcoDataDialog").data('tag').closest("tr").id;
              $("#editEcoDataForm").attr("action", "/updateEcoStudy/"+studyId.split('-')[2]);
              $("#editEcoDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $(".btn-create-eco-data").button().on( "click", function(event) {
            event.preventDefault();
            $( "#createEcoDataDialog" ).dialog('open');
        });

        $( "#createEcoDataDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Crear": function() {
              $("#createEcoDataForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $("[name='btnEditEcoData'").on( "click", function() {
            $( "#editEcoDataDialog" ).data('tag', this);
            $( "#editEcoDataDialog" ).dialog('open');
            //talvez modificar el form.action alcanzaria para no repetir dialogs
        });

        $("[name='btnEditEcoDoc'").on( "click", function() {
            var docId = $(this).closest("tr").find("#id").html();
            // var studyType = $(this).closest('.tab-content').children().first().attr("id");
            var studyType = $(this).closest('div').parent().attr('id').split('-')[1]
            $.get( "/studyImages?studyType="+studyType+"&docId="+docId, function( data ) {
              $('#ecoInputFile').fileinput('destroy');
              $('#ecoInputFile').fileinput({
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

            $( "#ecoDocEditionDialog" ).data('tag', this);
            $( "#ecoDocEditionDialog" ).dialog('open');
        });
       
        $("#initialPreview").val('"../img/13.jpg", "../img/15.jpeg", "../img/pdf-file.pdf"');

    });
        $( "#editEcoDate" ).datepicker();
        $( "#editEcoDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
        $( "#createEcoDate" ).datepicker();
        $( "#createEcoDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
});

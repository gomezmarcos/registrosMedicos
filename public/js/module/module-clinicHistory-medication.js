    $(function () {

        $('#createMedicationForm').validator().on('submit', function (e) {
          //e.preventDefault();
          //if (e.isDefaultPrevented()) {
           // console.log('fuck create if');
            // handle the invalid form...
          //} else {
           // console.log('fuck create else');
            // everything looks good!
          //}
        });

        $( "#createMedicationDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Guardar": function() {
              $("#createMedicationForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#deleteMedicationDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var medicationId = $("#deleteMedicationDialog").data('tag').children[0].value;
              $("#deleteMedicationForm").attr("action", "/clinicHistory/medication/"+medicationId);
              $("#deleteMedicationForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#editMedicationDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
            var trClicked = $("#editMedicationDialog").data('tag').closest("tr");
            var name = $(trClicked).find("#name").text();
            var drug = $(trClicked).find("#drug").text();
            var posology = $(trClicked).find("#posology").text();
            $("#editMedicationDialog").find("#medicationName").val(name);
            $("#editMedicationDialog").find("#medicationDrug").val(drug);
            $("#editMedicationDialog").find("#medicationPosology").val(posology);
          },
          buttons: {
            "Actualizar": function() {
              var medicationId = $("#editMedicationDialog").data('tag').closest("tr").id;
              $("#editMedicationForm").attr("action", "/clinicHistory/medication/"+medicationId.split('-')[2]);
              $("#editMedicationForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });


        $('#editMedicationForm').validator().on('submit', function (e) {
          //if (e.isDefaultPrevented()) {
           // console.log('fuck');
            // handle the invalid form...
          //} else {
           // console.log('fuck else');
            // everything looks good!
          //}
        });

        $("[name='btnDeleteMedication'").on( "click", function() {
            $( "#deleteMedicationDialog" ).data('tag', this);
            $( "#deleteMedicationDialog" ).dialog('open');
        });

        $("[name='btnEditMedication'").on( "click", function() {
            $( "#editMedicationDialog" ).data('tag', this);
            $( "#editMedicationDialog" ).dialog('open');
        });

        $(".btn-create-medication").button().on( "click", function(event) {
            event.preventDefault();
            $( "#createMedicationDialog" ).dialog('open');
        });

        $( "#createAdmittionDate" ).datepicker( {
            changeMonth: true,
            changeYear: true
        });
        $( "#editMedicationDate" ).datepicker( {
            changeMonth: true,
            changeYear: true
        });
    });

    $(function () {

      $("a[href='/misc']").parent().addClass("active");//actualiza el nav general activo
        
        $('#createAdmittionForm').validator().on('submit', function (e) {
          e.preventDefault();
          if (e.isDefaultPrevented()) {
            console.log('fuck create if');
            // handle the invalid form...
          } else {
            console.log('fuck create else');
            // everything looks good!
          }
        });

        $( "#createAdmittionDialog" ).dialog({
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

        $( "#deleteAdmittionDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          buttons: {
            "Borrar": function() {
              var admittionId = $("#deleteAdmittionDialog").data('tag').children[0].value;
              $("#deleteAdmittionForm").attr("action", "/clinicHistory/admittion/"+admittionId);
              $("#deleteAdmittionForm").submit();
              $( this ).dialog( "close" );
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });

        $( "#editAdmittionDialog" ).dialog({
          resizable: false,
          autoOpen: false,
          modal: true,
          open: function(event, ui){
            var trClicked = $("#editAdmittionDialog").data('tag').closest("tr");
            var admittionDate = $(trClicked).find("#admittionDate").text();
            var admittionTitle = $(trClicked).find("#admittionTitle").text();
            $("#editAdmittionDialog").find("#title").val(admittionTitle);
            $("#editAdmittionDialog").find("#dateEditForm").val(admittionDate);
          },
          buttons: {
            "Actualizar": function() {
              var admittionId = $("#editAdmittionDialog").data('tag').closest("tr").id;
              $("#editAdmittionForm").attr("action", "/clinicHistory/admittion/"+admittionId.split('-')[2]);
              $("#editAdmittionForm").submit();
            },
            "Cancelar": function() {
              $( this ).dialog( "close" );
            }
          }
        });


        $('#editAdmittionForm').validator().on('submit', function (e) {
          if (e.isDefaultPrevented()) {
            console.log('fuck');
            // handle the invalid form...
          } else {
            console.log('fuck else');
            // everything looks good!
          }
        });

        $("[name='btnDeleteAdmittion'").on( "click", function() {
            $( "#deleteAdmittionDialog" ).data('tag', this);
            $( "#deleteAdmittionDialog" ).dialog('open');
        });

        $("[name='btnEditAdmittion'").on( "click", function() {
            $( "#editAdmittionDialog" ).data('tag', this);
            $( "#editAdmittionDialog" ).dialog('open');
        });

        $(".btn-create-admittion").button().on( "click", function() {
            $( "#createAdmittionDialog" ).dialog('open');
        });

        $( "#editAdmittionDate" ).datepicker();
        $( "#editAdmittionDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );
        $( "#createAdmittionDate" ).datepicker();
        $( "#createAdmittionDate" ).datepicker( "option", "dateFormat", "d/mm/yy" );

    });

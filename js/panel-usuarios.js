$(document).ready(function () {
    $('#dataUsuario').DataTable({
        language:{
                    "sProcessing":     "Procesando...",
                    "sLengthMenu":     "Mostrar _MENU_ registros",
                    "sZeroRecords":    "No se encontraron resultados",
                    "sEmptyTable":     "Ningún dato disponible en esta tabla",
                    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                    "sInfoPostFix":    "",
                    "sSearch":         "Buscar:",
                    "sUrl":            "",
                    "sInfoThousands":  ",",
                    "sLoadingRecords": "Cargando...",
                    "oPaginate": {
                        "sFirst":    "Primero",
                        "sLast":     "Último",
                        "sNext":     "Siguiente",
                        "sPrevious": "Anterior"
                    },
                    "oAria": {
                        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                    }
                    },
        responsive: true
    });




    $('#frmUsuario').submit(function (e) { 
        e.preventDefault();
        $('#guardar_datos').attr("disabled", true);
    
        var parametros = $(this).serialize();

            $.ajax({
                    type: "POST",
                    url: "ajax/nuevo_usuario.php",
                    data: parametros,
                    
                    beforeSend: function(objeto){
                        // $("#resultados_ajax").html("Mensaje: Cargando...");
                        // $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
                    },
                    
                    success: function(datos){
                        
                        
                        $("#resultados_ajax").html(datos);
                        // $('#loader').html('');
                        setTimeout(function() {window.location.reload()  }, 2000);
                        // window.location.reload();
                        
            
                    }
            });
    
    });

    $(document).on("click", ".btnEditar", function () {
        opcion = 2; //editar
        fila = $(this).closest("tr");
        id = parseInt(fila.find("td:eq(0)").text()); //capturo el ID

        window.location.href = "datosusuario.php?usuario="+id;
        // nombre = fila.find("td:eq(1)").text();

        // $("#nombre").val(nombre);


        // $(".modal-header").css("background-color", "#007bff");
        // $(".modal-header").css("color", "white");
        // $(".modal-title").text("Editar Rubro");
        // $("#modalCRUD").modal("show");
    });

});
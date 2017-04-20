var MONITOR = window.MONITOR || {};

MONITOR.app = (function($, window, document, undefined){
	// Agregar Visita
	var obtenCamposVisita = function (){
		var datos = {};
		datos["Folio"] = $("#txtFolio2").val();
		datos["Fecha"] = $("#txtFecha2").val();
		datos["Hora"] = $("#txtHora2").val();
		datos["ddlMotivo"] = $("#ddlMotivo").val();
		datos["txtAreaAsunto"] = $("#txtAreaAsunto").val();
		datos["ddlDirigidoA"] = $("#ddlDirigidoA").val();
		datos["txtAreaComentarios"] = $("#txtAreaComentarios").val();
		datos["rdioResolucion"] = $("input[name=rdioResolucion]:checked").val();
		//datos[""] = $("#txt").val();	
		return datos;
	}

	var capturarVisita = function(){
		$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
		var datos = MONITOR.app.obtenCamposVisita();	
		datos["Pantalla"] = GLOBAL.app.readCookie("Pantalla");
		console.log(datos);
		GLOBAL.app.sendJson("BLL/index.php?fn=visita", datos, function(response){
			console.log(response)
			if(response.success){
				GLOBAL.app.showAlert("alert alert-success", "Los datos se capturaron correctamente, en breve seras redireccionado.");
				$("#btnAgregarVisita").hide();
			}
			else
			{
				GLOBAL.app.showAlert("alert alert-danger", "Ocurrio un error al capturar los datos.");
			}		
			GLOBAL.app.closeLoadingModal();
			CRONOMETRO.app.parar();
		});
	}

	var valida = $("form[name='formMonitor']").validate({
		rules: {			
			ddlMotivo: { required: true },
			txtAreaAsunto: {required: true},
			ddlDirigidoA: { required: true },
			txtAreaComentarios: { required: true},
			rdioResolucion: { required: true}
		},
		// Specify validation error messages
    	messages: {
    		ddlMotivo: "Debe indicar el motivo de la visita.",
			txtAreaAsunto: "Debe indicar el asunto.",
			ddlDirigidoA: "Debe indicar a donde fue dirigido.",
			txtAreaComentarios: "Debe indicar algún comentario.",
			rdioResolucion: "Debe indicar el estatus."
    	},
	    highlight: function(element) {
	        $(element).closest('.col-md-4').addClass('has-error');
	    },
	    unhighlight: function(element) {
	        $(element).closest('.col-md-4').removeClass('has-error');
	    },
	    errorElement: 'span',
        errorClass: 'error',
		errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
    	submitHandler: function(form) {
      		MONITOR.app.capturarVisita();
    	}
	});
	return {
		obtenCamposVisita : obtenCamposVisita,
		capturarVisita : capturarVisita
	}
}($, window, document, undefined));

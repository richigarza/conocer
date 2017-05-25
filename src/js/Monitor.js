var MONITOR = window.MONITOR || {};

MONITOR.app = (function($, window, document, undefined){
	// Agregar Visita
	var obtenCamposVisita = function (){
		var datos = {};
		datos["Folio"] = $("#txtFolio2").val();
		datos["Fecha"] = $("#txtFecha2").val();
		datos["Hora"] = $("#txtHora2").val();
		datos["ddlTipoLlamada"] = $("#ddlTipoLlamada").val() ? $("#ddlTipoLlamada").val() : 0;
		datos["ddlCurso"] = $("#ddlCurso").val() ? $("#ddlCurso").val() : 0;
		datos["ddlMotivo"] = $("#ddlMotivo").val() ? $("#ddlMotivo").val() : 0;
		datos["ddlEstandar"] = $("#ddlEstandar").val();
		datos["ddlEstadoEstandar"] = $("#ddlEstadoEstandar").val();
		datos["ddlPrestadorEstadoEstandar"] = $("#ddlPrestadorEstadoEstandar").val();
		datos["ddlRepresentante"] = $("#ddlRepresentante").val();
		datos["ddlMedio"] = $("#ddlMedio").val();
    	datos["ddlSecretaria"] = $("#ddlSecretaria").val() ? $("#ddlSecretaria").val() : 0;
		datos["txtAreaAsunto"] = $("#txtAreaAsunto").val();
		datos["ddlDirigidoA"] = $("#ddlDirigidoA").val() ? $("#ddlDirigidoA").val() : 0;
		datos["txtAreaComentarios"] = $("#txtAreaComentarios").val();
		datos["rdioResolucion"] = $("input[name=rdioResolucion]:checked").val();
		//datos[""] = $("#txt").val();	
		return datos;
	}

    var llenaTablaVisita = function(datos){
    	var tbl = 	""

    	datos.output.forEach(function(obj){
    	tbl += 		"<tr><td>"+obj.lastUpdate+
    				"</td><td>"+obj.motivo+
    				"</td><td>"+obj.asunto+
    				"</td><td>"+obj.comentarios+
    				"</td><td>"+obj.estatus+
    				"</td><td><a class='btn btn-info btnVerVisita' data-value='"+obj.idVisita+"'>Ver</a></td></tr>";
    	});
    	$("#tblVisitas").append(tbl);
    	inicializaBotonVisita();
    }

    var buscarPorIdVisita = function(id){
    	var datos = {};
    	datos["id"] = id;
        GLOBAL.app.sendJson("BLL/index.php?fn=buscarPorIdVisita", datos, function(response){
                console.log(response);
                if(response.success){
                    GLOBAL.app.llenarFormulario("formMonitor", response.output[0]);
                    MONITOR.app.llenaEstandar(response.output[0]);
                    GLOBAL.app.destroyCookie('Pantalla');
					GLOBAL.app.createCookie('Pantalla', 'Actualizar', 1);
					actualizaPantallaMonitor();
					$('#btnAgregarVisita').attr("data-value", response.output[0]["idVisita"]);
                }
        });
    }

	var capturarVisita = function(){
		$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
		var datos = MONITOR.app.obtenCamposVisita();
		datos["idVisita"] = $('#btnAgregarVisita').attr("data-value");
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
		    //ddlTipoLlamada: { required: function() { return $("#ddlTipoRegistro").val() == 3 } },
		    //ddlCurso: { required: function() { return $("#ddlTipoRegistro").val() != 3 } },
		    //ddlMotivo: { required: function() { return $("#ddlTipoLlamada").val() == 3 } },
			//ddlEstandar: { required: true},
			//ddlEstadoEstandar: { required: true},
			//ddlPrestadorEstadoEstandar: { required: true},
			//ddlRepresentante: { required: true},
			ddlMedio: { required: true},
			ddlSecretaria: { required: function() { return $("#ddlMedio").val() == 4 } },
			txtAreaAsunto: {required: function() { return $("#ddlTipoRegistro").val() != 3 } },
			//ddlDirigidoA: { required: function() { return $("#ddlTipoRegistro").val() != 3 } },
			txtAreaComentarios: { required: true},
			rdioResolucion: { required: true}
		},
		// Specify validation error messages
    	messages: {
    		ddlTipoLlamada: "Debe indicar un tipo de llamada.",
    		ddlCurso: "Debe indicar un curso de capacitación.",
    		ddlMotivo: "Debe indicar el motivo de la visita.",
    		ddlEstandar: "Debe indicar un estandar.",
    		ddlEstadoEstandar: "Debe indicar una entidad federativa.",
    		ddlPrestadorEstadoEstandar: "Debe indicar un prestador.",
    		ddlRepresentante: "Debe indicar un representante.",
    		ddlMedio: "Debe indicar el medio por el cual se entero.",
    		ddlSecretaria: "Debe indicar una secretaria.",
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

	var estandarOnChange = function(estado){
		var datos = {};
		datos["estandar"] = $("#ddlEstandar").val();
		GLOBAL.app.sendJson("BLL/index.php?fn=getEstadoEstandares", datos, function(response){
			if(response.success){
				$("#ddlEstadoEstandar").empty();
				$("#ddlEstadoEstandar").append('<option selected value="-1" disabled>Seleccione estado donde se localiza</option>');
				response.output.forEach(function(obj){
					GLOBAL.app.insertDDL("ddlEstadoEstandar", obj.idEstado, obj.estado);
				});
				if(estado != null)
				{
					$("#ddlEstadoEstandar").val(estado).trigger('change.select2');
				}
			}
		});
	}

	var estadoEstandarOnChange = function(prestador){
		var datos = {};
		datos["estandar"] = $("#ddlEstandar").val();
		datos["estado"] =  $("#ddlEstadoEstandar").val();
		GLOBAL.app.sendJson("BLL/index.php?fn=getPrestadorEstadoEstandares", datos, function(response){
			if(response.success){
				//localStorage.setItem("PrestadorEstadoEstandar", JSON.stringify(response.output));
				$("#ddlPrestadorEstadoEstandar").empty();
				$("#ddlPrestadorEstadoEstandar").append('<option selected value="-1" disabled>Seleccione prestador de serivicio</option>');
				response.output.forEach(function(obj){
					GLOBAL.app.insertDDL("ddlPrestadorEstadoEstandar", obj.cedula, obj.nombreEmpresa);
					
				});
				if(prestador != null){
					$("#ddlPrestadorEstadoEstandar").val(prestador).trigger('change.select2');
				}
			}
		});
	}

	var prestadorEstadoEstandarOnChange = function(representante){
		var datos = {};
		datos["estandar"] = $("#ddlEstandar").val();
		datos["prestador"] =  $("#ddlPrestadorEstadoEstandar").val();
		GLOBAL.app.sendJson("BLL/index.php?fn=getRepresentantePrestadorEstadoEstandares", datos, function(response){
			if(response.success){
				$("#ddlRepresentante").empty();
				$("#ddlRepresentante").append('<option selected value="-1" disabled>Seleccione prestador de serivicio</option>');
				response.output.forEach(function(obj){
					GLOBAL.app.insertDDL("ddlRepresentante", obj.cedulaR, obj.nombrePrestador);
				});
				if(representante != null)
				{
					$("#ddlRepresentante").val(representante).trigger('change.select2');
				}
			}
		});
	}

	var llenaEstandar = function(datos){
		$("#ddlEstandar").val(datos["ddlEstandar"]).trigger('change.select2');
		MONITOR.app.estandarOnChange(datos["ddlEstadoEstandar"]);
		MONITOR.app.estadoEstandarOnChange(datos["ddlPrestadorEstadoEstandar"]);
		setTimeout(function(){
			MONITOR.app.prestadorEstadoEstandarOnChange(datos["ddlRepresentante"]);
			},
			2000);
	}

	var actualizaPantallaMonitor = function(){
		$("#btnAgregarVisita").show();
		var pantallaEstatus = GLOBAL.app.readCookie('Pantalla');
		if(pantallaEstatus == 'Actualizar'){
			$('#btnAgregarVisita').text('Actualizar');
		}else{
			$('#btnAgregarVisita').text('Agregar visita');
			$('#btnAgregarVisita').attr("data-value", "0");
		}
	}


	return {
		obtenCamposVisita : obtenCamposVisita,
		buscarPorIdVisita : buscarPorIdVisita,
		llenaTablaVisita : llenaTablaVisita,
		capturarVisita : capturarVisita,
		estandarOnChange : estandarOnChange,
		estadoEstandarOnChange : estadoEstandarOnChange,
		prestadorEstadoEstandarOnChange : prestadorEstadoEstandarOnChange,
		llenaEstandar : llenaEstandar,
		actualizaPantallaMonitor : actualizaPantallaMonitor
	}
}($, window, document, undefined));


$("#ddlTipoLlamada").on("change", function(){
	if ($(this).val()==3) {
		$("#divCurso").show();
	}else{
		$("#divCurso").hide();
		$("#ddlCurso").val('-1');
	}
});

$("#ddlMedio").on("change", function(){
	if ($(this).val()==4) {
		$("#divSecretaria").show();
	}else{
		$("#divSecretaria").hide();
		$("#ddlSecretaria").val('-1');
	}
});

// Events
$("#ddlEstandar").on('change', function (){
	MONITOR.app.estandarOnChange(null);
});

$("#ddlEstadoEstandar").on('change', function (){
	MONITOR.app.estadoEstandarOnChange(null);
});

$("#ddlPrestadorEstadoEstandar").on('change', function (){
	MONITOR.app.prestadorEstadoEstandarOnChange(null);
});

$("#btnLimpiarMonitor").click(function(){
	GLOBAL.app.limpiarFormulario('formMonitor');
	GLOBAL.app.destroyCookie('Pantalla');
	GLOBAL.app.createCookie('Pantalla', 'Registrar', 1);
	MONITOR.app.actualizaPantallaMonitor();
});

$("#btnBackMonitor").click(function(){
	GLOBAL.app.destroyCookie('Pantalla');
	GLOBAL.app.createCookie('Pantalla', 'Actualizar', 1);
	REGISTRAR.app.actualizaPantalla();
	GLOBAL.app.redirect("panel2", "panel1");
	GLOBAL.app.redirect("panel2_1", "panel1");
});

// INITS
function inicializaBotonVisita(){
	$(".btnVerVisita").click(function(){
		GLOBAL.app.limpiarFormulario('formMonitor');
		MONITOR.app.buscarPorIdVisita($(this).attr("data-value"));       
	});
}
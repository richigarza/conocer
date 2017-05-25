var REGISTRAR = window.REGISTRAR || {};

REGISTRAR.app = (function($, window, document, undefined){
	// Registro
	function obtenCamposCapturaRegistro(){
		var datos = {};
		datos["txtFolio"] = $("#txtFolio").val();
		//datos["Fecha"] = $("#txtFecha").val();
		//datos["Hora"] = $("#txtHora").val();
		datos["pantalla"] = GLOBAL.app.readCookie('Pantalla');
		datos["ddlTipoRegistro"] = $("#ddlTipoRegistro").val();	
		datos["rdioMigrante"] = $("input[name=rdioMigrante]:checked").val();
		datos["rdioCertificacion"] = $("input[name=rdioCertificacion]:checked").val();
		datos["txtNombres"] = $("#txtNombres").val();
		datos["txtApellidoP"] = $("#txtApellidoP").val();
		datos["txtApellidoM"] = $("#txtApellidoM").val();
		datos["txtNombreEmpresa"] = $("#txtNombreEmpresa").val();
		datos["ddlTipoEmpresa"] = $("#ddlTipoEmpresa").val() === null ? "0" : $("#ddlTipoEmpresa").val();
		datos["rdioEstandar"] = $("input[name=rdioEstandar]:checked").val();
		datos["txtEmail"] = $("#txtEmail").val();
		datos["txtTelefono"] = $("#txtTelefono").val();
		datos["txtFechaNacimiento"] = $("#ddlTipoRegistro").val() == "1" ? $("#txtFechaNacimiento").val() : null;
		datos["ddlEntidadFederativa"] = $("#ddlEntidadFederativa").val();
		datos["ddlMedioContacto"] = $("#ddlMedioContacto").val();
		datos["ddlOcupacion"] = $("#ddlOcupacion").val() === null ? "0" : $("#ddlOcupacion").val();
		datos["ddlEscolaridad"] = $("#ddlEscolaridad").val() === null ? "0" : $("#ddlEscolaridad").val();
		//datos[""] = $("#txt").val();
		return datos;
	}
	var registrarCliente = function(){
		$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
		var datos = REGISTRAR.app.obtenCamposCapturaRegistro();
		datos["Pantalla"] = GLOBAL.app.readCookie("Pantalla");
		console.log(datos); 
		GLOBAL.app.sendJson("BLL/index.php?fn=registrar", datos, function(response){
				if(response.success){
					console.log(response);
					GLOBAL.app.showAlert("alert alert-success", "Los datos se capturaron correctamente, en breve seras redireccionado.");
					$(".txtFolio").val(response.folio);
					$(".txtFecha").val(response.date);
					$(".txtHora").val(response.hour);
					GLOBAL.app.redirect("panel1", "panel2");
					GLOBAL.app.redirect("panel1", "panel2_1");
					GLOBAL.app.destroyCookie('Pantalla');
					GLOBAL.app.createCookie('Pantalla', 'Registrar', 1);
					MONITOR.app.actualizaPantallaMonitor();
				}
				else
				{
					GLOBAL.app.showAlert("alert alert-danger", "Ocurrio un error al capturar los datos.");
				}		
				GLOBAL.app.closeLoadingModal();
			});			
	}

	var valida = $("form[name='formRegistrar']").validate({
		rules: {
			ddlTipoRegistro: { required: true },
			//rdioMigrante: { required: function() { return $("#ddlTipoRegistro").val() == 1 } },
			rdioCertificacion: { required: function() { return $("#ddlTipoRegistro").val() == 1 } },
			//txtNombres: { required: function() { return $("#ddlTipoRegistro").val() != 2 } },
			//txtApellidoP: { required: function() { return $("#ddlTipoRegistro").val() != 2 } },
			//txtApellidoM: { required: function() { return $("#ddlTipoRegistro").val() != 2 } },
			txtNombreEmpresa: { required: function() { return $("#ddlTipoRegistro").val() == 2 } },
			ddlTipoEmpresa: { required: function() { return $("#ddlTipoRegistro").val() == 2 } },
			rdioEstandar: { required: function() { return $("#ddlTipoRegistro").val() == 2 } },
			//txtFechaNacimiento: { required: function() { return $("#ddlTipoRegistro").val() == 1 } },
			ddlEntidadFederativa: { required: true },
			ddlMedioContacto: { required: true}
		},
		// Specify validation error messages
    	messages: {
    		ddlTipoRegistro: "Debe seleccionar el tipo de registro.",
			rdioMigrante: "Debe indicar sí ¿es migrante?",
			rdioCertificacion: "Debe indicar sí ¿cuenta con una certificacion?",
			txtNombres: "Debe llenar el campo con los nombres.",
			txtApellidoP: "Debe llenar el campo con el apellido paterno.",
			txtApellidoM: "Debe llenar el campo con el apellido materno.",
			txtNombreEmpresa: "Debe llenar el campo con el nombre de la empresa.",
			ddlTipoEmpresa: "Debe seleccionar el tipo de empresa.",
			rdioEstandar: "Debe indicar sí ¿cuenta con un estandar?",
			txtFechaNacimiento: "Debe indicar la fecha de nacimiento del solicitante.",
			ddlEntidadFederativa: "Debe seleccionar la entidad federativa.",
			ddlMedioContacto: "Debe seleccionar el medio de contacto."
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
      		REGISTRAR.app.registrarCliente();
    	}
    });

	var buscarPorId = function(id){
		var datos = {};
		datos["id"] = id;
		var resultado = {};
		GLOBAL.app.sendJson("BLL/index.php?fn=buscarPorId", datos, function(response){
			if(response.success){
				GLOBAL.app.limpiarFormulario('formRegistrar');
				GLOBAL.app.limpiarFormulario('formMonitor');
				$("#tblVisitas tbody").empty();
				GLOBAL.app.destroyCookie('Pantalla');
				GLOBAL.app.createCookie('Pantalla', 'Actualizar', 1);
				actualizaPantalla();
				GLOBAL.app.llenarFormulario('formRegistrar', response.output[0]);
				MONITOR.app.llenaTablaVisita(response.visitas);
				loadPageRegistrar(response.output[0]["ddlTipoRegistro"]);
				console.log(response);
				$("#myModal").modal("hide");
			}
		});
		return resultado;
	}

    var buscar = function(){
		$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});		
		var datos = {};
		datos["str"] = $("#txtBuscar").val();
		GLOBAL.app.sendJson("BLL/index.php?fn=buscar", datos, function(response){
				if(response.success){
					console.log(response);
					var tblName = "<div class='table-responsive scroll-table'><table class='table interactive table-striped table-hover'><thead class=''><th>id</th><th>Nombre solicitante</th><th>email</th><th>telefono</th><th></th></thead><tbody>";
					var footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>';
					response.output.forEach(function(obj){
						var name = obj['solicitanteType'] == 1 ? obj['nombre'] + ' ' + obj['apellidoPaterno'] + ' ' + obj['apellidoMaterno'] : obj['nombreEmpresa'];
						tblName = tblName + "<tr><td>"+obj['idSolicitante']+"</td><td>"
													  +name+"</td><td>"+obj['email']+"</td><td>"
													  +obj['telefono']+"</td><td><a data-value='"
													  +obj['idSolicitante']+"' class='btnVerBusqueda btn btn-info'>ver</a></td></tr>";
					});
					tblName = tblName + "</tbody></table></div>";
					GLOBAL.app.showModal("Busqueda", tblName, footer);
					inicializaBotones();
					}		
					GLOBAL.app.closeLoadingModal();
			});			
    }	

    var validaBusqueda = $("form[name='formSearch']").validate({
		rules: {

		},
		// Specify validation error messages
    	messages: {

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
      		REGISTRAR.app.buscar();
    	}
	});


	var actualizaPantalla = function(){
		var pantallaEstatus = GLOBAL.app.readCookie('Pantalla');
		if(pantallaEstatus == 'Actualizar'){
			$('#btnRegistrar').text('Actualizar');
		}else{
			$('#btnRegistrar').text('Registrar');
		}
	}

	return{
		obtenCamposCapturaRegistro : obtenCamposCapturaRegistro,
		registrarCliente : registrarCliente,
		buscarPorId : buscarPorId,
		buscar : buscar,
		actualizaPantalla : actualizaPantalla
	}
}($, window, document, undefined));


$("#ddlTipoRegistro").change(function(){
	loadPageRegistrar(this.value);
});

$("#btnLimpiarRegistrar").click(function(){
	GLOBAL.app.limpiarFormulario('formRegistrar');
});

function inicializaBotones(){
	$(".btnVerBusqueda").on("click", function(){
		REGISTRAR.app.buscarPorId($(this).attr("data-value"));
		GLOBAL.app.redirect("panel2", "panel1");
		GLOBAL.app.redirect("panel2_1", "panel1");
	});
}
// Actualiza Pantalla
REGISTRAR.app.actualizaPantalla();
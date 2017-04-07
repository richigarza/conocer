// Captura
var CAPTURA = window.CAPTURA || {};

CAPTURA.app = (function($, window, document, undefined){
	var obtenCamposCaptura = function (){
		var datos = {};
		datos["Folio"] = $("#txtFolio2").val();
		datos["Fecha"] = $("#txtFecha2").val();
		datos["Hora"] = $("#txtHora2").val();
		//datos[""] = $("#txt").val();	
		return datos;
	}
	return{
		obtenCamposCaptura : obtenCamposCaptura
	}
}($, window, document, undefined));

$("#btnCapturar").click(function(){
	$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
	var datos = CAPTURA.app.obtenCamposCaptura();	
	GLOBAL.app.sendJson("BLL/index.php?fn=capturar", datos, function(response){
		if(response.success){
			console.log(response);
			GLOBAL.app.showAlert("alert alert-success", "Los datos se capturaron correctamente, en breve seras redireccionado.");
			setTimeout(function() { $("#panel2").hide(); }, 3000);
			setTimeout(function() { $("#panel3").show(); }, 3000);
		}
		else
		{
			GLOBAL.app.showAlert("alert alert-danger", "Ocurrio un error al capturar los datos.");
		}		
		GLOBAL.app.closeLoadingModal();
	});			
});

$("#ddlEstandar").on('change', function (){
	var datos = {};
	datos["estandar"] = this.value;
	GLOBAL.app.sendJson("BLL/index.php?fn=getEstadoEstandares", datos, function(response){
		if(response.success){
			$("#ddlEstadoEstandar").empty();
			$("#ddlEstadoEstandar").append('<option selected value="-1" disabled>Seleccione estado donde se localiza</option>');
			response.output.forEach(function(obj){
				GLOBAL.app.insertDDL("ddlEstadoEstandar", obj.idEstado, obj.estado);
			});
		}
	});
});

$("#ddlEstadoEstandar").on('change', function (){
	var datos = {};
	datos["estandar"] = $("#ddlEstandar").val();
	datos["estado"] =  this.value;
	GLOBAL.app.sendJson("BLL/index.php?fn=getPrestadorEstadoEstandares", datos, function(response){
		if(response.success){
			//localStorage.setItem("PrestadorEstadoEstandar", JSON.stringify(response.output));
			$("#ddlPrestadorEstadoEstandar").empty();
			$("#ddlPrestadorEstadoEstandar").append('<option selected value="-1" disabled>Seleccione prestador de serivicio</option>');
			response.output.forEach(function(obj){
				GLOBAL.app.insertDDL("ddlPrestadorEstadoEstandar", obj.cedula, obj.nombreEmpresa);
			});
		}
	});
});

$("#ddlPrestadorEstadoEstandar").on('change', function (){
	var datos = {};
	datos["estandar"] = $("#ddlEstandar").val();
	datos["prestador"] =  this.value;
	GLOBAL.app.sendJson("BLL/index.php?fn=getRepresentantePrestadorEstadoEstandares", datos, function(response){
		if(response.success){
			$("#ddlRepresentante").empty();
			$("#ddlRepresentante").append('<option selected value="-1" disabled>Seleccione prestador de serivicio</option>');
			response.output.forEach(function(obj){
				GLOBAL.app.insertDDL("ddlRepresentante", obj.cedulaP, obj.nombrePrestador);
			});
		}
	});
});

$("#btnVerRepresentante").click(function(){
	var datos = {};
	var tblName = "<table class='table table-bordered'><thead class='bg-primary'><th>Cédula ECE/OC</th><th>Nombre ECE/OC</th><th>Cédula CE/EI</th><th>Nombre CE/EI</th></thead><tbody>";
	var tblDir = "<table class='table table-bordered'><thead class='bg-primary'><th>Direccion</th><th>Colonia</th><th>CP</th><th>Municipio</th><th>Estado</th></thead><tbody>";
	var tblContact = "<table class='table table-bordered'><thead class='bg-primary'><th>Correo Representante</th><th>Teléfono</th></thead><tbody>";
	var footer = '<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>';
	datos["cedulaP"] = $("#ddlRepresentante").val();
	if(datos["cedulaP"] != "-1"){
		GLOBAL.app.sendJson("BLL/index.php?fn=getRepresentante", datos, function(response){
			if(response.success){
				tblName = tblName + "<tr><td>"+$("#ddlPrestadorEstadoEstandar").val()+"</td><td>"+$("#ddlPrestadorEstadoEstandar").find(":selected").text()+"</td><td>"+datos["cedulaP"]+"</td><td>"+response.output[0]['nombrePrestador']+"</td></tr></tbody></table>";
				tblDir = tblDir + "<tr><td>"+response.output[0]['direccion']+"</td><td>"+response.output[0]['colonia']+"</td><td>"+response.output[0]['codigoPostal']+"</td><td>"+response.output[0]['ciudad']+"</td><td>"+$("#ddlEstadoEstandar").find(":selected").text()+"</td></tr></tbody></table>";
				tblContact = tblContact +"<tr><td>"+response.output[0]['email']+"</td><td>"+response.output[0]['telefono']+"</td></tr></tbody></table>";
				GLOBAL.app.showModal("Datos de contacto", tblName+tblDir+tblContact, footer);
			}
		});	
	}
});
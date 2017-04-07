var MONITOR = window.MONITOR || {};

MONITOR.app = (function($, window, document, undefined){
	// Agregar Visita
	var obtenCamposVisita = function (){
		var datos = {};
		datos["Folio"] = $("#txtFolio2").val();
		datos["Fecha"] = $("#txtFecha2").val();
		datos["Hora"] = $("#txtHora2").val();
		//datos[""] = $("#txt").val();	
		return datos;
	}
	return {
		obtenCamposVisita : obtenCamposVisita
	}
}($, window, document, undefined));

$("#btnAgregarVisita").click(function(){
	$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
	var datos = MONITOR.app.obtenCamposVisita();	
	GLOBAL.app.sendJson("BLL/index.php?fn=capturar", datos, function(response){
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
});
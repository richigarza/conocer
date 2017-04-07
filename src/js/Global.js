var GLOBAL = window.GLOBAL || {}


GLOBAL.app = (function($, window, document, undefined) {
	
	var sendJson = function (url, datos, successCallback){
		var result;
		$.ajax({
			url: url,
			data: datos,
			datatype: "json",
			type: "post",
			success: successCallback
		
		});
	}

	var showAlert = function (alertClass, alertMsg){
		$("#alertEstatus").show();
		$("#alertEstatus").attr("class", alertClass);
		$("#alertEstatus").text(alertMsg);
	}

	var closeLoadingModal = function (){
		setTimeout(function(){
			$("#alertEstatus").hide();
			$("#alertEstatus").attr("class", "");
			$("#alertEstatus").text("");
			$("#myModalLoading").modal("hide");
			}, 3000);
	}

	var showModal = function (header, body, footer){
		$("#myModal .modal-dialog .modal-content .modal-header h4").append(header);
		$("#myModal .modal-dialog .modal-content .modal-body").html(body);
		$("#myModal .modal-dialog .modal-content .modal-footer").html(footer);
		$("#myModal").modal("show");
	}

	var insertDDL = function(id, value, text){
		$("#"+id).append($('<option>', {
			value: value,
			text: text
		}));
	}

	return {
		sendJson : sendJson,
		showAlert : showAlert,
		closeLoadingModal : closeLoadingModal,
		showModal : showModal,
		insertDDL : insertDDL
	}
}($, window, document, undefined));


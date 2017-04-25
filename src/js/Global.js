var GLOBAL = window.GLOBAL || {}


GLOBAL.app = (function($, window, document, undefined) {
	
	//////////////////////////////////////////////
	// JSON
	//////////////////////////////////////////////
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

	//////////////////////////////////////////////
	// Modal
	//////////////////////////////////////////////
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
			}, 1000);
	}

	var showModal = function (header, body, footer){
		$("#myModal .modal-dialog .modal-content .modal-header h4").append(header);
		$("#myModal .modal-dialog .modal-content .modal-body").html(body);
		$("#myModal .modal-dialog .modal-content .modal-footer").html(footer);
		$("#myModal").modal("show");
	}

	//////////////////////////////////////////////
	// Carga DropDownList
	//////////////////////////////////////////////
	var insertDDL = function(id, value, text){
		$("#"+id).append($('<option>', {
			value: value,
			text: text
		}));
	}

	//////////////////////////////////////////////
	// Cookies
	//////////////////////////////////////////////
	var createCookie = function(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else var expires = "";
		document.cookie = name+"="+value+expires+"; path=/";
	}

	var readCookie = function(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') c = c.substring(1,c.length);
			if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
		}
		return null;
	}

	var destroyCookie = function(name) {
		createCookie(name,"",-1);
	}

	//////////////////////////////////////////////
	// Actualiza Pantallas
	//////////////////////////////////////////////
	//Recolectar datos de un formulario y almacenarlos en un diccionario
	var recolectarDatos = function(formId){
	    var datos = {};
	    $("form#"+formId+" input[type='text']").each(function(){
	        //if($(this).val() == "") $(this).val("test");
	        datos[this.id] = $(this).val();
	    });
	    $("form#"+formId+" textarea").each(function(){
	        //if($(this).val() == "") $(this).val("test");
	        datos[this.id] = $(this).val();
	    });
	    $("form#"+formId+" select").each(function(){
	        datos[this.id] = $("form#"+formId+" #"+this.id+" option:selected").val();
	    });
	    $("form#"+formId+" input[type='checkbox']").each(function(){
	        if($(this).is(":checked")) datos[this.id] = "si";
	        else datos[this.id] = "no";
	    });
	    $("form#"+formId+" input[type='radio']").each(function(){
	        datos[$(this).attr("name")] = $("form#"+formID+" input[name="+$(this).attr("name")+"]:checked").val();
	    });
	    //console.log(length(datos));
	    return datos;
	}

	// Limpia los formularios
	var limpiarFormulario = function(formId){
    	$("form#"+formId+" input[type='text']").each(function(){
	        //if($(this).val() == "") $(this).val("test");
	        $(this).val('');
	    });
	    $("form#"+formId+" textarea").each(function(){
	        //if($(this).val() == "") $(this).val("test");
	        $(this).val('');
	    });
	    $("form#"+formId+" select").each(function(){
	        $("form#"+formId+" #"+this.id).val('-1');
	    });
	    $("form#"+formId+" input[type='checkbox']").each(function(){
	        $(this).prop('checked', false);
	    });
	    $("form#"+formId+" input[type='radio']").each(function(){
	        var name = $(this).prop("name");
	        $("#"+name+"No").prop('checked', true);
	        
	    });
	}

	//Cargar valores de un diccionario en un formulario
	var llenarFormulario = function(formId, datos){
	    $("form#"+formId+" input[type='text']").each(function(){
	        $(this).val(datos[this.id]);
	    });
	    $("form#"+formId+" textarea").each(function(){
	        $(this).val(datos[this.id]);
	    });
	    $("form#"+formId+" select").each(function(){
	        $(this).val(datos[this.id]);
	    });
	    $("form#"+formId+" input[type='checkbox']").each(function(){
	        if(datos[this.id] == "si"){
	            $(this).prop('checked', true);
	        }else{
	            $(this).prop('checked', false);
	        }
	    });
	    $("form#"+formId+" input[type='radio']").each(function(){
	        $("form#"+formId+" input[name="+this.name+"][value=" + datos[this.name]+ "]").prop('checked', true);
	    });
	    return;
	}

	//////////////////////////////////////////////
	// Redirecciona las pantallas (html)
	//////////////////////////////////////////////
	var redirect = function(actual, next){
		setTimeout(function() { $("#"+actual).hide("slow"); }, 3000);
		setTimeout(function() { $("#"+next).show("slow"); }, 3000);
	}

	return {
		sendJson : sendJson,
		showAlert : showAlert,
		closeLoadingModal : closeLoadingModal,
		showModal : showModal,
		insertDDL : insertDDL,
		createCookie : createCookie,
		readCookie : readCookie,
		destroyCookie : destroyCookie,
		recolectarDatos : recolectarDatos,
		limpiarFormulario : limpiarFormulario,
		llenarFormulario : llenarFormulario,
		redirect : redirect
	}
}($, window, document, undefined));


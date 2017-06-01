var LOAD_PAGE = window.LOAD_PAGE || {};

LOAD_PAGE.app = (function($, window, document, undefined){
	// Estandares
	function cargaEstandares(){
		var datos = {};
		GLOBAL.app.sendJson("BLL/index.php?fn=getEstandares", datos, function(response){
			if(response.success){
				var select = "";
				datos = response.output;
				response.output.forEach(function(obj){
					GLOBAL.app.insertDDL("ddlEstandar", obj.codigo, obj.codigo + " - " + obj.descripcion);
				});
			}
		});
	}

	function cargaEstados(){
		var datos = {};
		GLOBAL.app.sendJson("BLL/index.php?fn=getEstados", datos, function(response){
			if(response.success){
				$("#ddlEntidadFederativa").empty();
				$("#ddlEntidadFederativa").append('<option selected value="-1" disabled>Seleccione prestador de serivicio</option>');
				$("#ddlEntidadFederativa").append('<option value="0">No especifica</option>');
				response.output.forEach(function(obj){
					GLOBAL.app.insertDDL("ddlEntidadFederativa", obj.idEstado, obj.estado);
				});
			}
		});
	}

	return{
		cargaEstandares : cargaEstandares,
		cargaEstados : cargaEstados
	}
}($, window, document, undefined));

function loadPageVisita(tipoRegistro){
	if (tipoRegistro==3) {
		$(".vistaMesa").show();
		$(".vistaNormal").hide();
	}else{
		$(".vistaMesa").hide();
		$(".vistaNormal").show();
	}
}
// Validaciones
function loadPageRegistrar(tipoRegistro){
	CRONOMETRO.app.inicio();
	if(tipoRegistro==1){
		$("#divMigrante").show();
		$("#divCuentaEstandar").hide();
		$("#divNombres").show();
		$("#divEmpresa").hide();
		$("#divCuentaCertificacion").show();
		$(".divColBirthDate").show();
		$(".tipoPersona").show();
		$(".Persona").show();
	}else if (tipoRegistro==2){
		$("#divMigrante").hide();
		$("#divCuentaEstandar").show();
		$("#divNombres").hide();
		$("#divEmpresa").show();
		$("#divCuentaCertificacion").hide();
		$(".divColBirthDate").hide();
		$(".tipoPersona").hide();
		$(".Persona").hide();
	}
	else{
		$("#divMigrante").hide();
		$("#divCuentaEstandar").hide();
		$("#divNombres").show();
		$("#divEmpresa").hide();
		$("#divCuentaCertificacion").hide();
		$(".divColBirthDate").hide();
		$(".tipoPersona").hide();
		$(".Persona").show();
	}
	$("#divContacto1").show();
	$("#divContacto2").show();
	$("#divBotones").show();
	loadPageVisita(tipoRegistro);
}

//////////////////////////////////////////////
// Nav
//////////////////////////////////////////////
$(".nav-menu").click(function(){
	$(".global-page").hide();
	$(".page-"+this.id).show();
	$(".nav-menu").attr('class', 'nav-menu');
	$("#"+this.id).attr('class', 'nav-menu active');
});

//////////////////////////////////////////////
// DatePicker
//////////////////////////////////////////////
$('.datepicker').datepicker({
	format: 'yyyy-mm-dd',
    autoclose: true,
    todayBtn: "linked",
    clearBtn: true,
    language: "es",
    todayHighlight: true,
    viewMode: 'years',
    startView: 'years',
    setDate: new Date()
});

//////////////////////////////////////////////
// Select2 
//////////////////////////////////////////////
$.fn.select2.defaults.set("theme", "bootstrap");
$(".select2").select2({ width: null });

//////////////////////////////////////////////
// INIT Catalogos
//////////////////////////////////////////////
LOAD_PAGE.app.cargaEstandares();
LOAD_PAGE.app.cargaEstados();
GRAFICAS.app.getGraficas();

//////////////////////////////////////////////
// Create INIT Cookies
//////////////////////////////////////////////
GLOBAL.app.createCookie('Pantalla', 'Registrar', 1);
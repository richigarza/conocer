var REPORTE = window.REPORTE || {};

REPORTE.app = (function($, window, document, undefined){

    var getReporte = function(){
		$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
        var datos = {};
        datos["tipoFecha"] = $("input[name=rdioReporteFecha]:checked").val();       
        datos["txtFechaExacta"] = $("#txtReporteFechaExacta").val();     
        datos["txtFechaInicial"] = $("#txtReporteFechaInicial").val();
        datos["txtFechaFinal"] = $("#txtReporteFechaFinal").val();
		console.log(datos);

        GLOBAL.app.sendJson("BLL/index.php?fn=reporte", datos, function(response){
            if(response.success){
                console.log(response);
				var tblReporte = "";
				response.output.forEach(function(row) {
					tblReporte += 	"<tr><td>"+row["idSolicitante"]+
							"</td><td>"+row["solicitanteType"]+
							"</td><td>"+row["nombre"]+
							//"</td><td>"+row["bitMigrante"]+
							"</td><td>"+row["migrante"]+
							//"</td><td>"+row["bitCertificado"]+
							"</td><td>"+row["certificado"]+
							//"</td><td>"+row["bitEstandarizado"]+
							"</td><td>"+row["estandarizado"]+
							"</td><td>"+row["email"]+
							"</td><td>"+row["telefono"]+
							//"</td><td>"+row["idTipoEmpresa"]+
							"</td><td>"+row["tipoEmpresa"]+
							//"</td><td>"+row["idEstado"]+
							"</td><td>"+row["estadoSolicitante"]+
							//"</td><td>"+row["idMedioContacto"]+
							"</td><td>"+row["medioContacto"]+
							"</td><td>"+row["fechaNacimiento"]+
							//"</td><td>"+row["idOcupacion"]+
							"</td><td>"+row["ocupacion"]+
							//"</td><td>"+row["idEscolaridad"]+
							"</td><td>"+row["escolaridad"]+
							//"</td><td>"+row["idGenero"]+
							"</td><td>"+row["genero"]+
							"</td><td>"+row["edad"]+
							"</td><td>"+row["fechaAlta"]+
							"</td><td>"+row["idVisita"]+
							//"</td><td>"+row["idTipoLlamada"]+
							"</td><td>"+row["tipoLlamada"]+
							//"</td><td>"+row["idCursosCapacitacion"]+
							"</td><td>"+row["cursosCapacitacion"]+
							//"</td><td>"+row["idMotivo"]+
							"</td><td>"+row["motivo"]+
							//"</td><td>"+row["idEstandar"]+
							"</td><td>"+row["estandar"]+
							//"</td><td>"+row["idEstadoVisita"]+
							"</td><td>"+row["estadoVisita"]+
							//"</td><td>"+row["idPrestador"]+
							//"</td><td>"+row["cedulaP"]+
							"</td><td>"+row["nombreEmpresa"]+
							//"</td><td>"+row["idRepresentante"]+
							//"</td><td>"+row["cedulaR"]+
							"</td><td>"+row["nombrePrestador"]+
							//"</td><td>"+row["idMedioEntero"]+
							"</td><td>"+row["medioEntero"]+
							//"</td><td>"+row["idSecretaria"]+
							"</td><td>"+row["secretaria"]+
							"</td><td>"+row["asunto"]+
							//"</td><td>"+row["idDirigidoA"]+
							"</td><td>"+row["dirigidoA"]+
							"</td><td>"+row["comentarios"]+
							//"</td><td>"+row["idEstatus"]+
							"</td><td>"+row["estatus"]+
							"</td><td>"+row["fechaVisita"]+
							"</td></tr>";
				});
				$("#tblReporte tbody").empty();
				$("#tblReporte tbody").append(tblReporte);
            }
        });
        GLOBAL.app.closeLoadingModal();
    }

    return{
        getReporte : getReporte
    }

}($, window, document, undefined));


$("#btnReporte").on("click", function(){         
    REPORTE.app.getReporte();     
})



//----------------
var CRONOMETRO = window.CRONOMETRO || {};

CRONOMETRO.app = (function($, window, document, undefined){
	var centesimas = 0;
	var segundos = 0;
	var minutos = 0;
	var horas = 0;
	
	var inicio = function () {
		control = setInterval(cronometro,10);
	}

	var parar = function () {
		clearInterval(control);
	}

	var reinicio = function () {
		clearInterval(control);
		centesimas = 0;
		segundos = 0;
		minutos = 0;
		horas = 0;
		Centesimas.innerHTML = ":00";
		Segundos.innerHTML = ":00";
		Minutos.innerHTML = ":00";
		Horas.innerHTML = "00";
	}

	var cronometro = function () {
		if (centesimas < 99) {
			centesimas++;
			if (centesimas < 10) { centesimas = "0"+centesimas }
			Centesimas.innerHTML = ":"+centesimas;
		}
		if (centesimas == 99) {
			centesimas = -1;
		}
		if (centesimas == 0) {
			segundos ++;
			if (segundos < 10) { segundos = "0"+segundos }
			Segundos.innerHTML = ":"+segundos;
		}
		if (segundos == 59) {
			segundos = -1;
		}
		if ( (centesimas == 0)&&(segundos == 0) ) {
			minutos++;
			if (minutos < 10) { minutos = "0"+minutos }
			Minutos.innerHTML = ":"+minutos;
		}
		if (minutos == 59) {
			minutos = -1;
		}
		if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
			horas ++;
			if (horas < 10) { horas = "0"+horas }
			Horas.innerHTML = horas;
		}
	}

	return{
		inicio : inicio,
		parar : parar,
		reinicio : reinicio
	}
}($, window, document, undefined));

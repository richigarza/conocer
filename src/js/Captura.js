// Captura



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

$("#btnLimpiarRegistrar").click(function(){
	GLOBAL.app.limpiarFormulario('formCaptura');
});

$("#btnBackCaptura").click(function(){
	GLOBAL.app.createCookie('Pantalla', 'Actualizar', 1);
	REGISTRAR.app.actualizaPantalla();
	GLOBAL.app.redirect("panel2", "panel1");
});
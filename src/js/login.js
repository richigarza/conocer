$("#btnLogin").click(function(){
	$("#myModalLoading").modal({show: true, backdrop: 'static', keyboard: false});
	var datos = {};
	datos["user"] = $("#user").val();
	datos["password"] = $("#pass").val();
	GLOBAL.app.sendJson("BLL/index.php?fn=login", datos, function(response){
		if(response.success){
			GLOBAL.app.showAlert("alert alert-success", "Te has conectado correctamente, seras redireccionado a la página en unos segundos.");
			setTimeout(function(){ window.location.href = "index.php?page=main"; }, 3500);
		}
		else
		{
			GLOBAL.app.showAlert("alert alert-danger", "Contraseña o usuario es incorrecto.");
		}		
		GLOBAL.app.closeLoadingModal();
	});
	
});
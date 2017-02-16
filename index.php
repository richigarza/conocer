<!DOCTYPE html>
<html lang="es">
  	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
   		<title>conocer</title>

    	<!-- Bootstrap CSS -->
    	<link href="css/bootstrap.min.css" rel="stylesheet">
		<style>
		body {
			background-color: #f1f1f1;
		}
			.margin-panels {
				margin:10px;
			}
			.row {
				margin-bottom: 10px;
			}
			.navbar-default {
    			background-color: #3a3a3a;
   				border-color: #e7e7e7;
			}
      #login-panel{
          position: relative;
          width: 600px;
          margin: 30px auto;
      }
		</style>
  	</head>
  	<body>
  		<nav class="navbar navbar-default" role="navigation">
			<ul class="nav navbar-nav">
			</ul>
				<img src="img/SEP_logo.png" style="margin-top: 15px;">
				<img src="img/conocer_logo.png" style="float:right; margin: 0px 0px 15px 15px;">
      		
		</nav> 

    <div id="login-panel" class="panel panel-primary margin-panels">
      <div class="panel panel-heading">
        Login
      </div>
      <div class="panel panel-body">
        <div class="form-group row">
          <label class=" col-md-5" for="name"> Usuario: </label>
          <div class="col-md-5">
            <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" maxlength="20">
          </div>
        </div>
        <div class="form-group row">
          <label class=" col-md-5" for="user"> Contraseña: </label>
          <div class="col-md-5">
            <input type="password" id="pass" name="pass" class="form-control" placeholder="Contraseña" maxlength="20">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-md-5">
            <input type="submit" class="btn btn-lg btn-primary" value="Login">
          </div>
        </div>
      </div>
    </div>

    <div class="margin-panels">
      <div class="row" style="text-aling:rigth;">
        <div class="col-md-3 col-md-offset-9">
            <input class="form-control" placeholder="Buscar">
        </div>
      </div>
    </div>

  		<div id="panel1" class="panel panel-primary margin-panels">
  			<div class="panel panel-heading">
  				Panel
  			</div>
  			<div class="panel panel-body">
  				<div class="row">
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Folio" disabled>
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Fecha" disabled>
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Hora" disabled>
  					</div>  					   					
  				</div>
  				<div class="row">
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Nombres">
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Apellido Paterno">
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Apellido Materno">
  					</div>  					   					
  				</div>
  				<div class="row">
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Email">
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Teléfono">
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="CURP">
  					</div>  					   					
  				</div>
   				<div class="row">
  					<div class="col-md-6">
  						<input type="text" class="form-control" placeholder="Nombre de la empresa">
  					</div>
  					<div class="col-md-6">
  						<select class="form-control" placeholder="Tipo de Empresa">
  							<option selected value="-1" disabled>Seleccione tipo de empresa</option>
  							<option value="1">Prestador de servicios</option>
  							<option value="2">OC</option>
  							<option value="3">Independiente</option>
  						</select>
  					</div>  					   					
  				</div>
  				<div class="row">
  					<div class="col-md-6">
  						<select class="form-control" placeholder="Entidad Federativa">
  							<option selected value="-1" disabled>Seleccione entidad federativa</option>
  							<option>Aguascalientes</option>
		                    <option>Baja California</option>
		                    <option>Baja California Sur</option>
		                    <option>Campeche</option>
		                    <option>Chiapas</option>
		                    <option>Chihuahua</option>
		                    <option>Coahuila</option>
		                    <option>Colima</option>
		                    <option>Distrito Federal</option>
		                    <option>Durango</option>
		                    <option>Estado de México</option>
		                    <option>Guanajuato</option>
		                    <option>Guerrero</option>
		                    <option>Hidalgo</option>
		                    <option>Jalisco</option>
		                    <option>Michoacán</option>
		                    <option>Morelos</option>
		                    <option>Nayarit</option>
		                    <option>Nuevo León</option>
		                    <option>Oaxaca</option>
		                    <option>Puebla</option>
		                    <option>Querétaro</option>
		                    <option>Quintana Roo</option>
		                    <option>San Luis Potosí</option>
		                    <option>Sinaloa</option>
		                    <option>Sonora</option>
		                    <option>Tabasco</option>
		                    <option>Tamaulipas</option>
		                    <option>Tlaxcala</option>
		                    <option>Veracruz</option>
		                    <option>Yucatán</option>
		                    <option>Zacatecas</option>
  						</select>
  					</div> 
   					<div class="col-md-6">
  						<select class="form-control" placeholder="Medio de Contacto">
  							<option selected value="-1" disabled>Seleccione medio de contacto</option>
  							<option value="1">Vía correo electrónico</option>
  							<option value="2">Vía Chat de la página web</option>
  							<option value="3">Vía telefónica</option>
  							<option value="3">Vía personal</option>
  						</select>
  					</div> 				   					
  				</div>
  				<div class="row">
  					<div class="col-md-12">
  						<button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Registrar</button>
  					</div>
  				</div>
  			</div>
  		</div>


  		<div id="panel2" class="panel panel-primary margin-panels">
  			<div class="panel panel-heading">
  				Panel
  			</div>
  			<div class="panel panel-body">
  				<div class="row">
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Folio" disabled>
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Fecha" disabled>
  					</div>
  					<div class="col-md-4">
  						<input type="text" class="form-control" placeholder="Hora" disabled>
  					</div>  					   					
  				</div>
   				<div class="row">
  					<div class="col-md-6">
  						<select class="form-control" placeholder="Ocupación">
  							<option selected value="-1" disabled>Seleccione ocupación</option>
  							<option value="1">Desempleado</option>
  							<option value="2">Empleado Sector Público</option>
  							<option value="3">Empleado Sector Privado</option>
  							<option value="4">Dueño de Empresa</option>
  							<option value="5">Profesionista Independiente</option>
  							<option value="6">Jubilado</option>
  							<option value="7">Estudiante</option>
  						</select>  					
  					</div>
  					<div class="col-md-6">
  						<select class="form-control" placeholder="Escolaridad">
  							<option selected value="-1" disabled>Seleccione último grado de escolaridad</option>
  							<option value="1">Ninguno</option>
  							<option value="2">Primaria</option>
  							<option value="3">Secundaria</option>
  							<option value="4">Preparatoria</option>
  							<option value="5">Carrera Técnica</option>
  							<option value="6">Licenciatura</option>
  							<option value="7">Maestría / Doctorado</option>
  						</select>
  					</div>  					   					
  				</div>
  				<div class="row">
  					<div class="col-md-4">
  						<select class="form-control" placeholder="Estandar Buscado">
  							<option selected value="-1" disabled>Seleccione estandar buscado</option>
  							
  						</select>
   					</div>
  					<div class="col-md-4">
  						<input class="form-control" placeholder="Prestador de Servicio">				
  					</div>
  					<div class="col-md-4">
  						<select class="form-control" placeholder="Estado donde se localiza">
  							<option selected value="-1" disabled>Seleccione estado donde se localiza</option>
  							<option>Aguascalientes</option>
		                    <option>Baja California</option>
		                    <option>Baja California Sur</option>
		                    <option>Campeche</option>
		                    <option>Chiapas</option>
		                    <option>Chihuahua</option>
		                    <option>Coahuila</option>
		                    <option>Colima</option>
		                    <option>Distrito Federal</option>
		                    <option>Durango</option>
		                    <option>Estado de México</option>
		                    <option>Guanajuato</option>
		                    <option>Guerrero</option>
		                    <option>Hidalgo</option>
		                    <option>Jalisco</option>
		                    <option>Michoacán</option>
		                    <option>Morelos</option>
		                    <option>Nayarit</option>
		                    <option>Nuevo León</option>
		                    <option>Oaxaca</option>
		                    <option>Puebla</option>
		                    <option>Querétaro</option>
		                    <option>Quintana Roo</option>
		                    <option>San Luis Potosí</option>
		                    <option>Sinaloa</option>
		                    <option>Sonora</option>
		                    <option>Tabasco</option>
		                    <option>Tamaulipas</option>
		                    <option>Tlaxcala</option>
		                    <option>Veracruz</option>
		                    <option>Yucatán</option>
		                    <option>Zacatecas</option>
  						</select>
  					</div>  					   					
  				</div>
  			</div>
  		</div>
		<!-- Modal -->
		<div id="myModal"class="modal fade" tabindex="-1" role="dialog" style="text-align:center;">
  			<div class="modal-dialog" role="document">
    			<div class="modal-content">
      				<!--<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
        				<h4 class="modal-title">Modal title</h4>
      				</div>-->
      				<div class="modal-body">
      					<img src="img/loading.gif" style="width:150px; display: block; margin: 0 auto;"/>
        				<p>Cargando, espere un momento.</p>
      				</div>
      				<!--<div class="modal-footer">
        				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        				<button type="button" class="btn btn-primary">Save changes</button>
      				</div>-->
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

    	<!-- Bootstrap -->
    	<script src="js/j.js"></script>	
    	<script src="js/bootstrap.min.js"></script>
		<!-- SCRIPTS -->
		<script>
		$("#prro").click(function(){
			$("#myModal").modal({show: true, backdrop: 'static', keyboard: false});
			$.ajax({
				url: "BLL/index.php?fn=lol",
				datatype: "json",
				type: "post",
				success: function(response){
					console.log(response.success);
					$("#myModal").modal("hide");
				}
			});			
		});
		</script>
	</body>
</html>
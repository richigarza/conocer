	<div id="panel4" class="panel panel-primary margin-panels" >
        <div class="panel panel-heading">
          Filtros de Reporte
        </div>
        <div class="panel panel-body">
			<div class="row">
	            <div class="col-md-2">
	              	<label>¿Ya cuenta con algún Estandar?</label>
	            </div>
	            <div class="col-md-2">
	              	<label>Si</label>
	              	<input type="radio" id="rdioRepEstandarSi" name="rdioEstandar">
	              	<label>No</label>
	              	<input type="radio" id="rdioRepEstandarNo" name="rdioEstandar">
	            </div>
	           	<div class="col-md-2">
	              	<label>¿Ya cuenta con una cerificación?</label>
	            </div>
	            <div class="col-md-2">
	              	<label>Si</label>
	              	<input type="radio" id="rdiocerificacionSi" name="rdiocerificacion">
	              	<label>No</label>
	              	<input type="radio" id="rdiocerificacionNo" name="rdiocerificacion">
	            </div>
	            <div class="col-md-2">
	              	<label>¿Es migrante?</label>
	            </div>
	            <div class="col-md-2">
	              	<label>Si</label>
	              	<input type="radio" id="rdiomigranteSi" name="rdiomigrante">
	              	<label>No</label>
	              	<input type="radio" id="rdiomigrantenNo" name="rdiomigrante">
	            </div>
	            <div class="col-md-4 col-md-offset-8">
	        		<label>Genero</label>
	        		<select class="form-control">
	        			<option selected value="-1" disabled>Seleccione...</option>
	        			<option>Masculino</option>
	        			<option>Femenino</option>
	        		</select>
	            </div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Resolución</label>
	        		<select class="form-control">
	        			<option selected value="-1" disabled>Seleccione...</option>
	        			<option>Atendido</option>
	        			<option>En Trámite</option>
	        			<option>Pendiente</option>
	        		</select>
	        	</div>
	        	<div class="col-md-4">
	        		<label>Dirección</label>
	        		<select class="form-control">
	        			<option selected value="-1" disabled>Seleccione...</option>
                		<option>DIRECCIÓN DE PROMOCIÍON Y APOYO A PRESTADORES (ACREDITACIÓN INICIAL)</option>
                		<option>DIRECCIÓN DE ACREDITACIÓN Y CERTIFICACIÓN (MESA DE AYUDA/DUPLUCADOS/CERTIFICADOS EN EC Ó NTCL)</option>
                		<option>DIRECCIÓN DE EXCELENCIA EN SERVICIO A USUARIOS (RENAC/QUEJAS)</option>
                		<option>DIRECCIÓN GENERAL DE PROMOCIÓN Y DESARROLLO (CGC)</option>
	        		</select>
	        	</div>
	        	<div class="col-md-4">
		            <label>Medio de Contacto</label>
		            <select class="form-control" placeholder="Medio de Contacto">
		                <option selected value="-1" disabled>Seleccione...</option>
		                <option value="1">Vía correo electrónico</option>
		                <option value="2">Vía Chat de la página web</option>
		                <option value="3">Vía telefónica</option>
		                <option value="3">Vía personal</option>
		            </select>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
		            <label>Atendio</label>
		            <select class="form-control" placeholder="Medio de Contacto">
		                <option selected value="-1" disabled>Seleccione...</option>
		                <option>Maritza Mora</option>
		                <option>Azminda Navarro</option>
		            </select>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
		            <label>Fecha de registro</label>
		        </div>
	        	<div class="col-md-3">
		            <label>Fecha Exacta</label>
		            <input type="radio" id="rdioRepFechaExacta" name="rdioRepFecha">
		        </div>
	        	<div class="col-md-3">
		            <label>Rango de Fechas</label>
		            <input type="radio" id="rdioRepFechaRango" name="rdioRepFecha">
		        </div>
		    </div>
	        <div class="row">
	        	<div class="col-md-4">
          			<label>Fecha Extacta</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" value="1/01/2000" data-date-format="dd/mm/yyyy" id="FechaNacimiento">
            		</div>
	        	</div>
	        	<div class="col-md-4">
          			<label>Fecha Incial</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" value="1/01/2000" data-date-format="dd/mm/yyyy" id="FechaNacimiento">
            		</div>
	        	</div>
	        	<div class="col-md-4">
          			<label>Fecha Final</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" value="1/01/2000" data-date-format="dd/mm/yyyy" id="FechaNacimiento">
            		</div>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Edad</label>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Edad Exacta</label>
	        		<input id="rdioEdadExacta" name="rdioEdad" type="radio">
	        	</div>
	        	<div class="col-md-4">
	        		<input id="EdadExacta" class="form-control" placeholder="Edad Exacta" type="numeric">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Rango de Edad</label>
	        		<input id="rdioEdadRango" name="rdioEdad" type="radio">
	        	</div>
	        	<div class="col-md-4">
	        		<input id="EdadRangoInicial" class="form-control" placeholder="Rango de Edad Inicial" type="numeric">
	        	</div>
	        	<div class="col-md-4">
	        		<input id="EdadRangoFinal" class="form-control" placeholder="Rango Edad Final" type="numeric">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Cualquiera</label>
	        		<input id="rdioEdadCualquiera" name="rdioEdad" type="radio">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<button class="btn btn-primary">Generar Reporte</button>
	        	</div>
	        </div>
		</div>
	</div>

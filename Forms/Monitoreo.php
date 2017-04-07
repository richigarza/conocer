	<div id="panel6" class="panel panel-primary margin-panels">
        <div class="panel panel-heading">
          Panel de Monitoreo
        </div>
        <div class="panel panel-body">
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
	        		<button class="btn btn-primary">Consultar</button>
	        	</div>
	        </div>	        
			<div class="table-responsive scroll-table" >
				<table id="TablaNotificaciones" class="table interactive">
					<thead>
						<th class="header">Folio</th><th>Fecha</th><th>Nombre</th><th>Enviado por</th><th>Dirigido a</th><th>Motivo</th>
					</thead>
					<tbody>
						<tr>
							<td>1</td><td>20/02/2017</td><td>Juan Pérez</td><td>Maritza Mora</td>
							<td>DIRECCIÓN DE PROMOCIÍON Y APOYO A PRESTADORES (ACREDITACIÓN INICIAL)</td>
							<td>Llamo para solicitar información.....</td>
						</tr>
					</tbody>
				</table>
			</div>
        </div>
    </div>
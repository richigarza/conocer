	<div id="panel4" class="panel panel-primary margin-panels" >
        <div class="panel panel-heading">
          Filtros de Reporte
        </div>
        <div class="panel panel-body">
	        <div class="row">
	        	<div class="col-md-4">
		            <label>Fecha de registro</label>
		        </div>
	        	<div class="col-md-3">
		            <label>Fecha Exacta</label>
		            <input type="radio" id="rdioReporteFechaExacta" name="rdioReporteFecha" value="exacta" checked>
		        </div>
	        	<div class="col-md-3">
		            <label>Rango de Fechas</label>
		            <input type="radio" id="rdioReporteFechaRango" name="rdioReporteFecha" value="rango">
		        </div>
		    </div>
	        <div class="row">
	        	<div class="col-md-4">
          			<label>Fecha Extacta</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" id="txtReporteFechaExacta">
            		</div>
	        	</div>
	        	<div class="col-md-4">
          			<label>Fecha Incial</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" id="txtReporteFechaInicial">
            		</div>
	        	</div>
	        	<div class="col-md-4">
          			<label>Fecha Final</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" id="txtReporteFechaFinal">
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
	        		<input id="rdioEdadExacta" name="rdioEdad" type="radio" value="exacta">
	        	</div>
	        	<div class="col-md-4">
	        		<input id="txtEdadExacta" class="form-control" placeholder="Edad Exacta" type="number">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Rango de Edad</label>
	        		<input id="rdioEdadRango" name="rdioEdad" type="radio" value="rango">
	        	</div>
	        	<div class="col-md-4">
	        		<input id="txtEdadRangoInicial" class="form-control" placeholder="Rango de Edad Inicial" type="number">
	        	</div>
	        	<div class="col-md-4">
	        		<input id="txtEdadRangoFinal" class="form-control" placeholder="Rango Edad Final" type="number">
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<label>Cualquier Edad</label>
	        		<input id="rdioEdadCualquiera" name="rdioEdad" type="radio" checked>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<button class="btn btn-primary" id="btnReporte">Generar Reporte</button>
	        	</div>
	        </div>
		</div>
	</div>

	<div id="panelReporte" class="panel panel-primary margin-panels" >
        <div class="panel panel-heading">
          Reporte
        </div>
        <div class="panel panel-body">
			<table id="tblReporte" class="table table-responsive table-bordered table-striped">
				<thead>
					<th>idSolicitante</th>
					<th>tipoSolicitante</th>
					<th>nombre</th>
					<th>migrante</th>
					<th>certificado</th>
					<th>estandarizado</th>
					<th>email</th>
					<th>telefono</th>
					<th>tipoEmpresa</th>
					<th>estado</th>
					<th>medioContacto</th>
					<th>fechaNacimiento</th>
					<th>ocupacion</th>
					<th>escolaridad</th>
					<th>genero</th>
					<th>edad</th>
					<th>fechaAlta</th>
					<th>idVisita</th>
					<th>tipoLlamada</th>
					<th>cursosCapacitacion</th>
					<th>motivo</th>
					<th>estandar</th>
					<th>estado</th>
					<th>prestador</th>
					<th>representante</th>
					<th>medioEntero</th>
					<th>secretaria</th>
					<th>asunto</th>
					<th>dirigidoA</th>
					<th>comentarios</th>
					<th>estatus</th>
					<th>fechaVisita</th>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
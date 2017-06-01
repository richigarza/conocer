	<div id="panel5" class="panel panel-primary margin-panels" >
        <div class="panel panel-heading">
          Filtros de Gráficas
        </div>
        <div class="panel panel-body">
	        <div class="row">
	        	<div class="col-md-4">
		            <label>Fecha de registro</label>
		        </div>
	        	<div class="col-md-3">
		            <label>Fecha Exacta</label>
		            <input type="radio" id="rdioRepFechaExacta" name="rdioRepFecha" value="exacta" checked>
		        </div>
	        	<div class="col-md-3">
		            <label>Rango de Fechas</label>
		            <input type="radio" id="rdioRepFechaRango" name="rdioRepFecha" value="rango">
		        </div>
		    </div>
	        <div class="row">
	        	<div class="col-md-4">
          			<label>Fecha Extacta</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" value="1/01/2000" data-date-format="dd/mm/yyyy" id="txtFechaExacta">
            		</div>
	        	</div>
	        	<div class="col-md-4">
          			<label>Fecha Incial</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" value="1/01/2000" data-date-format="dd/mm/yyyy" id="txtFechaInicial">
            		</div>
	        	</div>
	        	<div class="col-md-4">
          			<label>Fecha Final</label>
            		<div class="input-group">
              			<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
              			<input type="text" class="form-control datepicker" data-date-viewmode="years" value="1/01/2000" data-date-format="dd/mm/yyyy" id="txtFechaFinal">
            		</div>
	        	</div>
	        </div>
	        <div class="row">
	        	<div class="col-md-4">
	        		<button class="btn btn-primary" id="btnGraficas">Generar Gráficas</button>
	        	</div>
	        </div>
		</div>
	</div>
	<div class="panel panel-primary margin-panels">
		<div class="panel-heading">
			Gráficas
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-4">
					<div id="resolucion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
				</div>
				<div class="col-md-4">
					<div id="genero" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
				</div>
				<div class="col-md-4">
					<div id="graficaConEstandar" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4">
					<div id="graficaViaAtencion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
				</div>
				<div class="col-md-4">
					<div id="graficaEstandar" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
				</div>
				<div class="col-md-4">
					<div id="graficaEstado" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
				</div>
			</div>
			<div id="graficaDireccion" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
		</div>
	</div>

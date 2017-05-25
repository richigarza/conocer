      <div id="panel6" class="panel panel-primary margin-panels">
        <div class="panel panel-heading">
          Panel de mesa de servicio
        </div>
        <div class="panel panel-body">
          <form name="formMesa">
          	 <div class="row" id="divNombres" style="display:block;">
              <div class="col-md-4">
                <label class="control-label">Nombres</label>		
                <input id="txtNombres" name="txtNombres" type="text" class="form-control" placeholder="Nombres">
              </div>
              <div class="col-md-4">
                <label class="control-label">Apellido Paterno</label>
                <input id="txtApellidoP" name="txtApellidoP" type="text" class="form-control" placeholder="Apellido Paterno">
              </div>
              <div class="col-md-4">
                <label class="control-label">Apellido Materno</label>
                <input id="txtApellidoM" name="txtApellidoM" type="text" class="form-control" placeholder="Apellido Materno">
              </div>    
             </div>
            <div class="row" id="divContacto1" style="display:block;">
              <div class="col-md-4">
                <label class="control-label">Correo Electrónico</label>
                <input id="txtEmail" name="txtEmail" type="text" class="form-control" placeholder="Email">
              </div>
              <div class="col-md-4">
                <label class="control-label">Teléfono</label>
                <input id="txtTelefono" name="txtTelefono" type="text" class="form-control" placeholder="Teléfono">
              </div>
              <div class="col-md-4" id="divColBirthDate">
                <label class="control-label">Fecha de Naciemiento</label>
                <div class="input-group">
                    <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    <input id="txtFechaNacimiento" name="txtFechaNacimiento" class="form-control datepicker" placeholder="Fecha de nacimiento" data-date-viewmode="years">
                </div>
              </div>                        
            </div>
            <div class="row" id="divContacto2" style="display:block;">
              <div class="col-md-4">
                <label class="control-label">Entidad Federativa</label>
                <select class="form-control" placeholder="Entidad Federativa" id="ddlEntidadFederativa" name="ddlEntidadFederativa">
                  <option selected value="-1" disabled>Seleccione entidad federativa</option>
                </select>
              </div> 
              <div class="col-md-4">
                <label class="control-label">Medio de Contacto</label>
                <select class="form-control" placeholder="Medio de Contacto" id="ddlMedioContacto" name="ddlMedioContacto">
                  <option selected value="-1" disabled>Seleccione medio de contacto</option>
                  <option value="1">Vía correo electrónico</option>
                  <option value="2">Vía chat de la página web</option>
                  <option value="3">Vía telefónica</option>
                  <option value="3">Vía personal</option>
                </select>
              </div>                              
            	<div class="col-md-4">

            	</div>
           </div>
            <div class="row" id="divBotones" style="display:block;">
              <div class="col-md-12">
                <button id="btnRegistrarMesa" class="btn btn-success" type="submit"><i class="glyphicon glyphicon-plus"></i> Registrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div id="panel7" class="panel panel-primary margin-panels">
        <div class="panel panel-heading">
          Panel de mesa de servicio 2
        </div>
        <div class="panel panel-body">
          <form name="formMesa2">
          	<div class="row">
          	  <div class="col-md-4">
                <label class="control-label">Medio de Contacto</label>
                <select class="form-control" placeholder="Tipo de Llamada" id="ddlTipoLlamada" name="ddlTipoLlamada">
                  <option selected value="-1" disabled>Seleccione tipo de llamada</option>
                  <option value="1">Pasos para Certificarse</option>
                  <option value="2">Prestadores de Servicios</option>
                  <option value="3">Información sobre registros</option>
                  <option value="4">Comités de Gestión por Competencias</option>
                  <option value="5">Información CONOCER</option>
                  <option value="6">Queja</option>
                </select>
              </div> 
              <div class="col-md-4">
                <label class="control-label">Certificar cursos de capacitación</label>
                <select class="form-control" placeholder="Tipo de Llamada" id="ddlCurso" name="ddlCurso">
                  <option selected value="-1" disabled>Seleccione cursos de capacitación</option>
                  <option value="1">CVC</option>
                  <option value="2">RENEC</option>
                  <option value="3">RENAP</option>
                  <option value="4">RENAC</option>
                </select>
          	</div>
          </div>
          	<div class="row panel-margin">
              <div class="col-md-4">
                  <label class="control-label">Medio por el cual se enteró</label>
                  <select class="form-control" placeholder="Tipo de Llamada" id="ddlMedio" name="ddlMedio">
                    <option selected value="-1" disabled>Seleccione un medio</option>
                    <option value="1">Trabajo</option>
                    <option value="2">Internet</option>
                    <option value="3">Tiene una certificación</option>
                    <option value="4">Secretaría de gobierno</option>
                    <option value="5">No proporciona</option>
                    <option value="6">Amistad</option>
                    <option value="7">Curso</option>
                    <option value="8">Escuela</option>
                </select>
              </div>
              <div class="col-md-4">
                  <label class="control-label">Secretaría de gobierno</label>
                  <select class="form-control" placeholder="Secretaría de gobierno" id="ddlMedio" name="ddlMedio">
                    <option selected value="-1" disabled>Seleccione una secretaría</option>
                    <option value="1">CONACYT</option>
                    <option value="2">FIDE</option>
                    <option value="3">FOVISSSTE</option>
                    <option value="4">IMSS</option>
                    <option value="5">INAES</option>
                    <option value="6">INFONAVIT</option>
                    <option value="7">PGR</option>
                    <option value="8">Portal del empleo</option>
                    <option value="9">SAGARPA</option>
                    <option value="10">SCT</option>
                    <option value="11">SECRETARÍA DE ECONOMÍA</option>
                    <option value="12">SECRETARÍA DE ENERGÍA</option>
                    <option value="13">SECRETARÍA DE SALUD</option>
                    <option value="14">SECTOR</option>
                    <option value="15">SEDESOL</option>
                    <option value="16">SEGOB</option>
                    <option value="17">SEP</option>
                    <option value="18">SFP</option>
                    <option value="19">SRE</option>
                    <option value="20">STPS</option>

                </select>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-3">
                <label>Estatus</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="rdioResolucion" id="rdioResolucion3" value="3" checked>Atendido
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="rdioResolucion" id="rdioResolucion2" value="2">En Trámite
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="rdioResolucion" id="rdioResolucion1" value="1">Pendiente
                  </label>
                </div>
              </div>
            </div>
          	<div class="row panel-margin">
              <div class="col-md-4">
                <label>Asunto</label>
                <textarea id="txtAreaAsunto" name="txtAreaAsunto" class="form-control" rows="3" placeholder="Asunto"></textarea>
              </div>
            </div>
			<div class="row" id="divBotones" style="display:block;">
              <div class="col-md-12">
                <button id="btnRegistrarMesa2" class="btn btn-success" type="submit"><i class="glyphicon glyphicon-plus"></i> Registrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
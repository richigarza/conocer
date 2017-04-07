<style type="text/css">
.reloj{
  float: left;
  font-size: 16px;
  font-family: Courier,sans-serif;
  color: #363431;
}
#timmer {
  height:34px;
  margin: 0px;
  padding: 5px;
  text-align: center;
}
form .error {
  color: #ff0000;
}
.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
    color: #a94442;
}
.has-error .form-control {
    border-color: #a94442;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
}
.has-error .input-group-addon {
    color: #a94442;
    background-color: #f2dede;
    border-color: #a94442;
}
</style>
      <div class="margin-panels">
        <div class="row" style="text-aling:rigth;">
          <div class="col-md-3">
            <div class="alert alert-info" id="timmer">
              <div class="reloj">
                <i class="glyphicon glyphicon-time"></i>&nbsp;
              </div>
              <div class="reloj" id="Horas">00</div>
              <div class="reloj" id="Minutos">:00</div>
              <div class="reloj" id="Segundos">:00</div>
              <div class="reloj" id="Centesimas">:00</div></div>
          </div>
          <div class="col-md-3 col-md-offset-6">
          	<div class="input-group">
          		<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
              	<input class="form-control" placeholder="Buscar">
            </div>
          </div>
        </div>
      </div>

      <div id="panel1" class="panel panel-primary margin-panels">
        <div class="panel panel-heading">
          Panel de Registro
        </div>
        <div class="panel panel-body">
          <form name="formRegistrar">
            <div class="row" style="display:none;">
              <div class="col-md-4">
                <label class="control-label">Folio</label>
                <input id="txtFolio" type="text" class="form-control txtFolio" placeholder="Folio" disabled>
              </div>
              <div class="col-md-4">
                <label class="control-label">Fecha</label>	
                <input id="txtFecha" type="text" class="form-control txtFecha" placeholder="Fecha" disabled>
              </div>
              <div class="col-md-4">
                <label class="control-label">Hora</label>
                <input id="txtHora" type="text" class="form-control txtHora" placeholder="Hora" disabled>
              </div>                        
            </div>
            <div class="row">
              <div class="col-md-4">
                <label class="control-label">Tipo de registro</label>
                <select class="form-control" id="ddlTipoRegistro" name="ddlTipoRegistro" placeholder="Tipo de registro">
                  <option selected value="-1" disabled>Seleccione tipo de registro</option>
                  <option value="1">Persona</option>
                  <option value="2">Empresa</option>
                </select>
              </div>
            </div>
            <div class="row" id="divMigrante" style="display:none;">
              <div class="col-md-2">
                <label class="control-label">¿Es migrante?</label>
              </div>
              <div class="col-md-2">
                <label>Si</label>
                <input type="radio" id="rdioMigranteSi" name="rdioMigrante" value="1">
                <label>No</label>
                <input type="radio" id="rdioMigranteNo" name="rdioMigrante" value="0" checked>
              </div>
            </div>
            <div class="row" id="divCuentaCertificacion" style="display:none;">
              <div class="col-md-2">
                <label class="control-label">¿Ya cuenta con una certificación?</label>
              </div>
              <div class="col-md-2">
                <label>Si</label>
                <input type="radio" id="rdioCertificacionSi" name="rdioCertificacion" value="1">
                <label>No</label>
                <input type="radio" id="rdioCertificacionNo" name="rdioCertificacion" value="0" checked>
              </div>
            </div>
            <div class="row" id="divNombres" style="display:none;">
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
            <div class="row" id="divEmpresa" style="display:none;">
              <div class="col-md-6">
                <label class="control-label">Nombre de la Empresa</label>
                <input id="txtNombreEmpresa" name"txtNombreEmpresa" type="text" class="form-control" placeholder="Nombre de la empresa">
              </div>
              <div class="col-md-6">
                <label class="control-label">Tipo de Empresa</label>
                <select class="form-control" placeholder="Tipo de Empresa" id="ddlTipoEmpresa" name="ddlTipoEmpresa">
                  <option selected value="-1" disabled>Seleccione tipo de empresa</option>
                  <option value="1">Entidad de Certificación y Evaluación (ECE)</option>
                  <option value="2">Organismo Certificador (OC)</option>
                  <option value="3">Centro de Evaluación (CE)</option>
                  <option value="4">Evaluador Independiente (EI)</option>
                  <option value="5">Empresa que no Pertenece a la RED CONOCER</option>
                </select>
              </div>                        
            </div>
            <div class="row" id="divCuentaEstandar" style="display:none;">
              <div class="col-md-2">
                <label class="control-label">¿Ya cuenta con algún estandar?</label>
              </div>
              <div class="col-md-2">
                <label>Si</label>
                <input type="radio" id="rdioEstandarSi" name="rdioEstandar" value="1">
                <label>No</label>
                <input type="radio" id="rdioEstandarNo" name="rdioEstandar" value="0" checked>
              </div>
            </div>
            <div class="row" id="divContacto1" style="display:none;">
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
            <div class="row" id="divContacto2" style="display:none;">
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
            <div class="row" id="divBotones" style="display:none;">
              <div class="col-md-12">
                <button id="btnRegistrar" class="btn btn-success" type="submit"><i class="glyphicon glyphicon-plus"></i> Registrar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
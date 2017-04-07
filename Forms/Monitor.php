      <div id="panel3" class="panel panel-primary margin-panels" style="display:none;">
        <div class="panel panel-heading">
          Panel de Atención
        </div>
        <div class="panel panel-body">
          <form id="formRegistrar" name="formRegistrar" action="">
            <div class="row">
              <div class="col-md-4">
                <label>Folio</label>
                <input id="txtFolio3" type="text" class="form-control txtFolio" placeholder="Folio" disabled>
              </div>
              <div class="col-md-4">
                <label>Fecha</label>  
                <input id="txtFecha3" type="text" class="form-control txtFecha" placeholder="Fecha" disabled>
              </div>
              <div class="col-md-4">
                <label>Hora</label>
                <input id="txtHora3" type="text" class="form-control txtHora" placeholder="Hora" disabled>
              </div>                        
            </div>
            <div class="row panel-margin">
              <div class="col-md-3">
                <label>Motivo</label>
                <select id="Motivo" class="form-control">
                  <option>Informativo</option>
                  <option>Trámite</option>
                  <option>Requisitos</option>
                  <option>Seguimiento</option>                        
                </select>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-4">
                <label>Asunto</label>
                <textarea id="Asunto" class="form-control" rows="3" placeholder="Asunto"></textarea>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-6">
                <label>Dirigido a</label>
                <select class="form-control">
                  <option selected value="-1" disabled>Seleccione a donde va dirgido</option>
                  <option>DIRECCIÓN DE PROMOCÍON Y APOYO A PRESTADORES (ACREDITACIÓN INICIAL)</option>
                  <option>DIRECCIÓN DE ACREDITACIÓN Y CERTIFICACIÓN (MESA DE AYUDA/DUPLICADOS/CERTIFICADOS EN EC Ó NTCL)</option>
                  <option>DIRECCIÓN DE EXCELENCIA EN SERVICIO A USUARIOS (RENAC/QUEJAS)</option>
                  <option>DIRECCIÓN GENERAL DE PROMOCIÓN Y DESARROLLO (CGC)</option>
                </select>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-6">
                <label>Comentarios</label>
                <div class="input-group">
                  <span class="input-group-addon"><input id="Recordatorio" name="Recordatorio" type="checkbox" value="option1"></span>
                  <textarea id="Comentarios" class="form-control" rows="4" placeholder="Comentarios"></textarea>
                </div>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-3">
                <label>Estatus</label>
                <div class="radio">
                  <label>
                    <input type="radio" name="Resolucion" id="optionsRadios1" value="Atendido" checked>Atendido
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="Resolucion" id="optionsRadios2" value="Tramite">En Trámite
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="Resolucion" id="optionsRadios2" value="Pendiente">Pendiente
                  </label>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2">
                <button id="btnAgregarVisita" class="btn btn-primary btn-lg">Agregar visita</button>
              </div>
              <div class="col-md-offset-1 col-md-2">
                <button id="" class="btn btn-primary" style="display: none;">Nueva Visita</button>
              </div>
            </div>
          </div>
        </form>
      </div>
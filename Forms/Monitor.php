      <div id="panel3" class="panel panel-primary margin-panels" style="display:none;">
        <div class="panel panel-heading">
          Panel de Atención
        </div>
        <div class="panel panel-body">
          <form id="formMonitor" name="formMonitor" action="">
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
                <select id="ddlMotivo" name="ddlMotivo" class="form-control">
                  <option value="1">Informativo</option>
                  <option value="2">Trámite</option>
                  <option value="3">Requisitos</option>
                  <option value="4">Seguimiento</option>                        
                </select>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-4">
                <label>Asunto</label>
                <textarea id="txtAreaAsunto" name="txtAreaAsunto" class="form-control" rows="3" placeholder="Asunto"></textarea>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-6">
                <label>Dirigido a</label>
                <select name="ddlDirigidoA" id="ddlDirigidoA" class="form-control">
                  <option selected value="-1" disabled>Seleccione a donde va dirgido</option>
                  <option value="1">DIRECCIÓN DE PROMOCÍON Y APOYO A PRESTADORES (ACREDITACIÓN INICIAL)</option>
                  <option value="2">DIRECCIÓN DE ACREDITACIÓN Y CERTIFICACIÓN (MESA DE AYUDA/DUPLICADOS/CERTIFICADOS EN EC Ó NTCL)</option>
                  <option value="3">DIRECCIÓN DE EXCELENCIA EN SERVICIO A USUARIOS (RENAC/QUEJAS)</option>
                  <option value="4">DIRECCIÓN GENERAL DE PROMOCIÓN Y DESARROLLO (CGC)</option>
                </select>
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-6">
                <label>Comentarios</label>
                <textarea id="txtAreaComentarios" name="txtAreaComentarios" class="form-control" rows="4" placeholder="Comentarios"></textarea>
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
            <div class="row">
              <div class="col-md-2">
                <button type="submit" id="btnAgregarVisita" class="btn btn-success">Agregar visita</button>
              </div>
              <div class="col-md-offset-1 col-md-2">
                <button id="" class="btn btn-primary">Nueva Visita</button>
              </div>
            </div>
          </form>
        </div>
      </div>
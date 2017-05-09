      <div id="panel2_1" class="panel panel-primary margin-panels" style="display:none;">
        <div class="panel panel-heading">
          Panel de Visitas
        </div>
        <div class="panel panel-body">
          <div class="table-responsive scroll-table">
            <table class="table" id="tblVisitas">
              <thead>
                <th>Fecha</th><th>Motivo</th><th>Asunto</th><th>Comentarios</th><th>Estatus</th><th></th>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <div class="row">
            <div class="col-md-2">
              <button id="" class="btn btn-primary" style="display:none;">Nueva Visita</button>
            </div>
          </div>
        </div>
      </div>
      <div id="panel2" class="panel panel-primary margin-panels" style="display:none;">
        <div class="panel panel-heading">
          Panel de Atención
        </div>
        <div class="panel panel-body">
          <form id="formMonitor" name="formMonitor" action="">
            <div class="row">
              <div class="col-md-4">
                <label>Folio de la visita</label>
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
            <div class="row vistaMesa">
              <div class="col-md-4">
                <label class="control-label">Tipo de llamada</label>
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
              <div class="col-md-4" id="divCurso" style="display: none;">
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
              <div class="col-md-4 vistaNormal">
                <label>Motivo</label>
                <select id="ddlMotivo" name="ddlMotivo" class="form-control">
                  <option value="-1">Selecciona un motivo de la visita.</option>
                  <option value="1">Informativo</option>
                  <option value="2">Trámite</option>
                  <option value="3">Requisitos</option>
                  <option value="4">Seguimiento</option>                        
                </select>
              </div>
              <div class="col-md-4">
                <label>Estandar buscado</label>
                <select id="ddlEstandar" name="ddlEstandar" class="form-control select2" placeholder="Estandar Buscado">
                  <option selected value="-1" disabled>Seleccione estandar buscado</option>                
                </select>
              </div>                      
              <div class="col-md-4">
                <label>Estado donde se localiza</label>
                <select id="ddlEstadoEstandar" name="ddlEstadoEstandar" class="form-control select2" placeholder="Estado donde se localiza">
                  <option selected value="-1" disabled>Seleccione estado donde se localiza</option>
                </select>             
              </div>
            </div>
            <div class="row panel-margin">
              <div class="col-md-4">
                <label>Prestador del servicio</label>
                <select id="ddlPrestadorEstadoEstandar" name="ddlPrestadorEstadoEstandar" class="form-control select2" placeholder="Estado donde se localiza">
                  <option selected value="-1" disabled>Seleccione prestador de serivicio</option>
                </select>             
              </div>
              <div class="col-md-4">
                <label>Representante</label>
                <div class="input-group input-group-sm ">
                  <div class="select2-container">
                    <select id="ddlRepresentante" name="ddlRepresentante" class="form-control select2" placeholder="Prestador de Servicio">
                      <option selected value="-1" disabled>Seleccione al representante</option>
                    </select>
                  </div>
                  <div class="input-group-btn">
                    <button id="btnVerRepresentante" class="btn btn-info" type="button">
                      <span class="glyphicon glyphicon-search"></span> ver
                    </button>
                  </div>
                </div>
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
              <div class="col-md-4" id="divSecretaria" style="display: none;">
                  <label class="control-label">Secretaría de gobierno</label>
                  <select class="form-control" placeholder="Secretaría de gobierno" id="ddlSecretaria" name="ddlSecretaria">
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
              <div class="col-md-6 vistaNormal">
                <label>Asunto</label>
                <textarea id="txtAreaAsunto" name="txtAreaAsunto" class="form-control" rows="3" placeholder="Asunto"></textarea>
              </div>
              <div class="col-md-6">
                <label>Comentarios</label>
                <textarea id="txtAreaComentarios" name="txtAreaComentarios" class="form-control" rows="3" placeholder="Comentarios"></textarea>
              </div>
            </div>
            <div class="row panel-margin vistaNormal">
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
              <div class="col-md-1">
                <button id="btnBackMonitor" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar</button>
              </div>
              <div class="col-md-1">
                <button id="btnLimpiarMonitor" class="btn btn-default" type="button">Limpiar</button>
              </div>
              <div class="col-md-1">
                <button type="submit" id="btnAgregarVisita" data-value="0" class="btn btn-success">Agregar visita</button>
              </div>
            </div>
          </form>
        </div>
      </div>
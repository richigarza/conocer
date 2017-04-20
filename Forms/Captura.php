      <div id="panel2" class="panel panel-primary margin-panels" style="display: none;">
        <div class="panel panel-heading">
          Panel de Captura
        </div>
        <div class="panel panel-body">
          <form name="formCaptura" id="formCaptura">
            <div class="row">
              <div class="col-md-4">
                <label>Folio</label>
                <input id="txtFolio2" type="text" class="form-control txtFolio" placeholder="Folio" disabled>
              </div>
              <div class="col-md-4">
                <label>Fecha</label>	
                <input id="txtFecha2" type="text" class="form-control txtFecha" placeholder="Fecha" disabled>
              </div>
              <div class="col-md-4">
                <label>Hora</label>
                <input id="txtHora2" type="text" class="form-control txtHora" placeholder="Hora" disabled>
              </div>                        
            </div>
            <div class="row">
              <div class="col-md-4">
                <label>Ocupación</label>
                <select class="form-control" placeholder="Ocupación" id="ddlOcupacion" name="ddlOcupacion">
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
              <div class="col-md-4">
                <label>Escolaridad</label>
                <select class="form-control" placeholder="Escolaridad" id="ddlEscolaridad" name="ddlEscolaridad">
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
              <div class="col-md-4">
                <label>Estandar buscado</label>
                <select id="ddlEstandar" name="ddlEstandar" class="form-control select2" placeholder="Estandar Buscado">
                  <option selected value="-1" disabled>Seleccione estandar buscado</option>                
                </select>
              </div>                      
            </div>
            <div class="row">
              <div class="col-md-4">
                <label>Estado donde se localiza</label>
                <select id="ddlEstadoEstandar" name="ddlEstadoEstandar" class="form-control select2" placeholder="Estado donde se localiza">
                  <option selected value="-1" disabled>Seleccione estado donde se localiza</option>
                </select>             
              </div>
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
            <div class="row">
              <div class="col-md-1">
                <button id="btnBackCaptura" class="btn btn-danger" type="button"><i class="glyphicon glyphicon-circle-arrow-left"></i> Regresar</button>
              </div>
              <div class="col-md-1">
                <button id="btnLimpiarCaptura" class="btn btn-default" type="button">Limpiar</button>
              </div>
              <div class="col-md-1">
                <button id="btnCapturar" type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Capturar</button>
              </div>
            </div>
          </form>
        </div>
      </div>
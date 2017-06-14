<?php
/////////////////////////////
// BLL.Page.php
// Autor: Richi Garza
// Fecha: 05-Jun-2017
////////////////////////////

	class Reporte {

		function getReporte($array){
			$paramString = "SELECT 
	s.idSolicitante AS idSolicitante,
	s.solicitanteType AS solicitanteType,
	s.nombre AS nombre,
	s.apellidoPaterno AS apellidoPaterno,
	s.apellidoMaterno AS apellidoMaterno,
	s.migrante AS bitMigrante,
    crm.descripcion AS migrante,
	s.certificado AS bitCertificado,
	crc.descripcion AS certificado,
    s.estandarizado AS bitEstandarizado,
	cre.descripcion AS estandarizado,
    s.email AS email,
	s.telefono AS telefono,
	s.nombreEmpresa AS nombreEmpresa,
	s.tipoEmpresa AS idTipoEmpresa,
	cte.tipoEmpresa AS tipoEmpresa,
	s.idEstado AS idEstado,
	e.estado AS estadoSolicitante,
	s.medioContacto AS idMedioContacto,
    cmc.descripcion AS medioContacto,
	s.fechaNacimiento AS fechaNacimiento,
	s.ocupacion AS idOcupacion,
    co.ocupacion AS ocupacion,
	s.escolaridad AS idEscolaridad,
    ces.escolaridad AS escolaridad,
	s.genero AS idGenero,
    cg.descripcion AS genero,
  	s.edad AS edad,
	s.createDate AS fechaAlta,
  	v.idVisita AS idVisita,
	v.idTipoLlamada AS idTipoLlamada,
	ctl.tipoLlamada AS tipoLlamada,
	v.idCursosCapacitacion AS idCursosCapacitacion,
	ccc.cursosCapacitacion AS cursosCapacitacion,
	v.motivo AS idMotivo,
	cm.motivo AS motivo,
	v.idEstandar AS idEstandar,
	cest.codigo AS estandar,
	v.idEstado AS idEstadoVisita,
	e2.estado AS estadoVisita,
	v.idPrestador AS idPrestador,
	p.cedulaP AS cedulaP,
	p.nombrePrestador AS nombrePrestador,
	v.idRepresentante AS idRepresentante,
	r.cedulaR AS cedulaR,
	r.nombrePrestador AS nombrePrestador,
	v.idMedioEntero AS idMedioEntero,
    cme.medioEntero AS medioEntero,
	v.idSecretaria AS idSecretaria,
    cs.secretaria AS secretaria,
	v.asunto AS asunto,
	v.dirigidoA AS idDirigidoA,
	cda.dirigidoA AS dirigidoA,
	v.comentarios AS comentarios,
	v.estatus AS idEstatus,
	ce.estatus AS estatus,
	v.createDate AS fechaVisita
	FROM Solicitante s 
	LEFT JOIN Visita v ON (v.idSolicitante = s.idSolicitante) 
	LEFT JOIN CatalogoEstatus ce ON (ce.id = v.estatus)
	LEFT JOIN CatalogoTipoEmpresa cte ON (cte.id = s.tipoEmpresa)
	LEFT JOIN CatalogoEstandares cest ON (cest.idEstandar = v.idEstandar)
	LEFT JOIN Prestador p ON (p.idPrestador = v.idPrestador)
	LEFT JOIN Representante r ON (r.idRepresentante = v.idRepresentante)
	LEFT JOIN CatalogoMotivo cm ON (cm.id = v.motivo)
	LEFT JOIN CatalogoDirigidoA cda ON (cda.id = v.dirigidoA)
	LEFT JOIN CatalogoTipoLlamada ctl ON (ctl.id = v.idTipoLlamada)
	LEFT JOIN CatalogoCursosCapacitacion ccc ON (ccc.id = v.idCursosCapacitacion)
	LEFT JOIN CatalogoMedioContacto cmc ON (cmc.idMedioContacto = s.medioContacto)
    LEFT JOIN CatalogoMedioEntero cme ON (cme.id = v.idMedioEntero)
	LEFT JOIN CatalogoSecretaria cs ON (cs.id = v.idSecretaria)
    LEFT JOIN CatalogoRespuesta cre ON (cre.bitVal = s.estandarizado)
    LEFT JOIN CatalogoRespuesta crm ON (crm.bitVal = s.migrante)
    LEFT JOIN CatalogoRespuesta crc ON (crm.bitVal = s.certificado)
	LEFT JOIN CatalogoEscolaridad ces ON (ces.id = s.escolaridad)
	LEFT JOIN CatalogoOcupacion co ON (co.id = s.ocupacion)
    LEFT JOIN CatalogoGenero cg ON (cg.idGenero = s.genero)
	LEFT JOIN Estados e ON (e.idEstado = s.idEstado)
	LEFT JOIN Estados e2 ON (e2.idEstado = v.idEstado)
	WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END";
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
					'idSolicitante' => ($value->idSolicitante),
					'solicitanteType' => ($value->solicitanteType),
					'nombre' => ($value->nombre),
					'apellidoPaterno' => ($value->apellidoPaterno),
					'apellidoMaterno' => ($value->apellidoMaterno),
					'bitMigrante' => ($value->bitMigrante),
					'migrante' => ($value->migrante),
					'bitCertificado' => ($value->bitCertificado),
					'certificado' => ($value->certificado),
					'bitEstandarizado' => ($value->bitEstandarizado),
					'estandarizado' => ($value->estandarizado),
					'email' => ($value->email),
					'telefono' => ($value->telefono),
					'nombreEmpresa' => ($value->nombreEmpresa),
					'idTipoEmpresa' => ($value->idTipoEmpresa),
					'tipoEmpresa' => ($value->tipoEmpresa),
					'idEstado' => ($value->idEstado),
					'estadoSolicitante' => ($value->estadoSolicitante),
					'idMedioContacto' => ($value->idMedioContacto),
					'medioContacto' => ($value->medioContacto),
					'fechaNacimiento' => ($value->fechaNacimiento),
					'idOcupacion' => ($value->idOcupacion),
					'ocupacion' => ($value->ocupacion),
					'idEscolaridad' => ($value->idEscolaridad),
					'escolaridad' => ($value->escolaridad),
					'idGenero' => ($value->idGenero),
					'genero' => ($value->genero),
					'edad' => ($value->edad),
					'fechaAlta' => ($value->fechaAlta),
					'idVisita' => ($value->idVisita),
					'idTipoLlamada' => ($value->idTipoLlamada),
					'tipoLlamada' => ($value->tipoLlamada),
					'idCursosCapacitacion' => ($value->idCursosCapacitacion),
					'cursosCapacitacion' => ($value->cursosCapacitacion),
					'idMotivo' => ($value->idMotivo),
					'motivo' => ($value->motivo),
					'idEstandar' => ($value->idEstandar),
					'estandar' => ($value->estandar),
					'idEstadoVisita' => ($value->idEstadoVisita),
					'estadoVisita' => ($value->estadoVisita),
					'idPrestador' => ($value->idPrestador),
					'cedulaP' => ($value->cedulaP),
					'nombrePrestador' => ($value->nombrePrestador),
					'idRepresentante' => ($value->idRepresentante),
					'cedulaR' => ($value->cedulaR),
					'nombrePrestador' => ($value->nombrePrestador),
					'idMedioEntero' => ($value->idMedioEntero),
					'medioEntero' => ($value->medioEntero),
					'idSecretaria' => ($value->idSecretaria),
					'secretaria' => ($value->secretaria),
					'asunto' => ($value->asunto),
					'idDirigidoA' => ($value->idDirigidoA),
					'dirigidoA' => ($value->dirigidoA),
					'comentarios' => ($value->comentarios),
					'idEstatus' => ($value->idEstatus),
					'estatus' => ($value->estatus),
					'fechaVisita' => ($value->fechaVisita)
				);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}
	}

?>


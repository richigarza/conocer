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
	s.tipoEmpresa AS tipoEmpresa,
	
	s.idEstado AS idEstado,
	e.estado AS estadoSolicitante,
	s.medioContacto AS idMedioContacto,
    cmc.descripcion AS medioContacto,
	s.fechaNacimiento,
	s.ocupacion AS idOcupacion,
    co.ocupacion AS ocupacion,
	s.escolaridad AS idEscolaridad,
    ces.escolaridad AS escolaridad,
	s.genero AS idGenero,
    cg.descripcion AS genero,
  	s.edad AS edad,
  	v.idVisita AS idVisita,
	v.idTipoLlamada AS idTipoLlamada,
	v.idCursosCapacitacion AS idCursosCapacitacion,
	v.motivo AS idMotivo,
	cm.motivo AS motivo,
	v.idEstandar AS idEstandar,
	v.idEstado AS idEstado,
	e2.estado AS estadoVisita,
	v.idPrestador AS idPrestador,
	v.idRepresentante AS idRepresentante,
	v.idMedioEntero AS idMedioEntero,
    cme.medioEntero AS medioEntero,
	v.idSecretaria AS idSecretaria,
    cs.secretaria AS secretaria,
	v.asunto AS asunto,
	v.dirigidoA AS dirigidoA,
	v.comentarios AS comentarios,
	v.estatus AS estatus
	FROM Solicitante s 
	LEFT JOIN Visita v ON (v.idSolicitante = s.idSolicitante) 
	LEFT JOIN CatalogoEstatus ce ON (ce.id = v.estatus)
	LEFT JOIN CatalogoMotivo cm ON (cm.id = v.motivo)
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
				$list[] = array();
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}
	}

?>


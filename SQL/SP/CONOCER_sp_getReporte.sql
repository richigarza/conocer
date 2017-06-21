USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_getReporte`;


DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getReporte`(
)
BEGIN
	SELECT 
		s.idSolicitante,
		s.solicitanteType,
        CASE
			WHEN s.solicitanteType=2 THEN p.nombreEmpresa
            ELSE CONCAT(s.nombre, ' ', s.apellidoPaterno, ' ', s.apellidoMaterno)
		END AS nombre,
        crm.descripcion AS migrante,
        crc.descripcion AS certificado,
        cre.descripcion AS estandarizado,
        s.email,
        s.telefono,
        cte.tipoEmpresa,
        /*e.estado,
        cmc.medioContacto,*/
        s.fechaNacimiento,
        co.ocupacion,
        ces.escolaridad,
        cg.descripcion AS genero,
        s.edad,
        s.createdDate,
        v.idVisita,
        ctl.tipoLlamada,
        ccc.cursosCapacitacion,
        cm.motivo,
        cest.codigo,
        p.cedulaP,
        r.cedulaR,
        r.nombrePrestador,
        cme.medioEntero,
        cs.secretaria,
        v.asunto,
        cda.dirigidoA,
        v.comentarios,
        ce.estatus,
        v.createdDate AS fechaVisita 
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
    LEFT JOIN Estados e2 ON (e2.idEstado = v.idEstado);
END$$

DELIMITER ;
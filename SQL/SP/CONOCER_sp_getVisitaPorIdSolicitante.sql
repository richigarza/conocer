USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_getVisitaPorIdSolicitante`;

DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getVisitaPorIdSolicitante`(
IN idSolicitante INT
)
BEGIN

SELECT 
			v.idVisita AS idVisita,
			cm.motivo AS motivo,
			v.idEstandar AS idEstandar,
			v.idEstado AS idEstado,
			v.idPrestador AS idPrestador,
			v.idRepresentante AS idRepresentante,
			v.asunto AS asunto,
			v.dirigidoA AS dirigidoA,
			v.comentarios AS comentarios,
			ce.estatus AS estatus,
			v.tiempoAtencion AS tiempoAtencion,
			v.createdDate AS createdDate,
			v.lastUpdate AS lastUpdate
FROM Visita v 
INNER JOIN CatalogoEstatus ce ON (ce.id = v.estatus) 
INNER JOIN CatalogoMotivo cm ON (cm.id = v.motivo)
WHERE v.idSolicitante=idSolicitante;


END$$

DELIMITER ;
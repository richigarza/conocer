USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_getVisitaPorId`;

DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getVisitaPorId`(
IN idVisita INT
)
BEGIN

    SELECT  v.idVisita AS idVisita,
                    v.idTipoLlamada AS idTipoLlamada,
                    v.idCursosCapacitacion AS idCursosCapacitacion,
                    v.motivo AS motivo, 
                    ce.codigo AS Estandar, 
                    v.idEstado AS idEstado, 
                    p.cedulaP AS Prestador, 
                    r.cedulaR AS Representante, 
                    v.idMedioEntero AS idMedioEntero,
                    v.idSecretaria AS idSecretaria,
                    v.asunto AS asunto, 
                    v.dirigidoA AS dirigidoA, 
                    v.comentarios AS comentarios, 
                    v.estatus AS estatus, 
                    v.tiempoAtencion, 
                    v.createdDate AS createdDate, 
                    v.lastUpdate AS lastUpdate 
    FROM Visita v  
    INNER JOIN CatalogoEstandares ce ON (ce.idEstandar = v.idEstandar) 
    INNER JOIN Prestador p ON (p.idPrestador = v.idPrestador) 
    INNER JOIN Representante r ON (r.idRepresentante = v.idRepresentante) 
    WHERE idVisita=idVisita;
    
END$$

DELIMITER ;


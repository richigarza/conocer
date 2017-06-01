USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_getGraficaEstado`;

DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getGraficaEstado`(
IN idSolicitante INT
)
BEGIN

	SELECT e.estado as estado, SUM(1) AS numero 
	FROM Solicitante s 
	INNER JOIN Estados e ON (e.idEstado = s.idEstado) 
	GROUP BY s.idEstado;

END$$
DELIMITER ;

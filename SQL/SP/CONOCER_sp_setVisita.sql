USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_setVisita`;

DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_setVisita`(
	IN idVisita INT,
    IN idSolicitante INT, 
	IN motivo INT, 
	IN estandar varchar(20), 
	IN idEstado INT, 
	IN prestador varchar(20), 
	IN representante varchar(20),
	IN asunto VARCHAR(200), 
	IN dirigidoA INT, 
	IN comentarios VARCHAR(200), 
	IN estatus INT,
	IN tiempoAtencion VARCHAR(15),
    IN pantalla VARCHAR(20),
	OUT output INT
)
BEGIN

	DECLARE idEstandar INT(10);
	DECLARE idPrestador INT(10);
	DECLARE idRepresentante INT(10);
    
	SELECT ce.idEstandar INTO idEstandar FROM CatalogoEstandares ce WHERE ce.codigo LIKE CONCAT('%', estandar, '%');
	SELECT p.idPrestador INTO idPrestador FROM Prestador p WHERE p.cedulaP=prestador;
	SELECT r.idRepresentante INTO idRepresentante FROM Representante r WHERE r.cedulaR=representante;

	IF pantalla='Registrar'
	THEN 
		INSERT INTO Visita (idSolicitante, idTipoLlamada, idCursosCapacitacion, motivo, idEstandar, idEstado, idPrestador, idRepresentante, idMedioEntero, idSecretaria, asunto, dirigidoA, comentarios, estatus, tiempoAtencion) 
		VALUES(idSolicitante, idTipoLlamada, idCursosCapacitacion, motivo, idEstandar, idEstado, idPrestador, idRepresentante, idMedioEntero, idSecretaria, asunto, dirigidoA, comentarios, estatus, tiempoAtencion);

	SELECT LAST_INSERT_ID() INTO output;
	ELSE 
		UPDATE Visita 
        SET idTipoLlamada=idTipoLlamada,
				idCursosCapacitacion=idCursosCapacitacion,
                motivo=motivo,
                idEstandar=idEstandar, 
                idEstado=idEstado, 
                idPrestador=idPrestador, 
                idRepresentante=idRepresentante, 
                idMedioEntero=idMedioEntero,
                idSecretaria=idSecretaria,
                asunto=asunto, 
                dirigidoA=dirigidoA, 
                comentarios=comentarios, 
                estatus=estatus, 
                tiempoAtencion=tiempoAtencion
        WHERE idVisita=idVisita;

        SELECT idVisita INTO output;
        
	END IF;
    

END$$

DELIMITER ;


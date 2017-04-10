DROP DATABASE IF EXISTS dbCONOCER;
CREATE DATABASE dbCONOCER;


CREATE USER 'conocer'@'localhost' IDENTIFIED BY '123pormi';
GRANT ALL PRIVILEGES ON dbCONOCER.* TO 'conocer'@'localhost';
COMMIT;

-- Tabla de Usuarios
DROP TABLE IF EXISTS dbCONOCER.User;

CREATE TABLE dbCONOCER.User(
	idUser INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	firstName VARCHAR(25) NOT NULL COMMENT "Nombres del usuario",
	lastName VARCHAR(25) NOT NULL COMMENT "Apellidos del usuario",
	userName VARCHAR(20) NOT NULL COMMENT "Usuario",
	password VARCHAR(20) NOT NULL COMMENT "Contraseña",
	email VARCHAR(60) NOT NULL COMMENT "Correo electrónico del usuario",
	userType INT(2) NOT NULL COMMENT "Nivel de acceso del usuario",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Usuarios";

DROP TABLE IF EXISTS dbCONOCER.Estados;

CREATE TABLE dbCONOCER.Estados(
	idEstado INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	estado VARCHAR(40) NOT NULL COMMENT "Nombre de la entidad federativa"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoEstandares;

CREATE TABLE dbCONOCER.CatalogoEstandares(
	idEstandar INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	descripcion VARCHAR(300) NOT NULL COMMENT "Descrioción de los estandars",
	codigo VARCHAR(10) NOT NULL COMMENT "Código de Estandar",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);

DROP TABLE IF EXISTS dbCONOCER.Prestador;

CREATE TABLE dbCONOCER.Prestador (
	idPrestador INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cedulaP VARCHAR(50) NOT NULL COMMENT "Cedula ECE/OC",
	nombreEmpresa VARCHAR(200) NOT NULL COMMENT "Nombre ECE/OC",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
)DEFAULT CHARSET=utf8 COMMENT "Empresa certificadora o Prestador";

DROP TABLE IF EXISTS dbCONOCER.Representante;

CREATE TABLE dbCONOCER.Representante (
	idRepresentante INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cedulaR VARCHAR(50) NOT NULL COMMENT "Cedula CE/EI",
	nombrePrestador VARCHAR(250) NOT NULL COMMENT "Nombre CE/EI",
	direccion VARCHAR(100) NOT NULL COMMENT "Dirección",
	colonia VARCHAR(100) NOT NULL COMMENT "Nombre de la colonia",
	codigoPostal VARCHAR(6) NOT NULL COMMENT "Código Postal",
	ciudad VARCHAR(100) NOT NULL COMMENT "Ciudad",
	email VARCHAR(100) NOT NULL COMMENT "Correo electrónico",
	telefono VARCHAR(100) NOT NULL COMMENT "Número telefónico",
	idEstado INT(5) NOT NULL COMMENT "Entidad Federativa",
	cedulaE VARCHAR(50) NOT NULL COMMENT "Cedula ECE/OC",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
)DEFAULT CHARSET=utf8 COMMENT "Representante del prestador";

DROP TABLE IF EXISTS dbCONOCER.Rel_PrestadorEmpresaCodigos;

CREATE TABLE dbCONOCER.Rel_PrestadorEmpresaCodigos (
	idRel_PrestadorEmpresaCodigos INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cedulaP VARCHAR(50) NOT NULL COMMENT "Cedula ECE/OC",
	cedulaR VARCHAR(50) NOT NULL COMMENT "Cedula CE/EI",
	codigo VARCHAR(500) NOT NULL COMMENT "Código de Estandar",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de relacion Estandar, prestador y representante";

DROP TABLE IF EXISTS dbCONOCER.Solicitante;

CREATE TABLE dbCONOCER.Solicitante (
	idSolicitante INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	solicitanteType INT(1) NOT NULL COMMENT "Identificador del tipo de Solicitante",
	nombre VARCHAR(50) COMMENT "Nombres de la persona",
	apellidoPaterno VARCHAR(20) COMMENT "Apellido paterno",
	apellidoMaterno VARCHAR(20) COMMENT "Apellido materno",
	migrante BIT NOT NULL COMMENT "Es migrante",
	certificado BIT NOT NULL COMMENT "Esta certificado",
	estandarizado BIT NOT NULL COMMENT "Esta estandarizado",
	email VARCHAR(60) COMMENT "Correo electrónico",
	telefono VARCHAR(13) COMMENT "Numero telefónico",
	nombreEmpresa VARCHAR(50) COMMENT "Nombre de la empresa",
	tipoEmpresa INT(1) COMMENT "Tipo de empresa",
	idEstado INT(2) NOT NULL COMMENT "Identificador del estado",
	medioContacto INT(1) NOT NULL COMMENT "Medio de contacto",
	fechaNacimiento TIMESTAMP COMMENT "Fecha de Nacimiento",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);

DROP TABLE IF EXISTS dbCONOCER.Solicitud;

CREATE TABLE dbCONOCER.Solicitud (
	idSolicitud INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	idSolicitante INT(10) NOT NULL COMMENT "Identificador del solicitante",
	ocupacion INT(1) COMMENT "Ocupación del Solicitante",
	escolaridad INT(1) COMMENT "Escolaridad del Solicitante",
	idEstandar INT(10) NOT NULL COMMENT "Estandar buscado",
	idEstado INT(2) NOT NULL COMMENT "Estado donde se localiza",
	idPrestador INT(10) NOT NULL COMMENT "Prestador del servicio",
	idRepresentante INT(10) NOT NULL COMMENT "Representante",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);

DROP TABLE IF EXISTS dbCONOCER.Visita;

CREATE TABLE dbCONOCER.Visita (
	idVisita INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	idSolicitud INT(10) NOT NULL COMMENT "Identificador del solicitud",
	motivo INT(2) NOT NULL COMMENT "Motivo de la visita",
	asunto VARCHAR(200) NOT NULL COMMENT "Asunto de la visita",
	dirigidoA INT(2) NOT NULL COMMENT "Dirección al que es dirigida la solicitud",
	comentarios VARCHAR(200) NOT NULL COMMENT "Comentarios de la visita",
	estatus INT(1) NOT NULL DEFAULT 1 COMMENT "Estatus de la visita",
	tiempoAtencion VARCHAR(15) NOT NULL COMMENT "Tiempo que tomo la atención",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);

USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_setCaptura`;

DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_setCaptura`(
	IN idSolicitante INT, 
	IN ocupacion INT, 
	IN escolaridad INT, 
	IN estandar VARCHAR(50), 
	IN idEstado INT, 
	IN prestador VARCHAR(50),
	IN representante VARCHAR(50),
	OUT output INT
)
BEGIN
	
    DECLARE idEstandar INT(10);
    DECLARE idPrestador INT(10);
    DECLARE idRepresentante INT(10);
    
	SELECT ce.idEstandar INTO idEstandar FROM CatalogoEstandares ce WHERE ce.codigo LIKE CONCAT('%', estandar, '%');
	SELECT p.idPrestador INTO idPrestador FROM Prestador p WHERE p.cedulaP=prestador;
    SELECT r.idRepresentante INTO idRepresentante FROM Representante r WHERE r.cedulaR=representante;
        
	INSERT INTO Solicitud (idSolicitante, ocupacion, escolaridad, idEstandar, idEstado, idPrestador, idRepresentante) 
    VALUES(idSolicitante, ocupacion, escolaridad, idEstandar, idEstado, idPrestador, idRepresentante);

    SELECT LAST_INSERT_ID() INTO output;

END$$

DELIMITER ;


USE `dbCONOCER`;
DROP procedure IF EXISTS `sp_setVisita`;

DELIMITER $$
USE `dbCONOCER`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_setVisita`(
	IN idSolicitud INT, 
	IN motivo INT, 
	IN asunto VARCHAR(200), 
	IN dirigidoA INT, 
	IN comentarios VARCHAR(200), 
	IN estatus INT,
	IN tiempoAtencion VARCHAR(15),
	OUT output INT
)
BEGIN

	INSERT INTO Visita (idSolicitud, motivo, asunto, dirigidoA, comentarios, estatus, tiempoAtencion) 
    VALUES(idSolicitud, motivo, asunto, dirigidoA, comentarios, estatus, tiempoAtencion);

    SELECT LAST_INSERT_ID() INTO output;

END$$

DELIMITER ;


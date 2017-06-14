DROP DATABASE IF EXISTS dbCONOCER;
CREATE DATABASE dbCONOCER;


CREATE USER 'conocer'@'localhost' IDENTIFIED BY '123Pormi!';
GRANT ALL PRIVILEGES ON dbCONOCER.* TO 'conocer'@'localhost';
COMMIT;

-- Tabla de Usuarios
DROP TABLE IF EXISTS dbCONOCER.User;
SELECT 'User';
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
SELECT 'Estados';
CREATE TABLE dbCONOCER.Estados(
	idEstado INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	estado VARCHAR(40) NOT NULL COMMENT "Nombre de la entidad federativa"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoEstandares;
SELECT 'CatalogoEstandares';
CREATE TABLE dbCONOCER.CatalogoEstandares(
	idEstandar INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	descripcion VARCHAR(300) NOT NULL COMMENT "Descrioción de los estandars",
	codigo VARCHAR(10) NOT NULL COMMENT "Código de Estandar",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);

DROP TABLE IF EXISTS dbCONOCER.Prestador;
SELECT 'Prestador';
CREATE TABLE dbCONOCER.Prestador (
	idPrestador INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cedulaP VARCHAR(50) NOT NULL COMMENT "Cedula ECE/OC",
	nombreEmpresa VARCHAR(200) NOT NULL COMMENT "Nombre ECE/OC",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
)DEFAULT CHARSET=utf8 COMMENT "Empresa certificadora o Prestador";

DROP TABLE IF EXISTS dbCONOCER.Representante;
SELECT 'Representante';
CREATE TABLE dbCONOCER.Representante (
	idRepresentante INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cedulaR VARCHAR(50) NOT NULL COMMENT "Cedula CE/EI",
	nombrePrestador VARCHAR(250) NOT NULL COMMENT "Nombre CE/EI",
	direccion VARCHAR(200) NOT NULL COMMENT "Dirección",
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
SELECT 'Rel_PrestadorEmpresaCodigos';
CREATE TABLE dbCONOCER.Rel_PrestadorEmpresaCodigos (
	idRel_PrestadorEmpresaCodigos INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cedulaP VARCHAR(50) NOT NULL COMMENT "Cedula ECE/OC",
	cedulaR VARCHAR(50) NOT NULL COMMENT "Cedula CE/EI",
	codigo VARCHAR(500) NOT NULL COMMENT "Código de Estandar",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
)DEFAULT CHARSET=utf8 COMMENT "Tabla de relacion Estandar, prestador y representante";

DROP TABLE IF EXISTS dbCONOCER.Solicitante;
SELECT 'Solicitante';
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
	ocupacion INT(1) COMMENT "Ocupación del Solicitante",
	escolaridad INT(1) COMMENT "Escolaridad del Solicitante",
	genero int(1) DEFAULT NULL,
  	edad int(3) DEFAULT NULL,
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);


DROP TABLE IF EXISTS dbCONOCER.Visita;
SELECT 'Visita';
CREATE TABLE dbCONOCER.Visita (
	idVisita INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	idSolicitante INT(10) NOT NULL COMMENT "Identificador del Solicitante",
	idTipoLlamada INT(2) COMMENT "Identificador del tipo de llamada",
	idCursosCapacitacion INT(2) COMMENT "Identificador de certificar cursos de capacitación",
	motivo INT(2) NOT NULL COMMENT "Motivo de la visita",
	idEstandar INT(10) NOT NULL COMMENT "Estandar buscado",
	idEstado INT(2) NOT NULL COMMENT "Estado donde se localiza",
	idPrestador INT(10) NOT NULL COMMENT "Prestador del servicio",
	idRepresentante INT(10) NOT NULL COMMENT "Representante",
	idMedioEntero INT(2) NOT NULL COMMENT "Identificador del medio por el cual se entero",
	idSecretaria INT(2) COMMENT "Identificador de la secretaria por el cual se entero",
	asunto VARCHAR(200) NOT NULL COMMENT "Asunto de la visita",
	dirigidoA INT(2) NOT NULL COMMENT "Dirección al que es dirigida la solicitud",
	comentarios VARCHAR(200) NOT NULL COMMENT "Comentarios de la visita",
	estatus INT(1) NOT NULL DEFAULT 1 COMMENT "Estatus de la visita",
	tiempoAtencion VARCHAR(15) NOT NULL COMMENT "Tiempo que tomo la atención",
	createdDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP COMMENT "Fecha de creación del registro",
	lastUpdate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT "Fecha de la última actualización"
);

-- Tabla CatalogoResolucion
DROP TABLE IF EXISTS dbCONOCER.CatalogoResolucion;
SELECT 'CatalogoResolucion';
CREATE TABLE dbCONOCER.CatalogoResolucion(
	idResolucion INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro", 
	descripcion VARCHAR(50) NOT NULL COMMENT "Descripción de Resolución."
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Catalogo de Resolución";

-- Tabla CatalogoMedioContacto
DROP TABLE IF EXISTS dbCONOCER.CatalogoRespuesta;
SELECT 'CatalogoRespuesta';
CREATE TABLE dbCONOCER.CatalogoRespuesta(
	idRespuesta INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro", 
	bitVal BIT NOT NULL COMMENT "BIT Identificador del registro", 
	descripcion VARCHAR(50) NOT NULL COMMENT "Descripción de Respuestas."
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Catalogo de Respuestas,";

-- Tabla CatalogoMedioContacto
DROP TABLE IF EXISTS dbCONOCER.CatalogoMedioContacto;
SELECT 'CatalogoMedioContacto';
CREATE TABLE dbCONOCER.CatalogoMedioContacto(
	idMedioContacto INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro", 
	descripcion VARCHAR(50) NOT NULL COMMENT "Descripción del medio de contacto."
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Catalogo del Medio de Contacto";

-- Tabla CatalogoGenero
DROP TABLE IF EXISTS dbCONOCER.CatalogoGenero;
SELECT 'CatalogoGenero';
CREATE TABLE dbCONOCER.CatalogoGenero(
	idGenero INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro", 
	descripcion VARCHAR(50) NOT NULL COMMENT "Descripción de Genero."
)DEFAULT CHARSET=utf8 COMMENT "Tabla de Catalogo de Genero";

DROP TABLE IF EXISTS dbCONOCER.CatalogoEstatus;
SELECT 'CatalogoEstatus';
CREATE TABLE dbCONOCER.CatalogoEstatus(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	estatus VARCHAR(40) NOT NULL COMMENT "nombre del estatus" 
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoMotivo;
SELECT 'CatalogoMotivo';
CREATE TABLE dbCONOCER.CatalogoMotivo(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	motivo VARCHAR(40) NOT NULL COMMENT "nombre del motivo" 
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoMedioEntero;
SELECT 'CatalogoMedioEntero';
CREATE TABLE dbCONOCER.CatalogoMedioEntero(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	medioEntero VARCHAR(40) NOT NULL COMMENT "nombre del medio por el cual se entero"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoSecretaria;
SELECT 'CatalogoSecretaria';
CREATE TABLE dbCONOCER.CatalogoSecretaria(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	secretaria VARCHAR(40) NOT NULL COMMENT "nombre de la secretaria"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoEscolaridad;
SELECT 'CatalogoEscolaridad';
CREATE TABLE dbCONOCER.CatalogoEscolaridad(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	escolaridad VARCHAR(40) NOT NULL COMMENT "nombre del grado de escolaridad"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoOcupacion;
SELECT 'CatalogoOcupacion';
CREATE TABLE dbCONOCER.CatalogoOcupacion(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	ocupacion VARCHAR(40) NOT NULL COMMENT "nombre del grado de ocupación"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoTipoEmpresa;
SELECT 'CatalogoTipoEmpresa';
CREATE TABLE dbCONOCER.CatalogoTipoEmpresa(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	tipoEmpresa VARCHAR(60) NOT NULL COMMENT "nombre de los cursos"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoCursosCapacitacion;
SELECT 'CatalogoCursosCapacitacion';
CREATE TABLE dbCONOCER.CatalogoCursosCapacitacion(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	cursosCapacitacion VARCHAR(40) NOT NULL COMMENT "nombre de los cursos"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoTipoLlamada;
SELECT 'CatalogoTipoLlamada';
CREATE TABLE dbCONOCER.CatalogoTipoLlamada(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	tipoLlamada VARCHAR(40) NOT NULL COMMENT "nombre de los cursos"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoDirigidoA;
SELECT 'CatalogoDirigidoA';
CREATE TABLE dbCONOCER.CatalogoDirigidoA(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	dirigidoA VARCHAR(100) NOT NULL COMMENT "nombre de los cursos"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoSolicitanteType;
SELECT 'CatalogoSolicitanteType';
CREATE TABLE dbCONOCER.CatalogoSolicitanteType(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	solicitanteType VARCHAR(40) NOT NULL COMMENT "nombre de los cursos"
);
DROP TABLE IF EXISTS dbCONOCER.CatalogoMedioEntero;
SELECT 'CatalogoMedioEntero';
CREATE TABLE dbCONOCER.CatalogoMedioEntero(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	medioEntero VARCHAR(20) NOT NULL COMMENT "nombre del medio por el cual se entero"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoSecretaria;
SELECT 'CatalogoSecretaria'
CREATE TABLE dbCONOCER.CatalogoSecretaria(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	secretaria VARCHAR(20) NOT NULL COMMENT "nombre de la secretaria"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoEscolaridad;
SELECT 'CatalogoEscolaridad'
CREATE TABLE dbCONOCER.CatalogoEscolaridad(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	escolaridad VARCHAR(20) NOT NULL COMMENT "nombre del grado de escolaridad"
);

DROP TABLE IF EXISTS dbCONOCER.CatalogoOcupacion;
SELECT 'CatalogoOcupacion';
CREATE TABLE dbCONOCER.CatalogoOcupacion(
	id INT(2) NOT NULL AUTO_INCREMENT PRIMARY KEY COMMENT "Identificador único del registro",
	ocupacion VARCHAR(20) NOT NULL COMMENT "nombre del grado de ocupación"
);

INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Trabajo');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Internet');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Tiene una certificación');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Secretaría de gobierno');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('No proporciona');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Amistad');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Curso');
INSERT INTO dbCONOCER.CatalogoMedioEntero(medioEntero) VALUES('Escuela');

INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('CONACYT');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('FIDE');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('FOVISSSTE');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('IMSS');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('INAES');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('INFONAVIT');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('PGR');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('Portal del empleo');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SAGARPA');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SCT');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SECRETARÍA DE ECONOMÍA');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SECRETARÍA DE ENERGÍA');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SECRETARÍA DE SALUD');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SECTOR');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SEDESOL');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SEGOB');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SEP');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SFP');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('SRE');
INSERT INTO dbCONOCER.CatalogoSecretaria(secretaria) VALUES('STPS');

INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Ninguno');
INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Primaria');
INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Secundaria');
INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Preparatoria');
INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Carrera Técnica');
INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Licenciatura');
INSERT INTO dbCONOCER.CatalogoEscolaridad(escolaridad) VALUES('Maestría / Doctorado');

INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Desempleado');
INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Empleado Sector Público');
INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Empleado Sector Privado');
INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Dueño de Empresa');
INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Profesionista Independiente');
INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Jubilado');
INSERT INTO dbCONOCER.CatalogoOcupacion(ocupacion) VALUES('Estudiante');
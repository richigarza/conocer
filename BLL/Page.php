<?php
/////////////////////////////
// BLL.User.php
// Autor: Richi Garza
// Fecha: 19-feb-2017
////////////////////////////
	class Estandar{
		private $codigo;
		private $descripcion;

		public function __construct($codigo, $descripcion){
			$this->$codigo = $codigo;
			$this->$descripcion = $descripcion;
		}

		function setCodigo($codigo){
			$this->$codigo = $codigo;
		}
		function setDescripcion($descripcion){
			$this->$descripcion = $descripcion;
		}
	}

	Class Page{

		function setVisita($array){
			$paramString = "CALL sp_setVisita(".$array["Folio"].", ".$array["ddlMotivo"].", '".$array["txtAreaAsunto"]."', ".$array["ddlDirigidoA"].", '".$array["txtAreaComentarios"]."', ".$array["rdioResolucion"].", '', @output)";
			$comand = new dbMySQL();
			$result = $comand->execSP($paramString);
			//$list = array();

			$result["query"] = $paramString;
			return $result;
		}

		function setSolicitante($array){
			$array["txtFechaNacimiento"] = $array["ddlTipoRegistro"] ==  1  ? "'".$array["txtFechaNacimiento"]."'" : "NULL";
			$paramString = "INSERT INTO Solicitante (solicitanteType, nombre, apellidoPaterno, apellidoMaterno, migrante, certificado, estandarizado, email, telefono, nombreEmpresa, tipoEmpresa, idEstado, medioContacto, fechaNacimiento) VALUES(".$array["ddlTipoRegistro"].", '".$array["txtNombres"]."', '".$array["txtApellidoP"]."', '".$array["txtApellidoM"]."', ".$array["rdioMigrante"].", ".$array["rdioCertificacion"].", ".$array["rdioEstandar"].", '".$array["txtEmail"]."', '".$array["txtTelefono"]."', '".$array["txtNombreEmpresa"]."', ".$array["ddlTipoEmpresa"].", ".$array["ddlEntidadFederativa"].", ".$array["ddlMedioContacto"].", ".$array["txtFechaNacimiento"].")";
			$comand = new dbMySQL();
			$result = $comand->insertQuery($paramString);
			//$list = array();

			$result["lol"] = $paramString;
			return $result;
		}
		
		function setSolicitud($array){
			$array["ddlOcupacion"] = $array["ddlOcupacion"] !=  NULL  ? $array["ddlOcupacion"] : "NULL";
			$array["ddlEscolaridad"] = $array["ddlEscolaridad"] !=  NULL  ? $array["ddlEscolaridad"] : "NULL";
			$paramString = "CALL sp_setCaptura(".$array["Folio"].", ".$array["ddlOcupacion"].", ".$array["ddlEscolaridad"].", '".$array["ddlEstandar"]."', '".$array["ddlEstadoEstandar"]."', '".$array["ddlPrestadorEstadoEstandar"]."', '".$array["ddlRepresentante"]."', @output)";
			$comand = new dbMySQL();
			$result = $comand->execSP($paramString);
			//$list = array();

			$result["query"] = $paramString;
			return $result;	
		}

		function getEstandares(){
			$paramString = "SELECT descripcion, codigo 
							FROM CatalogoEstandares";
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('codigo' => $value->codigo, 
								'descripcion' => utf8_encode($value->descripcion)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getEstados(){
			$paramString = "SELECT DISTINCT e.idEstado AS idEstado, e.estado AS estado FROM Estados e";

			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('idEstado' => utf8_encode($value->idEstado), 
								'estado' => utf8_encode($value->estado)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getEstadoEstandares($string){
			$paramString = "SELECT DISTINCT e.idEstado AS idEstado,  e.estado AS estado FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Representante r ON (r.cedulaR = rel.cedulaR) INNER JOIN Estados e ON (e.idEstado = r.idEstado) WHERE rel.codigo like '%".$string."%' ORDER BY e.idEstado";

			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('idEstado' => utf8_encode($value->idEstado), 
								'estado' => utf8_encode($value->estado)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getPrestadorEstadoEstandares($array){
			//print_r($array);
			$paramString = "SELECT DISTINCT p.cedulaP AS cedula, p.nombreEmpresa AS nombreEmpresa FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Prestador p ON (p.cedulaP = rel.cedulaP) INNER JOIN Representante r ON (r.cedulaR = rel.cedulaR) WHERE rel.codigo like '%".$array["estandar"]."%' AND r.idEstado='".$array["estado"]."' ORDER BY p.nombreEmpresa";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('cedula' => $value->cedula, 
								'nombreEmpresa' => utf8_encode($value->nombreEmpresa)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getRepresentantePrestadorEstadoEstandares($array){
			//print_r($array);
			$paramString = "SELECT r.cedulaR, r.nombrePrestador FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Representante r ON (r.cedulaR = rel.cedulaR) WHERE rel.cedulaP='".$array["prestador"]."' AND rel.codigo like '%".$array["estandar"]."%'";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('cedulaR' => $value->cedulaR,
								'nombrePrestador' => utf8_encode($value->nombrePrestador)
								);
			}
			$result["output"] = $list;
			return $result;
		}
		function getRepresentante($cedulaR){
			$paramString = "SELECT r.nombrePrestador, r.direccion, r.colonia, r.codigoPostal, r.ciudad, r.email, r.telefono  FROM Representante r WHERE r.cedulaR='".$cedulaR."' ";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'nombrePrestador' => utf8_encode($value->nombrePrestador),
								'direccion' => utf8_encode($value->direccion),
								'colonia' => utf8_encode($value->colonia),
								'codigoPostal' => $value->codigoPostal,
								'ciudad' => utf8_encode($value->ciudad),
								'email' => utf8_encode($value->email),
								'telefono' => $value->telefono
								);
			}
			$result["output"] = $list;
			return $result;
		}
	}
?>
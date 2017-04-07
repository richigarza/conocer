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

		function setSolicitante($array){
			//$array["txtFechaNacimiento"] = $array["ddlTipoRegistro"] ==  1  ? $array["txtFechaNacimiento"] : "NULL";
			$paramString = "INSERT INTO Solicitante (solicitanteType, nombre, apellidoPaterno, apellidoMaterno, migrante, certificado, estandarizado, email, telefono, nombreEmpresa, tipoEmpresa, idEstado, medioContacto, fechaNacimiento) VALUES(".$array["ddlTipoRegistro"].", '".$array["txtNombres"]."', '".$array["txtApellidoP"]."', '".$array["txtApellidoM"]."', ".$array["rdioMigrante"].", ".$array["rdioCertificacion"].", ".$array["rdioEstandar"].", '".$array["txtEmail"]."', '".$array["txtTelefono"]."', '".$array["txtNombreEmpresa"]."', ".$array["ddlTipoEmpresa"].", ".$array["ddlEntidadFederativa"].", ".$array["ddlMedioContacto"].", '".$array["txtFechaNacimiento"]."')";
			$comand = new dbMySQL();
			$result = $comand->insertQuery($paramString);
			//$list = array();

			$result["lol"] = $paramString;
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
								'descripcion' => ($value->descripcion)
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
				$list[] = array('idEstado' => ($value->idEstado), 
								'estado' => ($value->estado)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getEstadoEstandares($string){
			$paramString = "SELECT DISTINCT e.idEstado AS idEstado,  e.estado AS estado FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Prestador p ON (p.cedulaP = rel.cedulaP) INNER JOIN Estados e ON (e.idEstado = p.idEstado) WHERE rel.codigo like '%".$string."%' ORDER BY e.idEstado";

			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('idEstado' => ($value->idEstado), 
								'estado' => ($value->estado)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getPrestadorEstadoEstandares($array){
			//print_r($array);
			$paramString = "SELECT DISTINCT ec.cedulaE AS cedula, ec.nombreEmpresa AS nombreEmpresa FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Prestador p ON (p.cedulaP = rel.cedulaP) INNER JOIN EmpresaCertificadora ec ON (ec.cedulaE = rel.cedulaE) WHERE rel.codigo like '%".$array["estandar"]."%' AND p.idEstado='".$array["estado"]."' ORDER BY ec.nombreEmpresa";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('cedula' => $value->cedula, 
								'nombreEmpresa' => ($value->nombreEmpresa)
								);
			}
			$result["output"] = $list;
			return $result;
		}

		function getRepresentantePrestadorEstadoEstandares($array){
			//print_r($array);
			$paramString = "SELECT p.cedulaP, p.nombrePrestador FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Prestador p ON (p.cedulaP = rel.cedulaP) WHERE rel.cedulaE='".$array["prestador"]."' AND rel.codigo like '%".$array["estandar"]."%'";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('cedulaP' => $value->cedulaP,
								'nombrePrestador' => ($value->nombrePrestador)
								);
			}
			$result["output"] = $list;
			return $result;
		}
		function getRepresentante($cedulaP){
			$paramString = "SELECT p.nombrePrestador, p.direccion, p.colonia, p.codigoPostal, p.ciudad, p.email, p.telefono  FROM Prestador p WHERE p.cedulaP='".$cedulaP."' ";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'nombrePrestador' => ($value->nombrePrestador),
								'direccion' => ($value->direccion),
								'colonia' => ($value->colonia),
								'codigoPostal' => $value->codigoPostal,
								'ciudad' => ($value->ciudad),
								'email' => ($value->email),
								'telefono' => $value->telefono
								);
			}
			$result["output"] = $list;
			return $result;
		}
	}
?>
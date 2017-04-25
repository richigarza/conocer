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

		function getSolicitantePorId($id){
			$paramString = "SELECT * FROM Solicitante WHERE idSolicitante='".$id."'";
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'txtFolio' => $value->idSolicitante,
								'ddlTipoRegistro' => $value->solicitanteType,
								'txtNombres' => utf8_encode($value->nombre), 
								'txtApellidoP' => utf8_encode($value->apellidoPaterno),
								'txtApellidoM' => utf8_encode($value->apellidoMaterno),
								'txtNombreEmpresa' => utf8_encode($value->nombreEmpresa),
								'txtEmail' => utf8_encode($value->email),
								'txtTelefono' => utf8_encode($value->telefono),
								'rdioMigrante' => utf8_encode($value->migrante),
								'rdioCertificacion' => utf8_encode($value->certificado),
								'rdioEstandar' => utf8_encode($value->estandarizado),
								'ddlTipoEmpresa' => utf8_encode($value->tipoEmpresa),
								'ddlEntidadFederativa' => utf8_encode($value->idEstado),
								'ddlMedioContacto' => utf8_encode($value->medioContacto),
								'txtFechaNacimiento' => utf8_encode($value->fechaNacimiento),
								'ddlOcupacion' => utf8_encode($value->ocupacion),
								'ddlEscolaridad' => utf8_encode($value->escolaridad)
								);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}

		function getBusquedaVisitasPorIdSolicitante($idSolicitante){
			$paramString = "SELECT * FROM Visita WHERE idSolicitante='".$idSolicitante."'";
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'idVisita' => utf8_encode($value->escolaridad),
								'motivo' => utf8_encode($value->escolaridad),
								'idEstandar' => utf8_encode($value->escolaridad),
								'idEstado' => utf8_encode($value->escolaridad),
								'idPrestador' => utf8_encode($value->escolaridad),
								'idRepresentante' => utf8_encode($value->escolaridad),
								'asunto' => utf8_encode($value->escolaridad),
								'dirigidoA' => utf8_encode($value->escolaridad),
								'comentarios' => utf8_encode($value->escolaridad),
								'estatus' => utf8_encode($value->escolaridad),
								'tiempoAtencion' => utf8_encode($value->escolaridad),
								'createdDate' => utf8_encode($value->escolaridad),
								'lastUpdate' => utf8_encode($value->escolaridad)
								);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}

		function getBusqueda($str){
			//idSolicitante LIKE '%".$str."%' OR nombre LIKE '%".$str."%' OR apellidoPaterno LIKE '%".$str."%' OR apellidoMaterno LIKE '%".$str."%' OR nombreEmpresa LIKE '%".$str."%' OR
			$paramString = "SELECT * FROM Solicitante WHERE  email LIKE '%".$str."%' OR telefono LIKE '%".$str."%'";
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'idSolicitante' => $value->idSolicitante,
								'solicitanteType' => $value->solicitanteType,
								'nombre' => utf8_encode($value->nombre), 
								'apellidoPaterno' => utf8_encode($value->apellidoPaterno),
								'apellidoMaterno' => utf8_encode($value->apellidoMaterno),
								'nombreEmpresa' => utf8_encode($value->nombreEmpresa),
								'email' => utf8_encode($value->email),
								'telefono' => utf8_encode($value->telefono)
								);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}

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
			$array["ddlEscolaridad"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlEscolaridad"] : 0;
			$array["ddlOcupacion"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlOcupacion"] : 0;
			$paramString = "INSERT INTO Solicitante (solicitanteType, nombre, apellidoPaterno, apellidoMaterno, migrante, certificado, estandarizado, email, telefono, nombreEmpresa, tipoEmpresa, idEstado, medioContacto, fechaNacimiento, escolaridad, ocupacion) VALUES(".$array["ddlTipoRegistro"].", '".$array["txtNombres"]."', '".$array["txtApellidoP"]."', '".$array["txtApellidoM"]."', ".$array["rdioMigrante"].", ".$array["rdioCertificacion"].", ".$array["rdioEstandar"].", '".$array["txtEmail"]."', '".$array["txtTelefono"]."', '".$array["txtNombreEmpresa"]."', ".$array["ddlTipoEmpresa"].", ".$array["ddlEntidadFederativa"].", ".$array["ddlMedioContacto"].", ".$array["txtFechaNacimiento"].", ".$array["ddlEscolaridad"].", ".$array["ddlOcupacion"].")";
			$comand = new dbMySQL();
			$result = $comand->insertQuery($paramString);
			//$list = array();

			$result["lol"] = $paramString;
			return $result;
		}

		function updateSolicitante($array){
			$array["txtFechaNacimiento"] = $array["ddlTipoRegistro"] ==  1  ? "'".$array["txtFechaNacimiento"]."'" : "NULL";
			$array["ddlEscolaridad"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlEscolaridad"] : 0;
			$array["ddlOcupacion"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlOcupacion"] : 0;
			$paramString = "UPDATE Solicitante SET solicitanteType=".$array["ddlTipoRegistro"].", nombre='".$array["txtNombres"]."', apellidoPaterno='".$array["txtApellidoP"]."', apellidoMaterno='".$array["txtApellidoM"]."', migrante=".$array["rdioMigrante"].", certificado=".$array["rdioCertificacion"].", estandarizado=".$array["rdioEstandar"].", email='".$array["txtEmail"]."', telefono='".$array["txtTelefono"]."', nombreEmpresa='".$array["txtNombreEmpresa"]."', tipoEmpresa=".$array["ddlTipoEmpresa"].", idEstado=".$array["ddlEntidadFederativa"].", medioContacto=".$array["ddlMedioContacto"].", fechaNacimiento=".$array["txtFechaNacimiento"].", escolaridad=".$array["ddlEscolaridad"].", ocupacion=".$array["ddlOcupacion"]." WHERE idSolicitante=".$array["txtFolio"];
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
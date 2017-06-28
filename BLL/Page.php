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
								'txtNombres' => ($value->nombre), 
								'txtApellidoP' => ($value->apellidoPaterno),
								'txtApellidoM' => ($value->apellidoMaterno),
								'txtNombreEmpresa' => ($value->nombreEmpresa),
								'txtEmail' => ($value->email),
								'txtTelefono' => ($value->telefono),
								'rdioMigrante' => ($value->migrante),
								'rdioCertificacion' => ($value->certificado),
								'rdioEstandar' => ($value->estandarizado),
								'ddlTipoEmpresa' => ($value->tipoEmpresa),
								'ddlEntidadFederativa' => ($value->idEstado),
								'ddlMedioContacto' => ($value->medioContacto),
								'txtFechaNacimiento' => ($value->fechaNacimiento),
								'txtEdad' => $value->edad,
								'ddlOcupacion' => ($value->ocupacion),
								'ddlEscolaridad' => ($value->escolaridad),
								'ddlGenero' => ($value->genero)
								);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}

        function getVisitaPorId($id){
			$paramString="SELECT v.idSolicitante AS idSolicitante, v.idVisita AS idVisita, v.motivo AS motivo, ce.codigo AS Estandar, v.idEstado AS idEstado, p.cedulaP AS Prestador, r.cedulaR AS Representante, v.asunto AS asunto, v.dirigidoA AS dirigidoA, v.comentarios AS comentarios, v.estatus AS estatus, v.tiempoAtencion, v.createdDate AS createdDate, v.lastUpdate AS lastUpdate FROM Visita v  INNER JOIN CatalogoEstandares ce ON (ce.idEstandar = v.idEstandar) INNER JOIN Prestador p ON (p.idPrestador = v.idPrestador) INNER JOIN Representante r ON (r.idRepresentante = v.idRepresentante) WHERE idVisita=".$id;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'txtFolio3' => $value->idSolicitante,
				                'idVisita' => $value->idVisita,
				                'ddlTipoLlamada' => $value->idTipoLlamada,
				                'ddlCurso' => $value->idCursosCapacitacion,
				                'ddlMotivo' => $value->motivo,
				                'ddlEstandar' => $value->Estandar,//
				                'ddlEstadoEstandar' => $value->idEstado,
				                'ddlPrestadorEstadoEstandar' => $value->Prestador,//
				                'ddlRepresentante' => $value->Representante,//
				                'ddlMedio' => $value->idMedioEntero,
				                'ddlSecretaria' => $value->idSecretaria,
				                'txtAreaAsunto' => ($value->asunto),
				                'ddlDirigidoA' => $value->dirigidoA,
				                'txtAreaComentarios' => ($value->comentarios),
				                'rdioResolucion' => ($value->estatus),
				                'tiempoAtencion' => ($value->tiempoAtencion),
				                'createdDate' => ($value->createdDate),
				                'lastUpdate' => ($value->lastUpdate)
				                );
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
        }

		function getBusquedaVisitasPorIdSolicitante($idSolicitante){
			$paramString = "CALL sp_getVisitaPorIdSolicitante(".$idSolicitante.")";
			//"SELECT * FROM Visita v INNER JOIN CatalogoEstatus ce ON (ce.id = v.estatus) WHERE idSolicitante='".$idSolicitante."'";
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
								'idVisita' => $value->idVisita,
								'motivo' => $value->motivo,
								'idEstandar' => $value->idEstandar,
								'idEstado' => $value->idEstado,
								'idPrestador' => $value->idPrestador,
								'idRepresentante' => $value->idRepresentante,
								'asunto' => ($value->asunto),
								'dirigidoA' => $value->dirigidoA,
								'comentarios' => ($value->comentarios),
								'estatus' => ($value->estatus),
								'tiempoAtencion' => ($value->tiempoAtencion),
								'createdDate' => ($value->createdDate),
								'lastUpdate' => ($value->lastUpdate)
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
								'nombre' => ($value->nombre), 
								'apellidoPaterno' => ($value->apellidoPaterno),
								'apellidoMaterno' => ($value->apellidoMaterno),
								'nombreEmpresa' => ($value->nombreEmpresa),
								'email' => ($value->email),
								'telefono' => ($value->telefono)
								);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}
		function setVisita($array){
			$array["ddlTipoLlamada"] = $array["ddlTipoLlamada"]==NULL ? '0' : $array["ddlTipoLlamada"];
			$array["ddlCurso"] = $array["ddlCurso"]==NULL ? '0' : $array["ddlCurso"];
			$array["ddlMotivo"] = $array["ddlMotivo"]==NULL ? '0' : $array["ddlMotivo"];
			$array["ddlSecretaria"] = $array["ddlSecretaria"]==NULL ? '0' : $array["ddlSecretaria"];
			$array["txtAreaAsunto"] = $array["txtAreaAsunto"]==NULL ? '' : $array["txtAreaAsunto"];
			$array["ddlDirigidoA"] = $array["ddlDirigidoA"]=NULL ? '0' : $array["ddlDirigidoA"];

			$paramString = "CALL sp_setVisita(".$array["idVisita"].",".$array["Folio"].", ".$array["ddlTipoLlamada"].", ".$array["ddlCurso"].", ".$array["ddlMotivo"].", '".$array["ddlEstandar"]."', '".$array["ddlEstadoEstandar"]."', '".$array["ddlPrestadorEstadoEstandar"]."', '".$array["ddlRepresentante"]."', ".$array["ddlMedio"].", ".$array["ddlSecretaria"].", '".$array["txtAreaAsunto"]."', ".$array["ddlDirigidoA"].", '".$array["txtAreaComentarios"]."', ".$array["rdioResolucion"].", '', '".$array["Pantalla"]."',@output)";
			//$paramString = "INSERT INTO Visita (idSolicitante, motivo, idEstandar, idEstado, idPrestador, idRepresentante, asunto, dirigidoA, comentarios, estatus, tiempoAtencion) VALUES(".$array["Folio"].", ".$array["ddlMotivo"].", '".$array["ddlEstandar"]."', '".$array["ddlEstadoEstandar"]."', '".$array["ddlPrestadorEstadoEstandar"]."', '".$array["ddlRepresentante"]."', '".$array["txtAreaAsunto"]."', ".$array["ddlDirigidoA"].", '".$array["txtAreaComentarios"]."', ".$array["rdioResolucion"].", '')";
			$comand = new dbMySQL();
			$result = $comand->execSP($paramString);
			//$result = $comand->insertQuery($paramString);
			//$list = array();
			$result["query"] = $paramString;
			return $result;
		}
		function setSolicitante($array){
			$array["txtFechaNacimiento"] = $array["ddlTipoRegistro"] ==  1  ? "'".$array["txtFechaNacimiento"]."'" : "NULL";
			$array["txtFechaNacimiento"] = $array["txtFechaNacimiento"] == "" ? "NULL" : $array["txtFechaNacimiento"];
			$array["txtFechaNacimiento"] = $array["txtFechaNacimiento"] == "''" ? "NULL" : $array["txtFechaNacimiento"];
			$array["ddlEscolaridad"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlEscolaridad"] : 0;
			$array["ddlOcupacion"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlOcupacion"] : 0;
            $array["txtEdad"] = $array["txtEdad"]==NULL ? 0 : $array["txtEdad"];
            $array["txtEdad"] = $array["txtEdad"]=='' ? 0 : $array["txtEdad"];
			$paramString = "INSERT INTO Solicitante (solicitanteType, nombre, apellidoPaterno, apellidoMaterno, migrante, certificado, estandarizado, email, telefono, nombreEmpresa, tipoEmpresa, idEstado, medioContacto, fechaNacimiento, edad, escolaridad, ocupacion, genero) VALUES(".$array["ddlTipoRegistro"].", '".$array["txtNombres"]."', '".$array["txtApellidoP"]."', '".$array["txtApellidoM"]."', ".$array["rdioMigrante"].", ".$array["rdioCertificacion"].", ".$array["rdioEstandar"].", '".$array["txtEmail"]."', '".$array["txtTelefono"]."', '".$array["txtNombreEmpresa"]."', ".$array["ddlTipoEmpresa"].", ".$array["ddlEntidadFederativa"].", ".$array["ddlMedioContacto"].", ".$array["txtFechaNacimiento"].", ".$array["txtEdad"].", ".$array["ddlEscolaridad"].", ".$array["ddlOcupacion"].", ".$array["ddlGenero"].")";
			$comand = new dbMySQL();
			$result = $comand->insertQuery($paramString);
			//$list = array();
			$result["query"] = $paramString;
			return $result;
		}
		function updateSolicitante($array){
			$array["txtFechaNacimiento"] = $array["ddlTipoRegistro"] ==  1  ? "'".$array["txtFechaNacimiento"]."'" : "NULL";
			$array["ddlEscolaridad"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlEscolaridad"] : 0;
			$array["ddlOcupacion"] = $array["ddlTipoRegistro"] ==  1  ? $array["ddlOcupacion"] : 0;
            $array["txtEdad"] = $array["txtEdad"]==NULL ? 0 : $array["txtEdad"];
            $array["txtEdad"] = $array["txtEdad"]=='' ? 0 : $array["txtEdad"];
			$paramString = "UPDATE Solicitante SET solicitanteType=".$array["ddlTipoRegistro"].", nombre='".$array["txtNombres"]."', apellidoPaterno='".$array["txtApellidoP"]."', apellidoMaterno='".$array["txtApellidoM"]."', migrante=".$array["rdioMigrante"].", certificado=".$array["rdioCertificacion"].", estandarizado=".$array["rdioEstandar"].", email='".$array["txtEmail"]."', telefono='".$array["txtTelefono"]."', nombreEmpresa='".$array["txtNombreEmpresa"]."', tipoEmpresa=".$array["ddlTipoEmpresa"].", idEstado=".$array["ddlEntidadFederativa"].", medioContacto=".$array["ddlMedioContacto"].", fechaNacimiento=".$array["txtFechaNacimiento"].", escolaridad=".$array["ddlEscolaridad"].", ocupacion=".$array["ddlOcupacion"]." WHERE idSolicitante=".$array["txtFolio"];
			$comand = new dbMySQL();
			$result = $comand->insertQuery($paramString);
			//$list = array();
			$result["folio"] = $array["txtFolio"];
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
								'descripcion' => ($value->descripcion)
								);
			}
			$result["output"] = $list;
			return $result;
		}
		function getEstados(){
			$paramString = "CALL sp_getEstados()";//"SELECT DISTINCT e.idEstado AS idEstado, e.estado AS estado FROM Estados e";
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
			$paramString = "SELECT DISTINCT e.idEstado AS idEstado,  e.estado AS estado FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Representante r ON (r.cedulaR = rel.cedulaR) INNER JOIN Estados e ON (e.idEstado = r.idEstado) WHERE rel.codigo like '%".$string."%' ORDER BY e.idEstado";
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
			$paramString = "SELECT DISTINCT p.cedulaP AS cedula, p.nombreEmpresa AS nombreEmpresa FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Prestador p ON (p.cedulaP = rel.cedulaP) INNER JOIN Representante r ON (r.cedulaR = rel.cedulaR) WHERE rel.codigo like '%".$array["estandar"]."%' AND r.idEstado='".$array["estado"]."' ORDER BY p.nombreEmpresa";
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
			$paramString = "SELECT r.cedulaR, r.nombrePrestador FROM Rel_PrestadorEmpresaCodigos rel INNER JOIN Representante r ON (r.cedulaR = rel.cedulaR) WHERE rel.cedulaP='".$array["prestador"]."' AND rel.codigo like '%".$array["estandar"]."%'";
			//echo $paramString;
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			$list = array();
			foreach ($result["output"] as $value) {
				$list[] = array('cedulaR' => $value->cedulaR,
								'nombrePrestador' => ($value->nombrePrestador)
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
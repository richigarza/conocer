<?php
/////////////////////////////
// BLL.Page.php
// Autor: Richi Garza
// Fecha: 05-Jun-2017
////////////////////////////

	class Reporte {

		function getReporte($array){
			$paramString = "CALL sp_getReporte";
							// ."WHERE "
							// 	."CASE "
							// 		."WHEN '".$array["tipoFecha"]."'='exacta' "
							// 			."THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' "
							// 		."WHEN '".$array["tipoFecha"]."'='rango' "
							// 			."THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') "
							// 		."ELSE 1=1 "
							// 	."END";*/
			$comand = new dbMySQL();
			$result = $comand->executeQuery($paramString);
			 $list = array();
			foreach ($result["output"] as $value) {
				$list[] = array(
					'idSolicitante' => ($value->idSolicitante),
					'solicitanteType' => ($value->solicitanteType),
					'nombre' => ($value->nombre),
					// 'apellidoPaterno' => ($value->apellidoPaterno),
					// 'apellidoMaterno' => ($value->apellidoMaterno),
					//'bitMigrante' => ($value->bitMigrante),
					'migrante' => ($value->migrante),
					//'bitCertificado' => ($value->bitCertificado),
					'certificado' => ($value->certificado),
					//'bitEstandarizado' => ($value->bitEstandarizado),
					'estandarizado' => ($value->estandarizado),
					'email' => ($value->email),
					'telefono' => ($value->telefono),
					// 'nombreEmpresa' => ($value->nombreEmpresa),
					//'idTipoEmpresa' => ($value->idTipoEmpresa),
					'tipoEmpresa' => ($value->tipoEmpresa),
					//'idEstado' => ($value->idEstado),
					//'estadoSolicitante' => ($value->estado),
					//'idMedioContacto' => ($value->idMedioContacto),
					//'medioContacto' => ($value->medioContacto),
					'fechaNacimiento' => ($value->fechaNacimiento),
					//'idOcupacion' => ($value->idOcupacion),
					'ocupacion' => ($value->ocupacion),
					//'idEscolaridad' => ($value->idEscolaridad),
					'escolaridad' => ($value->escolaridad),
					//'idGenero' => ($value->idGenero),
					'genero' => ($value->genero),
					'edad' => ($value->edad),
					'fechaAlta' => ($value->createdDate),
					'idVisita' => ($value->idVisita),
					//'idTipoLlamada' => ($value->idTipoLlamada),
					'tipoLlamada' => ($value->tipoLlamada),
					//'idCursosCapacitacion' => ($value->idCursosCapacitacion),
					'cursosCapacitacion' => ($value->cursosCapacitacion),
					//'idMotivo' => ($value->idMotivo),
					'motivo' => ($value->motivo),
					//'idEstandar' => ($value->idEstandar),
					//'estandar' => ($value->estandar),
					//'idEstadoVisita' => ($value->idEstadoVisita),
					// 'estadoVisita' => ($value->estadoVisita),
					//'idPrestador' => ($value->idPrestador),
					'cedulaP' => ($value->cedulaP),
					//'nombreEmpresa' => ($value->nombreEmpresa),
					//'idRepresentante' => ($value->idRepresentante),
					'cedulaR' => ($value->cedulaR),
					'nombrePrestador' => ($value->nombrePrestador),
					//'idMedioEntero' => ($value->idMedioEntero),
					'medioEntero' => ($value->medioEntero),
					//'idSecretaria' => ($value->idSecretaria),
					'secretaria' => ($value->secretaria),
					'asunto' => ($value->asunto),
					//'idDirigidoA' => ($value->idDirigidoA),
					'dirigidoA' => ($value->dirigidoA),
					'comentarios' => ($value->comentarios),
					//'idEstatus' => ($value->idEstatus),
					'estatus' => ($value->estatus),
					'fechaVisita' => ($value->fechaVisita)
				);
			}
			$result["output"] = $list;
			$result["query"] = $paramString;
			return $result;
		}
	}

?>


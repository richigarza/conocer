<?php
/////////////////////////////
// BLL.Graficas.php
// Autor: Richi Garza
// Fecha: 29-May-2017
////////////////////////////

Class Graficas{

	function getAllGraficas($array){
		$result["estado"] = $this->getGraficaEstado($array);
		$result["medio"] = $this->getGraficaMedio($array);
		$result["estatus"] = $this->getGraficaEstatus($array);
		$result["estandar"] = $this->getGraficaEstandar($array);
		$result["migrante"] = $this->getGraficaMigrante($array);
		$result["genero"] = $this->getGraficaGenero($array);
		$result["success"] = true;
		return $result;
	}

	function getGraficaEstado($array){
		$paramString = "SELECT e.estado AS estado, SUM(1) AS numero FROM Solicitante s INNER JOIN Estados e ON (e.idEstado = s.idEstado) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY e.estado";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->estado),
				'y' => (int)$value->numero,
				'drilldown' => ($value->estado),

			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getGraficaMedio($array){
		$paramString = "SELECT cmc.descripcion AS medioContacto, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoMedioContacto cmc ON (cmc.idMedioContacto = s.medioContacto) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cmc.descripcion";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->medioContacto),
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getGraficaEstatus($array){
		$paramString = "SELECT cr.descripcion AS estatus, SUM(1) AS numero FROM Visita v INNER JOIN CatalogoResolucion cr ON (cr.idResolucion = v.estatus) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(v.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(v.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(v.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cr.descripcion";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->estatus),
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getGraficaEstandar($array){
		$paramString = "SELECT cr.descripcion AS idEstandar, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoRespuesta cr ON (cr.bitVal = s.estandarizado) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cr.descripcion";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => $value->idEstandar,
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getGraficaMigrante($array){
		$paramString = "SELECT cr.descripcion AS migrante, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoRespuesta cr ON (cr.bitVal = s.migrante) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cr.descripcion";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => $value->migrante,
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getGraficaGenero($array){
		$paramString = "SELECT cg.descripcion AS genero, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoGenero cg ON (cg.idGenero = s.genero) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cg.descripcion";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => $value->genero,
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	// Funcion de Ejemplo
	function getGrafica(){
		$paramString = "";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => $value->idEstado,
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}
}

?>

<?php
/////////////////////////////
// BLL.Graficas.php
// Autor: Richi Garza
// Fecha: 29-May-2017
////////////////////////////

Class Graficas{

	function getAllGraficas($array){
		$result["estado"] = $this->getGraficaEstado();
		$result["medio"] = $this->getGraficaMedio($array);
		$result["estatus"] = $this->getGraficaEstatus();
		$result["estandar"] = $this->getGraficaEstandar();
		$result["migrante"] = $this->getGraficaMigrante();
		$result["genero"] = $this->getGraficaGenero();
		$result["success"] = true;
		return $result;
	}

	function getGraficaEstado(){
		$paramString = "SELECT e.estado AS estado, SUM(1) AS numero FROM Solicitante s INNER JOIN Estados e ON (e.idEstado = s.idEstado) GROUP BY e.estado";
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
		$paramString = "SELECT cmc.descripcion AS medioContacto, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoMedioContacto cmc ON (cmc.idMedioContacto = s.medioContacto) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacto' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cmc.descripcion";
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

	function getGraficaEstatus(){
		$paramString = "SELECT cr.descripcion AS estatus, SUM(1) AS numero FROM Visita v INNER JOIN CatalogoResolucion cr ON (cr.idResolucion = v.estatus) GROUP BY cr.descripcion";
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

	function getGraficaEstandar(){
		$paramString = "SELECT cr.descripcion AS idEstandar, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoRespuesta cr ON (cr.bitVal = s.estandarizado) GROUP BY cr.descripcion";
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

	function getGraficaMigrante(){
		$paramString = "SELECT cr.descripcion AS migrante, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoRespuesta cr ON (cr.bitVal = s.migrante) GROUP BY cr.descripcion";
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

	function getGraficaGenero(){
		$paramString = "SELECT cg.descripcion AS genero, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoGenero cg ON (cg.idGenero = s.genero) GROUP BY cg.descripcion";
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

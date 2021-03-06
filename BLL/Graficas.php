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
		$result["medioEntero"] = $this->getMedioEntero($array);
    	$result["secretaria"] = $this->getSecretaria($array);
	    $result["escolaridad"] = $this->getEscolaridad($array);
	    $result["ocupacion"] = $this->getOcupacion($array);
		$result["edad"] = $this->getEdad($array);
		$result["solicitanteType"] = $this->getTipoSolicitante($array);
		$result["estandares"] = $this->getEstandares($array);
		$result["temas"] = $this->getTemas($array);
		$result["success"] = true;
		return $result;
	}
	
	function getTemas($array){
		$paramString = "SELECT ct.temas AS temas, SUM(1) AS numero FROM Visita v INNER JOIN CatalogoTemas ct ON (ct.id = v.dirigidoA) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(v.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(v.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(v.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY ce.codigo";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->temas. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->temas),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}
	
	function getEstandares($array){
		$paramString = "SELECT ce.codigo AS estandar, SUM(1) AS numero FROM Visita v INNER JOIN CatalogoEstandares ce ON (ce.idEstandar = v.idEstandar) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(v.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(v.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(v.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY ce.codigo";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->estandar. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->estandar),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getTipoSolicitante($array){
		$paramString = "SELECT cst.solicitanteType AS solicitanteType, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoSolicitanteType cst ON (cst.id = s.solicitanteType) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cst.solicitanteType";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->solicitanteType. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->solicitanteType),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getMedioEntero($array){
		$paramString = "SELECT cme.medioEntero AS medioEntero, SUM(1) AS numero FROM Visita v INNER JOIN CatalogoMedioEntero cme ON (cme.id = v.idMedioEntero) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(v.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(v.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(v.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cme.medioEntero";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->medioEntero. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->medioEntero),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getSecretaria($array){
		$paramString = "SELECT cs.secretaria AS secretaria, SUM(1) AS numero FROM Visita v INNER JOIN CatalogoSecretaria cs ON (cs.id = v.idSecretaria) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(v.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(v.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(v.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cs.secretaria";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->secretaria. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->secretaria),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getEscolaridad($array){
		$paramString = "SELECT ce.escolaridad AS escolaridad, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoEscolaridad ce ON (ce.id = s.escolaridad) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY ce.escolaridad";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->escolaridad),
				'y' => (int)$value->numero,
				'drilldown' => ($value->escolaridad),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getOcupacion($array){
		$paramString = "SELECT co.ocupacion AS ocupacion, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoOcupacion co ON (co.id = s.ocupacion) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY co.ocupacion";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->ocupacion. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->ocupacion),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getEdad($array){
		$paramString = "SELECT s.edad AS edad, SUM(1) AS numero FROM Solicitante s WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY s.edad";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->edad. " años (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->edad),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}

	function getGraficaEstado($array){
		$paramString = "SELECT e.estado AS estado, SUM(1) AS numero FROM Solicitante s INNER JOIN Estados e ON (e.idEstado = s.idEstado) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY e.estado";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->estado. " (".$value->numero.")"),
				'y' => (int)$value->numero,
				'drilldown' => ($value->estado),
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}
	function getGraficaMedio($array){
		$paramString = "SELECT cmc.medioContacto AS medioContacto, SUM(1) AS numero FROM Solicitante s INNER JOIN CatalogoMedioContacto cmc ON (cmc.idMedioContacto = s.medioContacto) WHERE CASE WHEN '".$array["tipoFecha"]."'='exacta' THEN DATE(s.createdDate) = '".$array["txtFechaExacta"]."' WHEN '".$array["tipoFecha"]."'='rango' THEN (DATE(s.createdDate) >= '".$array["txtFechaInicial"]."' AND DATE(s.createdDate) <= '".$array["txtFechaFinal"]."') ELSE 1=1 END GROUP BY cmc.medioContacto";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($paramString);
		$list = array();
		foreach ($result["output"] as $value) {
			$list[] = array(
				'name' => ($value->medioContacto. " (".$value->numero.")"),
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
				'name' => ($value->estatus. " (".$value->numero.")"),
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
				'name' => $value->idEstandar. " (".$value->numero.")",
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
				'name' => $value->migrante. " (".$value->numero.")",
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
				'name' => $value->genero. " (".$value->numero.")",
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
				'name' => $value->idEstado. " (".$value->numero.")",
				'y' => (int)$value->numero
			);
		}
		$result["output"] = $list;
		$result["query"] = $paramString;
		return $result;
	}
}

?>

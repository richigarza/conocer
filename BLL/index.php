<?php
/////////////////////////////
// index.php
// Autor: Richi Garza
// Fecha: 09-feb-2017
////////////////////////////
	header('Content-type: application/json; charset=utf-8');
	require('../DTO/User.php');
	require("../BLL/Page.php");
	require("../BLL/User.php");
	require("../DAO/mysql.php");

	function test(){
		return true;
	} 

	function main(){
		$result = array();
		$fn = $_GET["fn"];
		switch($fn){
			case "newUser":
				//$User = new BLLUser();				
				//$result["success"] = $User->createUser($user);
			break;
			case "login":
				$User = new BLLUser();				
				$result = $User->login($_POST);
			break;
			case "registrar":
				//less 						$result = 
				$page = new Page();
				$result = $page->setSolicitante($_POST);
				date_default_timezone_set("America/Monterrey");
				$result["date"] = date("d/m/Y"); 
				$result["hour"] = date("h:i:s a");  
				$result["success"] = true;
			break;
			case "capturar":
				$result["success"] = true;
			break;
			case "getEstandares":
				$page = new Page();
				$result = $page->getEstandares();
			break;
			case "getEstados":
				$page = new Page();
				$result = $page->getEstados();
			break;
			case "getEstadoEstandares":
				$page = new Page();
				$result = $page->getEstadoEstandares($_POST["estandar"]);
			break;
			case "getPrestadorEstadoEstandares":
				$page = new Page();
				$result = $page->getPrestadorEstadoEstandares($_POST);
			break;
			case "getRepresentantePrestadorEstadoEstandares":
				$page = new Page();
				$result = $page->getRepresentantePrestadorEstadoEstandares($_POST);
			break;
			case "getRepresentante":
				$page = new Page();
				$result = $page->getRepresentante($_POST["cedulaP"]);
			break;
			default:
				$result["success"] = false;
		}
		echo json_encode($result);

	}
	main();
	exit();
?>
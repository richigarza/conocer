<?php
/////////////////////////////
// BLL.User.php
// Autor: Richi Garza
// Fecha: 09-feb-2017
////////////////////////////

Class BLLUser{
	function editUser(){

	}

	function createUser($user){		
		// Generamos el ParamsString
		$ParamsString = "CALL sp_newUser( '". $user->getFirstName() ."', 
								'". $user->getLastName() ."',
								'". $user->getUserName() ."', 
								'". $user->getEmail() ."', 
								'". $user->getLocation() ."', 
								'". $user->getUserType() ."'
								)";
		
		// Hacemos los llamadaos a la base de datos
		$comand = new dbMySQL();	
		$comand->execSP($ParamsString);
	}

	function login($params){
		$user = new User();
		$user->setUserName($params["user"]);
		$user->setPassword($params["password"]);

		$ParamsString = "SELECT userName FROM User WHERE userName='". $user->getUserName() ."' AND password='". $user->getPassword() ."'";

		//"CALL sp_newUser( '". $user->getUserName() ."', '". $user->getPassword() ."')";
		$comand = new dbMySQL();
		$result = $comand->executeQuery($ParamsString);

		if ($result["success"] == true) {
			if (sizeof($result["output"]) == 0) {
				$result["success"] = false;
			}
		}
		return $result;
	}
}
?>
<?php
/////////////////////////////
// User.php
// Autor: Richi Garza
// Fecha: 09-feb-2017
////////////////////////////
	class User {
		private $idUser;
		private $firstName;
		private $lastName;
		private $userName;
		private $password;
		private $email;
		private $location;
		private $userType;
		private $createdDate;
		private $lastUpdate;

		public function __construct(){
		}

		public function getUserName(){
			return $this->userName;
		}

		public function setUserName($userName){
			$this->userName = $userName;
		}

		public function getFirstName(){
			return $this->firstName;
		}

		public function getLastName(){
			return $this->lastName;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($password){
			$this->password = $password;
		}

		public function getEmail(){
			return $this->email;
		}

		public function getLocation(){
			return $this->location;
		}

		public function getUserType(){
			return $this->userType;
		}

		public function getCreatedDate(){
			return $this->createdDate;
		}

		public function getLastUpdate(){
			return $this->lastUpdate;
		}
	}
?>
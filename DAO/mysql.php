<?php	
	Class dbMySQL {
		private $host = "127.0.0.1";
		private $user = "conocer";
		private $password = "123pormi";
		private $db = "dbCONOCER";
	
		function createConnection(){
			return new mysqli($this->host, $this->user, $this->password, $this->db);
		}	

		function execSP($SP){
			$result["success"] = false;
			$conn = $this->createConnection();
			try{				
				if($conn->query($SP)){
					$res = $conn->query("SELECT @output");
					//while(
					$obj = $res->fetch_object();
					$result["result"] = get_object_vars($obj);
					$result["success"] = true;
					$res->close();
				}
				else{
					$result["success"] = false;
				}
			}
			catch(Exception $e){
				$result["msg"] = 'Exception error: '. $e->getMessage();
				$result["success"] = false;
			}
			finally{
				mysqli_close($conn);
			}
			return $result;
		}

		function insertQuery($query){
			$result["success"] = false;
			$conn = $this->createConnection();
			$lista = array();
			try{
				$conn->query($query);
				$result["msg"] = "Query completado, el id generado es: ". $conn->insert_id;
				$result["folio"] = $conn->insert_id;
				$result["success"] = true;
			}
			catch(Exception $e){
				$result["success"] = false;	
				$result["msg"] = $e;
			}
			finally{
				mysqli_close($conn);
			}
			return $result;
		}

		function executeQuery($query){
			$result["success"] = false;
			$conn = $this->createConnection();
			$lista = array();
			try{
				$resultSQL = $conn->query($query);
				if($resultSQL){
					while($obj = $resultSQL->fetch_object()){ 
			            array_push($lista, $obj);
			        } 
			        
			        if ($resultSQL->num_rows < 1) {
						$result["msg"] = "Query completado, numero de registros: ". $resultSQL->num_rows;
					}else{
						$result["msg"] = "Query completado, numero de registros: ". $resultSQL->num_rows;
					}

					$result["output"] = $lista;
					$result["success"] = true;
					$resultSQL->close();
				}
			}
			catch(Exception $e){
				$result["success"] = false;	
				$result["msg"] = $e;
			}
			finally{
				mysqli_close($conn);
			}
			return $result;
		}	
	}
?>
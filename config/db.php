<?php
	class db{		
		private	$hostname="localhost";
		private	$username="root";
		private	$password="";
		private	$db="thuctap";
		private $conn;

		public function connect(){
			$this->conn=null;

			try {
  				$this->conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->db."", $this->username, $this->password);
  				// set the PDO error mode to exception
  				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} catch(PDOException $e) {
  				echo "Connection failed: " . $e->getMessage();
			}
			return $this->conn;	
		}
	}
?>
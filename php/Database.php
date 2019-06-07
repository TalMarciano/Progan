<?php
	require_once('dbconfig.php');
	class Database{
		private $connection;
		public function __construct(){
			$this->open_db_connection();
		}
		private function open_db_connection(){ // open the connection
			error_reporting(E_ERROR);
			$this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
			if($this->connection->connction_error){
				die("Connection failed: " .$conn->connection_error);
			}
		}
		public function get_connection(){
			return $this->connection;
		}
		public function query($sql){
			$result = $this->connection->query($sql);
			if(!$result){
				return null;
			}
			else{
			   // echo 'this is in the db.php';
			   // var_dump($result);
			   return $result;
			}
		}
		
	}
	$db = new Database();
	
	

?>

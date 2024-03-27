<?php
	class Connection{
		public $server;
		public $user;
		public $password;
		public $database;

		public function __construct($server, $user, $password, $database){
			$this->server = $server;
			$this->user = $user;
			$this->password = $password;
			$this->database = $database;
		}

		public function get(){
			$mysqli = new mysqli($this->server, $this->user, $this->password, $this->database);
			if($mysqli->connect_errno){
				die("Error de conexión a la base de datos: " . $mysqli->connect_error);
			}else{
				$mysqli->set_charset("utf8");
				return $mysqli;
			}
		}
	}
?>
<?php
	require '../models/User.php';

	class userController{
		private $mysqli;

		public function __construct($mysqli){
			$this->mysqli = $mysqli;
		}

		public function get($id){
			$user = User::get($this->mysqli, $id);
			if($user->num_rows != 1){
				throw new Exception("Not Found", 404);
			}
			$request = $user->fetch_assoc();
			return $request;
		}

		public function post($username, $email, $password){
			$id = User::getId($this->mysqli, $username);
			if($id != 0){
				throw new Exception("Conflict", 409);
			}
			$user = new User("", $username, "", "", $email, $password, 2);
			$user->add($this->mysqli);
			$id = User::getId($this->mysqli, $username);
			$user = User::get($this->mysqli, $id);
			$_SESSION['user'] = $user->fetch_assoc();
			return 204;
		}
	}
?>
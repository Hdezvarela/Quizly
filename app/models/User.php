<?php
	class User{
		public $id;
		public $username;
		public $firstname;
		public $lastname;
		public $email;
		public $password;
		public $role;

		public function __construct($id, $username, $firstname, $lastname, $email, $password, $role){
			$this->id = $id;
			$this->username = $username;
			$this->firstname = $firstname;
			$this->lastname = $lastname;
			$this->email = $email;
			$this->password = password_hash($password, PASSWORD_DEFAULT);
			$this->role = $role;
		}

		public function add($mysqli){
			$query = "INSERT INTO USERS (id, username, firstname, lastname, email, password, role) VALUES (?, ?, ?, ?, ?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("isssssi", $this->id, $this->username, $this->firstname, $this->lastname, $this->email, $this->password, $this->role);
			$stmt->execute();
			$stmt->close();
		}

		public static function gets($mysqli){
			$query = "SELECT * FROM USERS";
			$stmt = $mysqli->prepare($query);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function get($mysqli, int $id){
			$query = "SELECT * FROM USERS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function getId($mysqli, $username){
			$query = "SELECT id FROM USERS WHERE username = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("s", $username);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			$id = 0;
			if($data->num_rows == 1){
				while ($row = $data->fetch_assoc()){
					$id = $row['id'];
				}
			}
			return $id;
		}

		public static function getIdFromEmail($mysqli, $email){
			$query = "SELECT id FROM USERS WHERE email = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("s", $email);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			$id = 0;
			if($data->num_rows == 1){
				while ($row = $data->fetch_assoc()){
					$id = $row['id'];
				}
			}
			return $id;
		}

		public static function getPassword($mysqli, int $id){
			$query = "SELECT password FROM USERS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			$hash = "";
			if($data->num_rows == 1){
				while ($row = $data->fetch_assoc()){
					$hash = $row['password'];
				}
			}
			return $hash;
		}

		public static function setPassword($mysqli, int $id, $newpassword){
			$password = password_hash($newpassword, PASSWORD_DEFAULT);
			$query = "UPDATE USERS SET password = ? WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("si", $password, $id);
			$stmt->execute();
			$stmt->close();
		}

		public static function delete($mysqli, int $id){
			$query = "DELETE FROM USERS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->close();
		}
	}
?>
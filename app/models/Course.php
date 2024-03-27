<?php
	class Course{
		public $id;
		public $name;
		public $description;
		public $user_id;

		public function __construct($id, $name, $description, $user_id){
			$this->id = $id;
			$this->name = $name;
			$this->description = $description;
			$this->user_id = $user_id;
		}

		public function add($mysqli){
			$query = "INSERT INTO CLASSES (id, name, description, user_id) VALUES (?, ?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("issi", $this->id, $this->name, $this->description, $this->user_id);
			$stmt->execute();
			$stmt->close();
		}

		public static function gets($mysqli, $user_id){
			$query = "SELECT * FROM CLASSES WHERE user_id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $user_id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function get($mysqli, int $id){
			$query = "SELECT * FROM CLASSES WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function getId($mysqli, $name, $user){
			$query = "SELECT id FROM CLASSES WHERE name = ? AND user_id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("si", $name, $user);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			$data = $data->fetch_assoc();
			$id = $data['id'];
			return $id;
		}

		public static function getUserProperty($mysqli, $course_id){
			$query = "SELECT user_id FROM CLASSES WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $course_id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			$data = $data->fetch_assoc();
			$id = $data['user_id'];
			return $id;
		}
	}
?>
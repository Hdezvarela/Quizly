<?php
	class Topic{
		public $id;
		public $name;
		public $description;
		public $class_id;

		public function __construct($id, $name, $description, $class_id){
			$this->id = $id;
			$this->name = $name;
			$this->description = $description;
			$this->class_id = $class_id;
		}

		public function add($mysqli){
			$query = "INSERT INTO TOPICS (id, name, description, class_id) VALUES (?, ?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("issi", $this->id, $this->name, $this->description, $this->class_id);
			if($stmt->execute() === false){
				die("Error: ".$stmt->error);
			}
			$stmt->close();
		}

		public static function gets($mysqli, $class_id, $user_id){
			$query = "SELECT TOPICS.id, TOPICS.name FROM TOPICS INNER JOIN CLASSES ON TOPICS.class_id = CLASSES.id WHERE class_id = ? AND user_id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("ii", $class_id, $user_id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function get($mysqli, $id){
			$query = "SELECT * FROM TOPICS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}
	}
?>
<?php
	class Question{
		public int $id;
		public String $text;
		public String $type;
		public int $topic_id;

		public function __construct($id, $text, $type, $topic_id){
			$this->id = $id;
			$this->text = $text;
			$this->type = $type;
			$this->topic_id = $topic_id;
		}

		public function add($mysqli){
			$query = "INSERT INTO QUESTIONS (id, text, type, topic_id) VALUES (?, ?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("issi", $this->id, $this->text, $this->type, $this->topic_id);
			$stmt->execute();
			$stmt->close();
		}

		public static function gets($mysqli, $topic_id){
			$query = "SELECT * FROM QUESTIONS WHERE topic_id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $topic_id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function get($mysqli, int $id){
			$query = "SELECT * FROM QUESTIONS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function delete($mysqli, int $id){
			$query = "DELETE FROM QUESTIONS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->close();
		}
	}
?>
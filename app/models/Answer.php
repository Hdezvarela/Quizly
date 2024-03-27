<?php
	class Answer{
		public int $id;
		public String $text;
		public bool $correct;
		public int $question_id;

		public function __construct($id, $text, $correct, $question_id){
			$this->id = $id;
			$this->text = $text;
			$this->correct = $correct;
			$this->question_id = $question_id;
		}

		public function add($mysqli){
			$query = "INSERT INTO ANSWERS (id, text, correct, question_id) VALUES (?, ?, ?, ?)";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("issi", $this->id, $this->text, $this->correct, $this->question_id);
			$stmt->execute();
			$stmt->close();
		}

		public static function gets($mysqli){
			$query = "SELECT * FROM ANSWERS";
			$stmt = $mysqli->prepare($query);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function get($mysqli, int $id){
			$query = "SELECT * FROM ANSWERS WHERE id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function getFromQuestion($mysqli, int $id){
			$query = "SELECT id, text, correct FROM ANSWERS WHERE question_id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$data = $stmt->get_result();
			$stmt->close();
			return $data;
		}

		public static function delete($mysqli, int $id){
			$query = "DELETE FROM ANSWERS WHERE question_id = ?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("i", $id);
			$stmt->execute();
			$stmt->close();
		}
	}
?>
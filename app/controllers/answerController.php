<?php
	require '../models/Answer.php';

	class answerController{
		private $mysqli;

		public function __construct($mysqli){
			$this->mysqli = $mysqli;
		}

		public function post($name, $lesson_id){
			$course = new Course("", $_POST['name'], $_POST['description'], $_SESSION['user']['id']);
			$course->add($this->mysqli);
			return 204;
		}

        public function delete($id){
            Answer::delete($this->mysqli, $id);
			return 204;
		}
	}
?>
<?php
	require '../models/Course.php';

	class courseController{
		private $mysqli;

		public function __construct($mysqli){
			$this->mysqli = $mysqli;
		}

		public function get($id=0){
			if($id != 0){
				$course = Course::get($this->mysqli, $id);
				if($course->num_rows != 1){
					throw new Exception("Not Found", 404);
				}
				$request = $course->fetch_assoc();
			}else{
				$courses = Course::gets($this->mysqli, $_SESSION['user']['id']);
				if($courses->num_rows < 1){
					throw new Exception("Not Found", 404);
				}
				$request = $courses->fetch_all(MYSQLI_ASSOC);
			}
			return $request;
		}

		public function post($name, $lesson_id){
			$course = new Course("", $_POST['name'], $_POST['description'], $_SESSION['user']['id']);
			$course->add($this->mysqli);
			return 204;
		}
	}
?>
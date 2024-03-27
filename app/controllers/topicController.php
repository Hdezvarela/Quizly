<?php
	require '../models/Topic.php';

	class topicController{
		private $mysqli;

		public function __construct($mysqli){
			$this->mysqli = $mysqli;
		}

		public function get($topic_id=0, $course_id=0){
			if($topic_id != 0){
				$topic = Topic::get($this->mysqli, $topic_id);
				if($topic->num_rows != 1){
					throw new Exception("Not Found", 404);
				}
				$request = $topic->fetch_assoc();
			}else{
				$topics = Topic::gets($this->mysqli, $course_id, $_SESSION['user']['id']);
				if($topics->num_rows < 1){
					throw new Exception("Not Found", 404);
				}
				$request = $topics->fetch_all(MYSQLI_ASSOC);
			}
			return $request;
		}

		public function post($name, $course_id){
			$topic = new Topic("", $name, "", $course_id);
			$topic->add($this->mysqli);
			return 204;
		}
	}
?>
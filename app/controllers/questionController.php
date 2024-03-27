<?php
	require '../models/Question.php';
    require '../models/Answer.php';

	class questionController{
		private $mysqli;

		public function __construct($mysqli){
			$this->mysqli = $mysqli;
		}

		public function get($course=0, $topic=0, $id=0){
			if($id != 0){
				$question = Question::get($this->mysqli, $topic);
				if($question->num_rows != 1){
					throw new Exception("Not Found", 404);
				}
				$request = $question->fetch_assoc();
			}else{
				$questions = Question::gets($this->mysqli, $topic);
				if($questions->num_rows < 1){
					throw new Exception("Not Found", 404);
				}
                $request = array();
                while ($row = $questions->fetch_assoc()){
                    $request[] = $row;
                }
                foreach($request as &$question){
                    $answersArray = array();
                    $answers = Answer::getFromQuestion($this->mysqli, $question['id']);
                    if($answers->num_rows < 1){
                        continue;
                    }
                    while($answer = $answers->fetch_assoc()){
                        $answersArray[] = $answer;
                    }
                    $question['answers'] = $answersArray;
                }
			}
			return $request;
		}

		public function post($name, $lesson_id){
			$course = new Question("", $_POST['name'], $_POST['description'], $_SESSION['user']['id']);
			$course->add($this->mysqli);
			return 204;
		}

		public function delete($id){
			$answers = Answer::getFromQuestion($this->mysqli, $id);
			if($answers->num_rows > 0){
				Answer::delete($this->mysqli, $id);
			}
			Question::delete($this->mysqli, $id);
			return 204;
		}
	}
?>
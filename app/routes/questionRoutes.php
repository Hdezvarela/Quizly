<?php
	require '../../vendor/hdzvrlib.php';
	require_once '../core/database.php';
	require '../controllers/questionController.php';

	session_start();
	try{
		$controller = new questionController($mysqli->get());
		if(!isset($_SESSION['user']['id'])){
			throw new Exception("Unauthorized", 401);
		}
		if(!isset($_POST['method'])){
			throw new Exception("Bad Request", 400);
		}
		switch($_POST['method']){
			case 'GET':
                $_POST['course'] = $_POST['course'] ?? 0;
				$_POST['topic'] = $_POST['topic'] ?? 0;
                $_POST['id'] = $_POST['id'] ?? 0;
				echo json_encode($controller->get($_POST['course'], $_POST['topic']));
				break;
			case 'POST':
				if(!isset($_POST['question'], $_POST['topic']) || hasEmptyValues($_POST) || !is_numeric($_POST['topic'])){
					throw new Exception("Bad Request", 400);
				}
				http_response_code($controller->post($_POST['question'], $_POST['topic']));
				break;
			case 'PUT':
				break;
			case 'PATCH':
				break;
			case 'DELETE':
				if(!isset($_POST['id']) || hasEmptyValues($_POST)){
					throw new Exception("Bad Request", 400);
				}
                http_response_code($controller->delete($_POST['id']));
				break;
			default:
				throw new Exception("Bad Request", 400);
				break;
		}
	}catch(Exception $error){
		http_response_code($error->getCode());
	}finally{
		if(isset($controller)){
			unset($controller);
		}
	}
?>
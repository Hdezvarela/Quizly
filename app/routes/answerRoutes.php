<?php
	require '../../vendor/hdzvrlib.php';
	require_once '../core/database.php';
	require '../controllers/answerController.php';

	session_start();
	try{
		$controller = new answerController($mysqli->get());
		if(!isset($_SESSION['user']['id'])){
			throw new Exception("Unauthorized", 401);
		}
		if(!isset($_POST['method'])){
			throw new Exception("Bad Request", 400);
		}
		switch($_POST['method']){
			case 'GET':
				break;
			case 'POST':
                if(!isset($_POST['text'], $_POST['correct']) || hasEmptyValues($_POST)){
					throw new Exception("Bad Request", 400);
				}
				http_response_code($controller->post($_POST['name'], $_POST['description']));
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
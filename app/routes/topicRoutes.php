<?php
	require '../../vendor/hdzvrlib.php';
	require_once '../core/database.php';
	require '../controllers/topicController.php';

	session_start();
	try{
		$controller = new topicController($mysqli->get());
		if(!isset($_SESSION['user']['id'])){
			throw new Exception("Unauthorized", 401);
		}
		if(!isset($_POST['method'])){
			throw new Exception("Bad Request", 400);
		}
		switch($_POST['method']){
			case 'GET':
				$_POST['topic'] = $_POST['topic'] ?? 0;
				$_POST['course'] = $_POST['course'] ?? 0;
				echo json_encode($controller->get($_POST['topic'], $_POST['course']));
				break;
			case 'POST':
				if(!isset($_POST['name'], $_POST['course']) || hasEmptyValues($_POST) || !is_numeric($_POST['course'])){
					throw new Exception("Bad Request", 400);
				}
				http_response_code($controller->post($_POST['name'], $_POST['course']));
				break;
			case 'PUT':
				break;
			case 'PATCH':
				break;
			case 'DELETE':
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
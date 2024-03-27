<?php
	require '../../vendor/hdzvrlib.php';
	require_once '../core/database.php';
	require '../controllers/userController.php';

	session_start();
	try{
		$controller = new userController($mysqli->get());
		if(!isset($_POST['method'])){
			throw new Exception("Bad Request", 400);
		}
		switch($_POST['method']){
			case 'GET':
				if(!isset($_SESSION['user']['id'])){
					throw new Exception("Unauthorized", 401);
				}
				echo json_encode($controller->get($_SESSION['user']['id']));
				break;
			case 'POST':
				if(!isset($_POST['username'], $_POST['email'], $_POST['password'], $_POST['passwordConfirm']) || hasEmptyValues($_POST) || $_POST['password'] != $_POST['passwordConfirm']){
					throw new Exception("Bad Request", 400);
				}
				http_response_code($controller->post($_POST['username'], $_POST['email'], $_POST['password']));
				break;
			case 'PUT':
				break;
			case 'PATCH':
				break;
			case 'DELETE':
				if(!isset($_SESSION['user']['id'])){
					throw new Exception("Unauthorized", 401);
				}
				http_response_code($controller->delete($_SESSION['user']['id']));

				$Request = User::get($connection, $_SESSION['user']['id']);
				if($Request->num_rows != 1){
					throw new Exception("Not Found", 404);
				}
				User::delete($connection, $_SESSION['user']['id']);
				$_SESSION = array();
				if(ini_get("session.use_cookies")){
					$params = session_get_cookie_params();
					setcookie(session_name(), '', time() - 42000,
						$params["path"], $params["domain"],
						$params["secure"], $params["httponly"]
					);
				}
				session_destroy();
				return 204;
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
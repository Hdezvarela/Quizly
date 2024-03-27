<?php
	require '../../vendor/hdzvrlib.php';
	require '../core/database.php';
	require '../models/User.php';

	session_start();
	try{
		if(!isset($_POST['request'])){
			throw new Exception("Not Found", 404);
		}
		$connection = $mysqli->get();
		switch($_POST['request']){
			case 'start':
                sleep(1);
				if(!isset($_POST['user'], $_POST['password']) || hasEmptyValues($_POST)){
					throw new Exception("Bad Request", 400);
				}
				$id = User::getId($connection, $_POST['user']);
				if($id == 0){
					throw new Exception("Bad Request", 400);
				}
				$password = User::getPassword($connection, $id);
				if(!password_verify($_POST['password'], $password)){
					throw new Exception("Bad Request", 400);
				}
				$user = User::get($connection, $id);
				$_SESSION['user'] = $user->fetch_assoc();
                http_response_code(204);
				break;
            case 'recovery':
                if(!isset($_POST['email']) || empty($_POST['email'])){
                    throw new Exception("Bad Request", 400);
                }
                $id = User::getIdFromEmail($connection, $_POST['email']);
                if($id == 0){
                    throw new Exception("Not Found", 404);
                }
                /* INSERTE EL CODIGO PARA RECUPERAR LA CUENTA UNA VEZ VALIDADO EL ID DEL USUARIO */
                /* DEBERIA INTEGRARSE UN API COMO RESEND O CONFIGURAR EL SERVICIO DE EMAIL DEL SERVIDOR CONTRATADO */
                http_response_code(204);
                break;
            case 'exit':
                if(!isset($_SESSION['user']['id'])){
                    throw new Exception("Unauthorized", 401);
                }
                $_SESSION = array();
                if(ini_get("session.use_cookies")){
                    $params = session_get_cookie_params();
                    setcookie(session_name(), '', time() - 42000,
                        $params["path"], $params["domain"],
                        $params["secure"], $params["httponly"]
                    );
                }
                session_destroy();
                http_response_code(204);
				break;
			default:
				throw new Exception("Bad Request", 400);
				break;
		}
	}catch(Exception $error){
        http_response_code($error->getCode());
	}finally{
		if(isset($connection)){
			unset($connection);
		}
	}
?>
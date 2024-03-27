<?php
	require '../core/database.php';
	require '../models/Course.php';
	
	session_start();
	if(!isset($_SESSION['user'], $_GET['course'])){
		header('location: /iniciar_sesion');
	}else{
		$NAV['title'] = 'Temario';
		$connection = $mysqli->get();
		$user_id = Course::getUserProperty($connection, $_GET['course']);
		if($user_id != $_SESSION['user']['id']){
			header('location: /404');
		}
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="icon" type="image/png" href="../public/img/favicon.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Quizly - Temario</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/class.css"/>
</head>
<body>
	<?php require 'partials/header.php'?>
	<main>
		<section class="panel">
			<div class="infPanel">Este es el temario de tu clase, puedes crear, visualizar y administrar los temas.</div>
			<div class="action" onclick="addtopic()">Crear nuevo tema</div>
		</section>
		<section class="print"></section>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/temas.js"></script>
</body>
</html>
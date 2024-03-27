<?php
	require '../core/database.php';
	require '../models/Topic.php';

	session_start();
	if(!isset($_SESSION['user'], $_GET['course'])){
		header('location: /iniciar_sesion');
	}else{
		$NAV['title'] = 'Preguntas';
		$connection = $mysqli->get();
		$topic = Topic::get($connection, $_GET['topic']);
		$topic = $topic->fetch_assoc();
		if($topic['description'] == ""){
			$topic['description'] = "Sin descripcion";
		}
	}
	
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="icon" type="image/png" href="/public/img/favicon.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Quizly - Preguntas</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/questions.css"/>
</head>
<body>
	<?php require 'partials/header.php'?>
	<main>
		<section class="panel">
			<div class="description">
				<h2><?=$topic['name']?></h2>
				<p><?=$topic['description']?></p>
			</div>
		</section>
		<section class="print"></section>
	</main>
	<footer>
		<button>Generar Examen</button>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/questions.js"></script>
	<script>document.addEventListener('DOMContentLoaded', gets(<?=$_GET['course']?>, <?=$_GET['topic']?>), false);</script>
</body>
</html>
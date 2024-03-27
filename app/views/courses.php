<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: /iniciar_sesion');
	}
	$NAV['title'] = 'Clases';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="icon" type="image/png" href="../public/img/favicon.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Quizly - Clases</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/class.css"/>
</head>
<body>
	<?php require 'partials/header.php'?>
	<main>
		<section class="panel">
			<div class="infPanel">Bienvenido, este es tu panel principal, aqui puedes crear, visualizar y administrar tus clases.</div>
			<a class="action" href="/crear_clase">Crear nueva clase</a>
		</section>
		<section class="print"></section>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/cursos.js"></script>
</body>
</html>
<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: /iniciar_sesion');
	}
	$NAV['title'] = 'Crear Clase';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="icon" type="image/png" href="../public/img/favicon.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Quizly - Crear Clase</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/class.css"/>
</head>
<body>
	<?php require 'partials/header.php'?>
	<main>
		<section class="panel">
			<div class="infPanel">Te sugerimos agregar una descripción a tu clase, recuerda que esta informacion te ayudara a identificar mejor el contenido de la misma.</div>
		</section>
		<section class="print">
			<form id="newClass">
				<p class="label">Nombre de la clase</p>
				<input class="inpt" type="text" name="name" placeholder="Programación 1" required>
				<p class="label">Descripción</p>
				<textarea class="inpt resize-ta" id="textarea" name="description" oninput="autoResize()" required></textarea>
				<input class="inpt" id="send" type="submit" value="AGREGAR" id="btn_add">
				<div class="loader"></div>
			</form>
		</section>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/crear_clase.js"></script>
</body>
</html>
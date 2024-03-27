<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: /iniciar_sesion');
	}
	$NAV['title'] = 'Preguntas';
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
				<h2>Temario 1</h2>
				<p>Lorem ipsum dolor sit amet consectetur adipiscing elit laoreet nascetur, fusce facilisis bibendum quis egestas parturient volutpat et, senectus maecenas.</p>
			</div>
		</section>
		<section class="print">
			<article class="question">
				<div class="head">
					<h3>Pregunta 1</h3>
					<p class="opt" id="removeQuest">Eliminar</p>
					<p class="opt" id="editQuest">Editar</p>
				</div>
				<p class="quest">¿Comer frijoles causa gases intensos y dolorosos si no se les hecha yodo?</p>
				<div class="printAnswers">
					<div class="answer">
						<p class="bad">Soy la respuesta numero 1</p>
					</div>
					<div class="answer">
						<p class="correct">Soy la respuesta numero 2 y soy la respuesta correcta</p>
					</div>
					<div class="answer">
						<p class="bad">Soy la respuesta numero 3</p>
					</div>
					<div class="answer">
						<p class="bad">Soy la respuesta numero 4</p>
					</div>
				</div>
			</article>
			<article class="question">
				<div class="head">
					<h3>Pregunta 2</h3>
					<p class="opt" id="removeQuest">Eliminar</p>
					<p class="opt" id="editQuest">Editar</p>
				</div>
				<p class="quest">¿Comer frijoles causa gases intensos y dolorosos si no se les hecha yodo?</p>
				<div class="printAnswers">
					<div class="answer">
						<p class="correct">Soy la respuesta numero 2 y soy la respuesta correcta</p>
					</div>
				</div>
			</article>
			<article class="question">
				<div class="head">
					<h3>Pregunta 3</h3>
					<p class="opt" id="removeQuest">Eliminar</p>
					<p class="opt" id="editQuest">Editar</p>
				</div>
				<p class="quest">¿Comer frijoles causa gases intensos y dolorosos si no se les hecha yodo?</p>
				<div class="printAnswers">
					<div class="answer">
						<p class="bad">Soy la respuesta numero 1</p>
					</div>
					<div class="answer">
						<p class="correct">Soy la respuesta numero 2 y soy la respuesta correcta</p>
					</div>
					<div class="answer">
						<p class="bad">Soy la respuesta numero 3</p>
					</div>
					<div class="answer">
						<p class="bad">Soy la respuesta numero 4</p>
					</div>
				</div>
			</article>
			<article class="question">
				<div class="head">
					<h3>Pregunta 4</h3>
					<p class="opt" id="removeQuest">Eliminar</p>
					<p class="opt" id="editQuest">Editar</p>
				</div>
				<p class="quest">¿Comer frijoles causa gases intensos y dolorosos si no se les hecha yodo?</p>
				<div class="printAnswers">
					<div class="answer">
						<p class="bad">Soy la respuesta numero 1</p>
					</div>
					<div class="answer">
						<p class="correct">Soy la respuesta numero 2 y soy la respuesta correcta</p>
					</div>
					<div class="answer">
						<p class="bad">Soy la respuesta numero 3</p>
					</div>
					<div class="answer">
						<p class="bad">Soy la respuesta numero 4</p>
					</div>
				</div>
			</article>
		</section>
	</main>
	<footer>
		<button>Generar Examen</button>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
</body>
</html>
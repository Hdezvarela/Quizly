<?php
	session_start();
	if(isset($_SESSION['user'])){
		header('location: /');
	}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="icon" type="image/png" href="/public/img/favicon.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Quizly - Crear cuenta</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/sessions.css"/>
</head>
<body>
	<main>
		<picture class="logotipo">
			<img src="/public/img/logotipo.svg" alt="logotipo">
		</picture>
		<h3 class="titleScreen">Crear cuenta</h3>
		<div class="signupText">¿Ya tienes una cuenta? <a href="/iniciar_sesion" class="reg">Iniciar sesión</a></div>
		<form class="formLogin" id="login">
			<input class="field" type="text" name="username" placeholder="Nombre de Usuario" pattern="[A-Za-z0-9]{6,12}$" required autofocus>
			<input class="field" type="text" name="email" placeholder="Correo Electronico" pattern="[A-Za-z0-9._]+@[A-Za-z0-9._]+\.[A-Za-z]{2,3}$" required autofocus>
			<input class="field" type="password" name="password" placeholder="Contraseña" required autofocus>
			<input class="field" type="password" name="passwordConfirm" placeholder="Confirmar Contraseña" required autofocus>
			<div class="signupText2">Acepto los <a href="#" class="reg">Términos y Condiciones</a></div>
			<input id="send" type="submit" value="Registrarme">
		</form>
		<a class="copyright" href="https://hdezvarela.com" target="_blank">Hdezvarela 2024</a>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/crear_cuenta.js"></script>
</body>
</html>
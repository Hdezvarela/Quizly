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
	<title>Quizly - Iniciar sesión</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/sessions.css"/>
</head>
<body>
	<main>
		<picture class="logotipo">
			<img src="/public/img/logotipo.svg" alt="logotipo">
		</picture>
		<h3 class="titleScreen">Bienvenido</h3>
		<p class="textDescription">Ingrese sus credenciales para continuar...</p>
		<form class="formLogin" id="login">
			<input class="field" type="text" name="user" placeholder="Nombre de Usuario" required autofocus>
			<input class="field" type="password" name="password" placeholder="Contraseña" required>
			<a href="/recuperar_contraseña" class="forgetPass">¿Olvidaste tu contraseña?</a>
			<input id="send" type="submit" value="Iniciar Sesión">
			<div class="loader"></div>
		</form>
		<p class="or">- ¿Necesitas ayuda? -</p>
		<div class="others">
			<div class="other"><img src="/public/img/icons/support.svg" alt=""> Soporte</div>
			<div class="other"><img src="/public/img/icons/download.svg" alt=""> Manual</div>
		</div>
		<div class="signupText">¿No tienes una cuenta? <a href="/crear_cuenta" class="reg">Registrate</a></div>
		<a class="copyright" href="https://hdezvarela.com" target="_blank">Hdezvarela 2024</a>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/iniciar_sesion.js"></script>
</body>
</html>
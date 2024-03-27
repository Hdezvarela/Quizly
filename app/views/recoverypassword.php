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
	<title>Quizly - Recuperar contraseña</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/sessions.css"/>
</head>
<body>
	<main>
		<picture class="logotipo">
			<img src="/public/img/logotipo.svg" alt="logotipo">
		</picture>
		<h3 class="titleScreen">¿olvidaste tu contraseña?</h3>
		<p class="textDescription">No te preocupes, suele ocurrir. <br> Por favor ingresa el correo asociado a tu cuenta</p>
		<picture class="imgResetpassword">
			<img src="/public/img/illustrations/resetpassword.svg" alt="">
		</picture>
		<form class="formLogin" id="recovery">
			<input class="field" type="text" name="email" placeholder="Correo Electronico" pattern="[A-Za-z0-9._]+@[A-Za-z0-9._]+\.[A-Za-z]{2,3}$" required autofocus>
			<div class="signupText2">¿No tienes una cuenta? <a href="/crear_cuenta" class="reg">Registrate</a></div>
			<input id="send" type="submit" value="Recuperar cuenta">
		</form>
		<div class="signupText">¿Quieres volver a intentar? <a href="/iniciar_sesion" class="reg">Iniciar Sesión</a></div>
		<a class="copyright" href="https://hdezvarela.com" target="_blank">Hdezvarela 2024</a>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
	<script src="/public/js/recuperar_cuenta.js"></script>
</body>
</html>
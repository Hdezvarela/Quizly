<?php
	session_start();
	if(!isset($_SESSION['user'])){
		header('location: /iniciar_sesion');
	}
	$NAV['title'] = 'Cuenta';
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
	<link rel="icon" type="image/png" href="/public/img/favicon.png"/>
	<meta http-equiv="X-UA-Compatible" content="ie=edge"/>
	<title>Quizly - Cuenta</title>
	<link rel="stylesheet" href="/public/css/all.css"/>
	<link rel="stylesheet" href="/public/css/account.css"/>
</head>
<body>
	<?php require 'partials/header.php'?>
	<main>
		<div class="myData1">
			<picture class="IMGprofile">
				<img src="/public/img/profiles/profile1.jpg" alt="">
			</picture>
			<div class="textData1">
				<p class="name"><?=$_SESSION['user']['firstname']?> <?=$_SESSION['user']['lastname']?></p>
				<p class="email"><?=$_SESSION['user']['email']?></p>
			</div>
		</div>
		<a class="containInf" href="/clases">
			<div class="infProfile">
				<img src="/public/img/logotipo.svg" alt="logotipo">
			</div>
		</a>
		<div class="options">
			<a href="" class="opt_Data">
				<img src="/public/img/icons/profile.svg" alt="">
				<p>Ver Perfil</p>
				<img src="/public/img/icons/arrowright.svg" alt="">
			</a>
			<a href="" class="opt_Data">
				<img src="/public/img/icons/edit.svg" alt="">
				<p>Editar Perfil</p>
				<img src="/public/img/icons/arrowright.svg" alt="">
			</a>
			<a href="" class="opt_Data">
				<img src="/public/img/icons/security.svg" alt="">
				<p>Contraseña y Seguridad</p>
				<img src="/public/img/icons/arrowright.svg" alt="">
			</a>
			<a href="" class="opt_Data">
				<img src="/public/img/icons/support2.svg" alt="">
				<p>Ayuda y Soporte</p>
				<img src="/public/img/icons/arrowright.svg" alt="">
			</a>
			<a href="" class="opt_Data">
				<img src="/public/img/icons/about.svg" alt="">
				<p>Acerca de Quizly</p>
				<img src="/public/img/icons/arrowright.svg" alt="">
			</a>
			<a href="#" class="opt_Data" id="logoutl" onclick="logout()">
				<img src="/public/img/icons/logout.svg" alt="">
				<p id="logout">Cerrar Sesion</p>
				<img src="/public/img/icons/arrowrightred.svg" alt="">
			</a>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/public/js/all.js"></script>
</body>
</html>
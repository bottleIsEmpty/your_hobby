<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" type="text/css" href="css/signup.css">
	<meta charset="UTF-8">
	<title>Регистрация</title>
</head>
<body>
	<div id="wrapper">
		<?php
			$isAuth = isset($_SESSION['id']) ? true : false;
			$text = 'Регистрация';
			require_once('blocks/header.php');
		?>
		<div id="content">
			<div id="register-shadow">
				<div id="register" class="group">
					<div id="reg-greets">
						Начните хранить Ваше хобби в одном месте
					</div>
					<div id="greet-message">
						Регистрация на "Твоём хобби" позволит хранить, делиться, оценивать, советовать другим то, что понравилось вам и получать советы от других пользователей. Зарегистрируйся сейчас! 
					</div>
					<form method="POST" id="register_form">
						<div class="register-text">Логин</div> 
							<input type="text" name="login" id="login"><br>
						<div class="register-text">Пароль</div> 
							<input type="password" name="password" id="password"><br>
						<div class="register-text">Повторите пароль</div> 
							<input type="password" name="password2" id="password2"><br>
						<div class="register-text">Имя</div>  
							<input type="text" name="name" id="name"><br>
						<div class="register-text" id="name">Фамилия</div> 
							<input type="text" name="surname" id="surname"><br>
						<div class="register-text" id="name">E-mail</div> 
							<input type="text" name="email" id="email"><br>
							<div id="error"></div>
						<p><button type="submit" name="submit_btn" id="submit_btn">Регистрация</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php require_once('blocks/footer.php') ?>
	<script src="scripts/jquery-3.2.0.js"></script>
	<script src="scripts/signup.js"></script>
</body>
</html>
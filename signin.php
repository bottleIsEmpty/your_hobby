<!DOCTYPE html>
<html>
	<link rel="stylesheet" type="text/css"  href="css/signin.css">
<head>
	<title>Вход</title>
</head>
<body>
	<div id="wrapper">
		<?php
			$isAuth = isset($_SESSION['id']) ? true : false;
			$text = 'Вход';
			require_once('blocks/header.php');
		?>
		<div id="content">
			<div id="signin-shadow">
				<div id="signin" class="group">
					<div id="sign-greets">
						Вход в систему
					</div>
					<form method="POST" id="signup_form">
						<div class="signin-text">Логин</div> 
							<input type="text" name="login" id="login"><br>
						<div class="signin-text">Пароль</div> 
							<input type="password" name="password" id="password"><br>
							<div id="error"></div>
						<p><button type="submit" name="submit_btn" id="submit_btn">Вход</button></p>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php  require_once("blocks/footer.php");?>
	<script src="scripts/jquery-3.2.0.js"></script>
	<script src="scripts/signin.js"></script>
</body>
</html>
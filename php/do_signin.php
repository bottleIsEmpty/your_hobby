<?php
	require_once('database_connection.php');

	//--Считывание данных из POST-запроса--//

	$login = mysqli_real_escape_string($db, trim($_POST['login']));
	$password = mysqli_real_escape_string($db, trim($_POST['password']));

	if (empty($login) || empty($password)) {
		echo '{"status": false, "error": "Заполните все поля!"}';
		mysqli_close($db);
		exit();
	}

	//--Проверка логина--//

	$result = mysqli_query($db, "SELECT * FROM user WHERE login = '$login'");

	if (!mysqli_num_rows($result)) {
		echo '{"status": false, "error": "Неверный логин или пароль!"}';
		mysqli_close($db);
		exit();
	}

	//--Проверка пароля--//

	$row = mysqli_fetch_assoc($result);
	$salt = $row['salt'];
	$real_password = $row['password'];

	if (md5($salt . '.' . $password) !== $real_password) {
		echo '{"status": false, "error": "Неверный логин или пароль!"}';
		mysqli_close($db);
		exit();
	} 

	//--Запись пользователя в сессию--//

	else {
		$_SESSION['login'] = $login;
		$_SESSION['id'] = $row['user_id'];
		echo '{"status": true}';
	}

	mysqli_close($db);
?>
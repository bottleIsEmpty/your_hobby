<?php 
	require_once('database_connection.php');

	//--Считывание данных из POST-запроса--//
	
	$login = mysqli_real_escape_string($db, trim($_POST['login']));
	$password = mysqli_real_escape_string($db, trim($_POST['password']));
	$name = mysqli_real_escape_string($db, trim($_POST['name']));
	$surname = mysqli_real_escape_string($db, trim($_POST['surname']));
	$email = mysqli_real_escape_string($db, trim($_POST['email']));

	//--Проверка логина--//

	if (empty($login) || empty($password) || empty($email)) {
		echo '{"status": false, "error": "Заполните все поля!"}';
		mysqli_close($db);
		exit();
	}

	$result = mysqli_query ($db, "SELECT * FROM user WHERE login = '$login'");

	if (mysqli_num_rows($result)) {
		echo '{"status": false, "error": "Логин занят!"}';
		mysqli_close($db);
		exit();
	}
	else 
	{
		$salt = mt_rand(100, 999);
		$password = md5($salt . '.' . $password);

		$query = "INSERT INTO user (login, password, name, surname, email, salt) VALUES ('$login', '$password', '$name', '$surname', '$email', '$salt')";

		if (!mysqli_query($db, $query)) {
			echo '{"status": false, "error": "Ошибка базы данных. Повторите позже!"}';
			mysqli_close($db);
			exit();
		}
		else
			echo '{"status": true}'; 
	}

	//--Закрытие соединения с БД--//

	mysqli_close($db);
?>							
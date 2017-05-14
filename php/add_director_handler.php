<?php 
    require_once('database_connection.php');
    
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $surname =  mysqli_real_escape_string($db, trim($_POST['surname']));
	$uploaddir = '../images/uploads/directors/';
	$uploadfile = $uploaddir . basename($_FILES['photo']['name']);
	$photoname = 'dir_photo_' . date('U') . '.' 
           . pathinfo($uploadfile,  PATHINFO_EXTENSION);
		
	if ($name == '' || $surname == '') {
		mysqli_close($db);
		die("Введите имя и фамилию режиссёра");
	}

	if (!is_dir($uploaddir)) {
		mkdir($uploaddir, 0777, true);
	}

	if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
		mysqli_close($db);
		die ('Файл не был загружен');
	}

    if (!rename($uploadfile, $photoname)) {
		mysqli_close($db);
        die ('Ошибка переименования файла');
    }

	$query = mysqli_query($db, "SELECT * FROM directors WHERE name = '$name' AND surname = '$surname'");

	if (mysqli_num_rows($query)) {
		mysqli_close($db);
		die('Указанный режиссёр уже существует');
	} else {
		mysqli_query($db, "INSERT INTO directors (name, surname, photo) VALUES ('$name', '$surname', '$photoname')");
		if (!mysqli_error($db)) {
			echo 'Режиссёр успешно добавлен!';
			mysqli_close($db);
		}
	}
	
?>
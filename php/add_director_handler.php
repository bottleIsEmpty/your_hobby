<?php 
    require_once('database_connection.php');
    
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $surname =  mysqli_real_escape_string($db, trim($_POST['surname']));
	$uploaddir = '../images/uploads/directors/';
	$fileextension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
	$filename = 'dir_photo_' . date('U') . '.' . $fileextension;
	$uploadfile = $uploaddir . $filename;
		
	if ($name == '' || $surname == '') {
		mysqli_close($db);
		exit("Введите имя и фамилию режиссёра");
	}

	if (!is_dir($uploaddir)) {
		mkdir($uploaddir, 0777, true);
	}

	if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
		mysqli_close($db);
		exit('Файл не был загружен');
	}

	$query = mysqli_query($db, "SELECT * FROM directors WHERE name = '$name' AND surname = '$surname'");

	if (mysqli_num_rows($query)) {
		mysqli_close($db);
		exit('Указанный режиссёр уже существует');
	} else {
		mysqli_query($db, "INSERT INTO directors (name, surname, photo) VALUES ('$name', '$surname', '$filename')");
		if (!mysqli_error($db)) {
			echo 'Режиссёр успешно добавлен!';
			mysqli_close($db);
		}
	}
	
?>
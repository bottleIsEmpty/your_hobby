<?php 
    require_once('database_connection.php');
    
    $name = mysqli_real_escape_string($db, trim($_POST['name']));
    $surname =  mysqli_real_escape_string($db, trim($_POST['surname']));
	$uploaddir = '../images/uploads/directors/';
	$uploadfile = $uploaddir . basename($_FILES['photo']['name']);

	if (!is_dir($uploaddir)) {
		mkdir($uploaddir, 0777, true);
	}

	if (!move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)) {
		echo 'Файл не был загружен';
	} else {
		echo 'Файл был успешно загружен';
	}

    if (!rename($uploadfile, $uploaddir . 'dir_photo_' . date('U') . '.' 
           . pathinfo($uploadfile,  PATHINFO_EXTENSION))) {
        echo 'Ошибка переименования файла!';
    }
?>
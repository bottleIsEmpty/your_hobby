<?php
	require_once("database_connection.php");
    
    //--Переменные, полученные методом POST--//

	$name = mysqli_real_escape_string($db, trim($_POST['name']));
    $type = mysqli_real_escape_string($db, trim($_POST['type']));
    $genres = mysqli_real_escape_string($db, trim($_POST['genres']));
    $year = mysqli_real_escape_string($db, trim($_POST['year']));
    $director = mysqli_real_escape_string($db, trim($_POST['director']));
    $director_name = explode(" ", $director, 2);
    $description = mysqli_real_escape_string($db, trim($_POST['description']));

    //--ID Режиссёра для добавления в бд--//

    $id;

    //--Переменные для загрузки изображения--//

    $uploaddir = '../images/uploads/films/';
	$fileextension = pathinfo($_FILES['logo']['name'], PATHINFO_EXTENSION);
	$filename = 'film_logo_' . date('U') . '.' . $fileextension;
	$uploadfile = $uploaddir . $filename;

    //--Проверка на существование данных--//

    if ($name == '' || $type == '' || $genres == '' || $year == '' || $director == ''
       || $description == '') {
        mysqli_close($db);
        exit('Заполните все обязательные поля!');
    }

    //--Проверка фильма на существование--//

    $query = "SELECT * FROM movies WHERE title = '$name'";

    if (mysqli_num_rows(mysqli_query($db, $query))) {
        mysqli_close($db);
        exit('Указанный фильм уже существует');
    }

    //--Проверка режиссёра--//
    
    $query = "SELECT director_id FROM directors WHERE name = '$director_name[0]' AND surname = '$director_name[1]'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
        
    if(!mysqli_num_rows($result)) {
        mysqli_close($db);
        exit('Указанного режиссёра не существует. Добавьте режиссёра!');
    } else {
        $id = $row['director_id'];
    }

    //--Если режиссёр существует, то загрузка изображения в постоянную папку--//

    if ($_FILES['logo']['name']) { //Если фотография была загружена пользователем
        if (!is_dir($uploaddir)) {
		mkdir($uploaddir, 0777, true);
        }

        if (!move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile)) {
            mysqli_close($db);
            exit('Файл не был загружен');
        }
    }

    //--Добавление данных в БД--//

    $query = "INSERT INTO movies (title, type, poster, director, year, genre, description) VALUES ('$name', '$type', '$filename', '$id', '$year', '$genres', '$description')";

    mysqli_query($db, $query);

    if (!mysqli_error($db)) {
        echo 'Фильм успешно добавлен!';
    } else {
        echo 'Ошибка добавления режиссёра' . mysqli_error($db);
    }
    mysqli_close($db);
?>


<?php
	require_once("database_connection.php");

	$name = mysqli_real_escape_string($db, trim($_POST['name']));
    $type = mysqli_real_escape_string($db, trim($_POST['type']));
    $genres = mysqli_real_escape_string($db, trim($_POST['genres']));
    $year = mysqli_real_escape_string($db, trim($_POST['year']));
    $director = mysqli_real_escape_string($db, trim($_POST['director']));
    $director_name = explode(" ", $director, 2);
    $description = mysqli_real_escape_string($db, trim($_POST['description']));
    $id;

    $query = "SELECT * FROM movies WHERE title = '$name'";

    if (mysqli_num_rows(mysqli_query($db, $query))) {
        mysqli_close($db);
        exit("Указанный фильм уже существует");
    }
    
    $query = "SELECT director_id FROM directors WHERE name = '$director_name[0]' AND suranme = '$director_name[1]'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
        
    if(!mysqli_num_rows($result)) {
        mysqli_close($db);
        exit("Указанного режиссёра не существует");
    } else {
        $id = $row['director_id'];
    }
    echo $id;
?>
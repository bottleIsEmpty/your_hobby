<?php 
	require_once(__DIR__  . '/php/database_connection.php');
	require_once(__DIR__ . '/blocks/film-item.php');
	$mode = $_GET['mode'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Твоё хобби</title>
	<link rel="stylesheet" type="text/css" href="/css/films.css">
	<link rel="stylesheet" href="/scripts/jquery-ui-1.12.1.custom/jquery-ui.css">
</head>
<body>
	<div id="wrapper">
		<?php
			$text = "Все фильмы"; 
		 	require_once(__DIR__  . '/blocks/header.php');
		?>
   
        <div id="content">            
            <?php
                $query = "SELECT * FROM movies INNER JOIN directors ON movies.director = directors.director_id";
                $result = mysqli_query($db, $query);
                
                while($row = mysqli_fetch_assoc($result)) {
					createFilmItem($row['title'], $row['year'], $row['genre'], $row['name'] . ' ' . $row['surname'], $row['rating'], $row['poster']);
				} 
            ?>

        </div>
    </div>
    
</body>
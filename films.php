<!DOCTYPE html>
<html>
<head>
	<title>Твоё хобби</title>
	<link rel="stylesheet" type="text/css" href="css/films.css">
	<link rel="stylesheet" href="scripts/jquery-ui-1.12.1.custom/jquery-ui.css">
</head>
<body>
	<div id="wrapper">
		<?php
			require_once(__DIR__  . '\php\database_connection.php');
			$text =  "Все фильмы";
		 	require_once(__DIR__  . '\blocks\header.php');
		?>
   
        <div id="content">
            <table border="1" cellpadding="0" cellspacing="0">
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Тип</th>
                <th>Год</th>
                <th>Режиссёр</th>
                <th>Оценка</th>
            </tr>
            
            <?php
                $query = "SELECT * FROM movies INNER JOIN directors ON movies.director = directors.director_id";
                $result = mysqli_query($db, $query);
                
                for ($i = 1; $row = mysqli_fetch_assoc($result); $i++):
                    
                $type = $row['type'] === 'f' ? 'Фильм' : 'Мультфильм';
                
            ?>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row['title'] ?></td> 
                    <td><?php echo $type ?></td>
                    <td><?php echo $row['year'] ?></td>
                    <td><?php echo $row['name'] . " " . $row['surname'] ?></td>
                    <td><?php echo $row['rating'] ?></td>
                </tr>
                
            <?php endfor; ?>        
            
            </table>
        </div>
    </div>
    
</body>
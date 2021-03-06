<?php
	require_once(__DIR__ . '/php/database_connection.php');
	$text =  $isAuth ? 'Привет, <a href="/users.php?id='. $_SESSION['id'] . '">' . $_SESSION['login'] . "</a>, рады тебя видеть!" :
	"Привет, гость! Можешь войти или зарегистрироваться";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Твоё хобби</title>
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<link rel="stylesheet" href="scripts/jquery-ui-1.12.1.custom/jquery-ui.css">
</head>
<body>
	<div id="wrapper">
		<?php require_once(__DIR__ . '/blocks/header.php');?>
		<div id="content" class="group">
			<?php require_once(__DIR__ . '/blocks/search.php'); ?>
			<div id="main">
				<div id="last-added">
					Последние добавленные
				</div>
				<div class="line-between">
					Книги
				</div>
				<div class="block book">
					<img src="images/covers/gp.jpg" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Гарри Поттер и философский камень</p>
						<p><b>Год: </b>1997</p>
						<p><b>Жанр: </b>фэнтези</p>
						<p><b>Автор: </b>Джоан Кэтлин Роулинг</p>
						<p><b>Средняя оценка: </b>9.5</p>
					</div>
				</div>
				<div class="block book">
					<img src="images/covers/gp.jpg" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Гарри Поттер и философский камень</p>
						<p><b>Год: </b>1997</p>
						<p><b>Жанр: </b>фэнтези</p>
						<p><b>Автор: </b>Джоан Кэтлин Роулинг</p>
						<p><b>Средняя оценка: </b>9.5</p>
					</div>
				</div>
				<div class="block book">
					<img src="images/covers/gp.jpg" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Гарри Поттер и философский камень</p>
						<p><b>Год: </b>1997</p>
						<p><b>Жанр: </b>фэнтези</p>
						<p><b>Автор: </b>Джоан Кэтлин Роулинг</p>
						<p><b>Средняя оценка: </b>9.5</p>
					</div>
				</div>
				<div class="line-between">
					Фильмы
				</div>
				<div class="block film">
					<img src="images/covers/inception.jpg" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Начало</p>
						<p><b>Год: </b>2010</p>
						<p><b>Жанр: </b>фантастика, боевик, триллер, драма, детектив</p>
						<p><b>Режиссёр: </b>Кристофер Нолан</p>
						<p><b>Средняя оценка: </b>8.7</p>
					</div>
				</div>
				<div class="block film">
					<img src="images/covers/inception.jpg" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Начало</p>
						<p><b>Год: </b>2010</p>
						<p><b>Жанр: </b>фантастика, боевик, триллер, драма, детектив</p>
						<p><b>Режиссёр: </b>Кристофер Нолан</p>
						<p><b>Средняя оценка: </b>8.7</p>
					</div>
				</div>
				<div class="block film">
					<img src="images/covers/inception.jpg" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Начало</p>
						<p><b>Год: </b>2010</p>
						<p><b>Жанр: </b>фантастика, боевик, триллер, драма, детектив</p>
						<p><b>Режиссёр: </b>Кристофер Нолан</p>
						<p><b>Средняя оценка: </b>8.7</p>
					</div>
				</div>
				<div class="line-between">
					Музыка
				</div>
				<div class="block music">
					<img src="images/covers/smells.png" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Smells like teen spirit</p>
						<p><b>Год: </b>1991</p>
						<p><b>Жанр: </b>гранж</p>
						<p><b>Исполнитель: </b>Nirvanna</p>
						<p><b>Альбом: </b>Nevermind</p>
						<p><b>Средняя оценка: </b>8.9</p>
					</div>
				</div>
				<div class="block music">
					<img src="images/covers/smells.png" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Smells like teen spirit</p>
						<p><b>Год: </b>1991</p>
						<p><b>Жанр: </b>гранж</p>
						<p><b>Исполнитель: </b>Nirvanna</p>
						<p><b>Альбом: </b>Nevermind</p>
						<p><b>Средняя оценка: </b>8.9</p>
					</div>
				</div>
				<div class="block music">
					<img src="images/covers/smells.png" width="150px" height="220px">
					<div class="description">
						<p><b>Название: </b>Smells like teen spirit</p>
						<p><b>Год: </b>1991</p>
						<p><b>Жанр: </b>гранж</p>
						<p><b>Исполнитель: </b>Nirvanna</p>
						<p><b>Альбом: </b>Nevermind</p>
						<p><b>Средняя оценка: </b>8.9</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php 
		require_once('blocks/footer.php');
		mysqli_close($db); 
	?>
	<script src="/scripts/jquery-3.2.0.js"></script>
	<script src="/scripts/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="/scripts/index.js"></script>
</body>
</html>
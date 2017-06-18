<?php 
	require_once(__DIR__  . '/php/database_connection.php');
	$id = $_GET['id'];
	if (!isset($_GET['id']) && $isAuth) {
		header('Location: /users.php?id=' . $_SESSION['id'], true, 303 );
	} else {
		if ($id != $_SESSION['id']) {
			$result = mysqli_query($db, 'SELECT login FROM user WHERE user_id = ' . $id);

			if (!mysqli_num_rows($result)) {
				mysqli_close($db);
				exit('Указанного пользователя не существует<br><a href="/index.php">На главную</a>');
			}

				$result = mysqli_fetch_assoc($result);
				$text = 'Страница пользователя ' . $result['login'];
			} else {
			$text = 'Страница пользователя ' . $_SESSION['login'];
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Твоё хобби</title>
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/scripts/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" href="/css/users.css">
	
</head>

<body>
	<div id="wrapper">
		<?php require_once(__DIR__ . '/blocks/header.php'); ?>
		<div id="tabs">
			<ul>
				<li><a href="#tabs-1">Информация о пользователе</a></li>
				<li><a href="#tabs-2">Фильмы</a></li>
				<li><a href="#tabs-3">Книги</a></li>
				<li><a href="#tabs-4">Музыка</a></li>
			</ul>
			<div id="tabs-1">
				<div id="user-info" class="group">
					<ul class="left-column">
						<li><b>Логин: </b><span>Сергей</span></li>
						<li><b>Имя: </b><span>Петров</span></li>
						<li><b>Фамилия: </b><span>Петров</span></li>
						<li><b>E-mail: </b><span>sergey-gej@mail.ru</span></li>
						<li><b>На сайте с: </b><span>23.05.2017</span></li>
					</ul>
					<ul class="right-column">
						<li><b>Фильмов оценено: </b><span>15</span></li>
						<li><b>Книг оценено: </b><span>0</span></li>
						<li><b>Песен оценено: </b><span>4</span></li>
						<li><b>Рецензий оставлено: </b><span>2</span></li>
						<li><b>Средняя оценка: </b><span>5.7</span></li>
					</ul>
				</div>
			</div>
			<div id="tabs-2">
				<div id="user-films">
					<p class="title">Оценённые пользователем фильмы: </p>
					<table>
						<tr>
							<th>№</th>
							<th>Фильм</th>
							<th>Оценка</th>
							<th>Дата оценки</th>
						</tr>
						<tr onclick="window.location.href='/index.php'; return false">
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="tabs-3">
			  <div id="user-books">
					<p class="title">Оценённые пользователем книги: </p>
					<table>
						<tr>
							<th>№</th>
							<th>Книга</th>
							<th>Оценка</th>
							<th>Дата оценки</th>
						</tr>
						<tr onclick="window.location.href='/index.php'; return false">
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
					</table>
				</div>
			</div>
			<div id="tabs-4">
				<div id="user-books">
					<p class="title">Оценённая пользователем музыка: </p>
					<table>
						<tr>
							<th>№</th>
							<th>Песня</th>
							<th>Оценка</th>
							<th>Дата оценки</th>
						</tr>
						<tr onclick="window.location.href='/index.php'; return false">
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
						<tr>
							<td>1</td>
							<td>Мумия</td>
							<td>5</td>
							<td>25.08.2017</td>
						</tr>
					</table>
				</div>
			</div>
		</div>	
	</div>
	<?php require_once(__DIR__ . '/blocks/footer.php') ?>
	<script src="/scripts/jquery-3.2.0.js"></script>
	<script src="/scripts/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="/scripts/users.js"></script>
</body>
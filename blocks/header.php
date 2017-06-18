<!-- Шапка сайта -->

<link rel="stylesheet" type="text/css" href="/css/header.css">
<div class="header">
	<div class="header-top">
		<a href="/index.php">Твоё хобби</a>
	</div>
	<div id="menu">
		<ul>
			<li><a href="films.php">Фильмы</a>
				<ul class="submenu">
					<li><a href="/films.php/?mode=all">Все фильмы</a></li>
					<li><a>Мои фильмы</a></li>
					<li><a href="/add_film.php">Добавить фильм</a></li>
				</ul>
			</li>
			<li><a href="#">Книги</a>
				<ul class="submenu">
					<li><a>Пункт4</a></li>
					<li><a>Пункт5</a></li>
					<li><a>Пункт6</a></li>
				</ul>
			</li>
			<li><a href="#">Музыка</a>
				<ul class="submenu">
					<li><a>Пункт7</a></li>
					<li><a>Пункт8</a></li>
					<li><a>Пункт9</a></li>
				</ul>
			</li>
			<li><a href="#">Сообщество</a>
				<ul class="submenu">
					<li><a>Пункт10</a></li>
					<li><a>Пункт11</a></li>
					<li><a>Пункт12</a></li>
				</ul>
			</li>
		</ul>
		<form action="#" method="POST" id="quick_search">
			<input type="submit" name="submit" value="">
			<input type="text" name="quick_search" placeholder="Поиск книг, фильмов, музыки">
			<select name="type">
				<option>Везде</option>
				<option>Фильм</option>
				<option>Книга</option>
				<option>Музыка</option>
			</select>			
		</form>
	</div>
	<div id="greeting">
		<h3>
			<?php 
				echo $text;
				echo '<span id="links">';
				if  ($isAuth) {

					echo '<a id="signout"; href="/php/signout.php">Выход</a>';
				} else if ($text != 'Регистрация' && $text != 'Вход'
							&& $text != 'Добавление нового фильма') { 	
					echo '<span id="links">';
					echo '<a id="signin" href="/signin.php">Войти</a>
					<a href="/signup.php">Зарегистрироваться</a>';
				}
				echo '</span>';
			?>
		</h3>
	</div>
</div>
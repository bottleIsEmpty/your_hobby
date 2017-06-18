<link href="/css/search.css" rel="stylesheet">
<div id="search">
	<div id="search-top">Точный поиск</div>
	<div id="search-main">
		<form action="" method="POST" id="search-form">
			<p>Тип:
				<select name="type" class="search-field">
					<option>Фильм</option>
					<option>Книга</option>
					<option>Музыка</option>
				</select>
			</p>
			<p>Год: 
				<span class="small-input">
					<input type="number" id="year-bottom" class="small-field" min="1930" max="2017"> —
					<input type="number" id="year-top" class="small-field" min="1930" max="2017">
				</span>
			</p>
			<div id="year-slider"></div>
			<p>Жанр:
				<select name="genre" class="search-field">
					<option>Все</option>
					<option>Комедия</option>
					<option>Драма</option>
					<option>Блокбастер</option>
					<option>Криминал</option>
					<option>Вестерн</option>
					<option>Триллер</option>
					<option>Ужасы</option>
				</select>
			</p>
			<p>Оценка:
				<span class="small-input">
					<input type="number" id="rating-bottom" class="small-field" min="1" max="10"> —
					<input type="number" id="rating-top" class="small-field" min="1" max="10"><br>
				</span>
			</p>
			<div id="rating-slider"></div>
			<input type="submit" value="Поиск" id="search-button">
		</form>
	</div>
</div>
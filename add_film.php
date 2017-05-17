<!DOCTYPE html>
<html>
<head>
	<title>Добавить фильм</title>
	<link rel="stylesheet" type="text/css" href="css/add_film.css">
	<link rel="stylesheet" type="text/css" href="scripts/jquery-ui-1.12.1.custom/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
	<div id="wrapper">
		<?php
			require_once('php/database_connection.php');
			$text = "Добавление нового фильма";
			require_once('blocks/header.php');
		?>
		<div id="content">
		    <div id="form-shadow">
		        <div id="add-form" class="group">
		            <div id="text-fields">
                        <form id="film-form" method="POST">
                            <ul>
                                <li><b>Название:</b><input type="text"></li>
                                <li><b>Тип:</b>
                                    <p>
                                        <input type="radio" name="type" checked>Фильм
                                        <input type="radio" name="type">Сериал
                                        <input type="radio" name="type">Мультфильм
                                    </p>
                                </li>
                                <li><b>Жанры:</b>
                                   <input type="text" id="genre" disabled>
                                   <button type="button" id="add-genre" onclick="addGenre()"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                   <button type="button" onclick="removeGenre()" id="remove-genre"><i class="fa fa-minus" aria-hidden="true"></i></button>
                                    
                                </li>
                                <li>Добавить жанр: 
                                    <select id="add-genre-field">
                                        <option value="Драма">Драма</option>
                                        <option value="Комедия">Комедия</option>
                                        <option value="Ужасы">Ужасы</option>
                                        <option value="Для детей">Для детей</option>
                                        <option value="Вестерн">Вестерн</option>
                                        <option value="Боевик">Боевик</option>
                                        <option value="Триллер">Триллер</option>
                                        <option value="Аниме">Аниме</option>
                                    </select>
                                </li>
                                <li><b>Год:</b><input type="number" value="2017"></li>
                                <li><b>Режиссёр:</b><input type="text" id="director-field">
                                <div id="quicksearch">
									<ul>
										<li>пока что ничего нет</li>
										<li>Запись намба ту</li>
									</ul>
                                </div>
                                </li>
                                
                                <center>
                                    <sup>Не нашли нужного режиссёра? <a href="#" onclick="openWindow()">Добавить режиссёра</a>
                                    </sup>
                                </center>
                                <li><b>Постер:</b><input type="file" id="film-logo"></li>
                                <li>
                                	<b>Описание:</b>
                                	<textarea name="description" id="" cols="30" rows="10"></textarea>
                            </ul>
                            <button type="submit" id="add-film">Добавить фильм</button>
		                </form>
		            </div>
		            <div id="block-logo">
		            <img id="logo" src="images/noposter.jpg" width="200">
		            	<sub id="delete-logo">
		            		<a href="#" onclick="removeLogo()">Удалить логотип</a>
		            	</sub>
		            </div>
		        </div>
		    </div>
		</div>
		<div id="add-director-form">
            <a onclick="closeWindow()"><i class="fa fa-times" aria-hidden="true"></i></a>
            <div id="title">Добавить режиссёра</div>
            <div id="add-director-block">
            	<div id="block-photo">
					<img src="images/nophoto.jpg" width="200px" id="photo">
					<sub id="delete-photo"><a href="#" onclick="removePhoto()">Удалить фото</a></sub>
            	</div>
				<form action="" id="add-director">
					<ul>
						<li><b>Имя: </b><input type="text" id="dir-name"></li>
						<li><b>Фамилия: </b><input type="text" id="dir-surname"></li>
						<li><b>Фото: </b><input type="file" id="dir-photo"></li>
					</ul>
					<p id="error"></p>
					<button type="submit">Добавить</button>
				</form>
            </div>
        </div>
	</div>
	<?php require_once("blocks/footer.php") ?>
	<script src="scripts/jquery-3.2.0.js"></script>
	<script src="scripts/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="scripts/add_film.js"></script>
</body>
</html>
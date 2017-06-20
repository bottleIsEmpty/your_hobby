<?php 
	require_once(__DIR__  . '/php/database_connection.php');
	$mode = $_GET['mode'];
	if ($mode == '') {
		header( 'Location: /films.php?mode=all', true, 301 );
	}
?>
<!DOCTYPE html>
<html>

<head>
	<title>Твоё хобби</title>
	<link rel="stylesheet" href="/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/jstarbox.css">
	<link rel="stylesheet" href="/css/films.css">
	<link rel="stylesheet" href="/scripts/jquery-ui-1.12.1.custom/jquery-ui.css">
</head>

<body>
	<div id="wrapper" class="group">
		<?php
			$text = ($mode === 'all') ? "Все фильмы" : "Информация о фильме"; 
		 	require_once(__DIR__  . '/blocks/header.php');
			require_once(__DIR__ . '/blocks/items.php');
		?>

			<div id="content">
				<?php
				if ($mode === 'all'):
				
					$query = "SELECT * FROM movies INNER JOIN directors ON movies.director = directors.director_id";
				
					$result = mysqli_query($db, $query);
					
					require_once(__DIR__ . '/blocks/search.php');
				?>
				<div id="main">
				<?php
					while($row = mysqli_fetch_assoc($result)) {
						createFilmItem($row['movie_id'], $row['title'], $row['year'], $row['genre'], $row['name'] . ' ' . $row['surname'], $row['rating'], $row['poster']);
					}
				?>
				</div>
				
				
				<?php
				//страница отдельного фильма
			
				elseif ($mode === 'film'):
					$filmID = $_GET['id'];
				
					/*Получение информации о фильме*/	
				
					$query = "SELECT * FROM movies INNER JOIN directors ON movies.director = directors.director_id WHERE movie_id = $filmID";
				
					$result = mysqli_query($db, $query);
					$info = mysqli_fetch_assoc($result);
					
            	?>
					<div id="info-block" class="group">
						<div id="left-block">
							<div id="logo">
								<img src="/images/uploads/films/<?php echo $info['poster']; ?>" width="200px">
							</div>
							<div id="grade">
								Средняя оценка: <b><?php echo $info['rating']; ?></b><br> (Оценило: <span><b><?php echo $info['rated_by']; ?></b></span>)
							</div>
						</div>
						<div id="info">
							<ul id="info-text">
								<div id="rating-block">
									<div class="rating">
									</div>
									<p id="mark-text">Ваша оценка</p>
								</div>
								<li><b>Название: </b><?php echo $info['title']; ?></li>
								<li><b>Год: </b><?php echo $info['year']; ?></li>
								<li><b>Режиссёр: </b><?php echo $info['name'] . ' ' .  $info['surname']; ?></li>
								<li><b>Жанры: </b><?php echo $info['genre']; ?></li>
								<li><b>Описание: </b>
									<div><?php echo $info['description']; ?></div>
								</li>
							</ul>
						</div>
					</div>
					<div class="line-between"><b>Рецензии пользователей</b></div>
					<div class="comment-block">
						<div class="comment-info group">
							<div class="user-info">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<a href="#">username</a>
								<span> (Всего рецензий: <span>20</span>)</span>
							</div>
							<div class="comment-time">
								23.03.2017 27:15
							</div>
						</div>
						<div class="comment">
							<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati beatae mollitia maxime debitis voluptatem omnis architecto quis maiores, vitae magni molestias animi vel harum minima, eveniet fuga dicta provident ullam.</div>
							<div>Autem, dolorem. Culpa perferendis at laboriosam. Eligendi, necessitatibus? Odit in unde quasi. Iste, consectetur nostrum molestias. Impedit non, voluptas, harum quae ea illum, in sed, sunt ullam voluptate sit magni.</div>
						</div>
					</div>
					<div class="comment-block">
						<div class="comment-info group">
							<div class="user-info">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<a href="#">username</a>
								<span> (Всего рецензий: <span>20</span>)</span>
							</div>
							<div class="comment-time">
								23.03.2017 27:15
							</div>
						</div>
						<div class="comment">
							<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati beatae mollitia maxime debitis voluptatem omnis architecto quis maiores, vitae magni molestias animi vel harum minima, eveniet fuga dicta provident ullam.</div>
							<div>Autem, dolorem. Culpa perferendis at laboriosam. Eligendi, necessitatibus? Odit in unde quasi. Iste, consectetur nostrum molestias. Impedit non, voluptas, harum quae ea illum, in sed, sunt ullam voluptate sit magni.</div>
						</div>
					</div>
					<div class="comment-block">
						<div class="comment-info group">
							<div class="user-info">
								<i class="fa fa-user-o" aria-hidden="true"></i>
								<a href="#">username</a>
								<span> (Всего рецензий: <span>20</span>)</span>
							</div>
							<div class="comment-time">
								23.03.2017 27:15
							</div>
						</div>
						<div class="comment">
							<div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Obcaecati beatae mollitia maxime debitis voluptatem omnis architecto quis maiores, vitae magni molestias animi vel harum minima, eveniet fuga dicta provident ullam.</div>
							<div>Autem, dolorem. Culpa perferendis at laboriosam. Eligendi, necessitatibus? Odit in unde quasi. Iste, consectetur nostrum molestias. Impedit non, voluptas, harum quae ea illum, in sed, sunt ullam voluptate sit magni.</div>
						</div>
					</div>
					<div class="line-between">Оставить рецензию</div>
					<div id="comment-field">
						<form action="">
							<textarea id="comment-text" <?php if (!$isAuth) echo 'disabled placeholder="Авторизуйтесь, чтобы оставить рецензию"'; ?>
				></textarea>
							<button>Оставить рецензию</button>
						</form>
					</div>
				<?php endif; ?>
			</div>
	</div>

	<?php 
		require_once(__DIR__ . '/blocks/footer.php'); 
		mysqli_close($db);
	?>

	<script src="/scripts/jquery-3.2.0.js"></script>
	<script src="/scripts/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<script src="/scripts/jstarbox.js"></script>
	<script src="/scripts/films.js"></script>

</body>

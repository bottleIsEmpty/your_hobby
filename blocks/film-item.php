<?php
	function createFilmItem($title, $year, $genre, $director, $rating, $logo)
	{
		$logo = ($logo == '') ? '/images/noposter.jpg' : '/images/uploads/films/' . $logo;
?>
		<div class="block film">
		<img src="<?php echo $logo; ?>" width="150px" height="220px">
			<div class="description">
				<p><b>Название: </b><?php echo $title; ?></p>
				<p><b>Год: </b><?php echo $year; ?></p>
				<p><b>Жанр: </b><?php echo $genre ?></p>
				<p><b>Режиссёр: </b><?php echo $director; ?></p>
				<p><b>Средняя оценка: </b><?php echo $rating; ?></p>
			</div>
		</div> 
<?php		
	}
?>

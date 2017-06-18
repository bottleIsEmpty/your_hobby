<link rel="stylesheet" href="/css/items.css">

<?php
	function createFilmItem($id, $title, $year, $genre, $director, $rating, $logo)
	{
		$logo = ($logo == '') ? '/images/noposter.jpg' : '/images/uploads/films/' . $logo;
?>
		<div class="block film group">
			<img src="<?php echo $logo; ?>" width="150px" height="220px">
				<div class="description">
					<p><b>Название: </b><a href="/films.php?mode=film&id=<?php echo $id; ?>"><?php echo $title; ?></a></p>
					<p><b>Год: </b><?php echo $year; ?></p>
					<p><b>Жанр: </b><?php echo $genre ?></p>
					<p><b>Режиссёр: </b><?php echo $director; ?></p>
					<p><b>Средняя оценка: </b><?php echo $rating; ?></p>
				</div>
		</div> 
<?php		
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Тест хуйни</title>
	<script src="scripts/jquery-3.2.0.js"></script>
</head>
<body>
	<form id="form" method="POST">
		<input type="text" name="text">
		<input type="submit" name="button">
	</form>
	<?php
	require_once('php/database_connection.php');

	$query = 'SELECT * FROM user';

	$result = mysqli_query($db, $query);
	while ($row = mysqli_fetch_assoc($result)) {
		echo $row['name'] . ' ' . $row['surname'] . '<br>';
	}
	?>
</body>
</html>	
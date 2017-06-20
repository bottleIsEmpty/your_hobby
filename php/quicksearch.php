<?php
	require_once('database_connection.php');
	$answer = array();
	if (!empty($_GET['term'])) {
		$query = "SELECT CONCAT (name, ' ', surname) AS full_name FROM {$_GET['table']} WHERE name LIKE '%{$_GET['term']}%' OR surname LIKE '%{$_GET['term']}%'";
		$result = mysqli_query($db, $query);
		while ($row = mysqli_fetch_assoc($result)) {
			$answer[] = array('label' => $row['full_name']);
		}
	}
	
	mysqli_close($db);
	exit(json_encode($answer));
?>


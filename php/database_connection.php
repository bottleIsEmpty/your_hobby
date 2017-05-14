<?php 
	require_once('app_config.php');

	$db = mysqli_connect(DATABASE_HOST, DATABASE_LOGIN, DATABASE_PASSWORD, DATABASE_NAME)
		or die ('DATABASE CONNECTION ERROR');
	mysqli_set_charset($db, 'utf-8');

	if (!session_start()) {
		die ("Ошибка сессии");
	}
?>
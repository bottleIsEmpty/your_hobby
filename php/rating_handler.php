<?php
require_once(__DIR__ . '/database_connection.php');

$rating = $_POST['rating'];
$movieId = $_POST['id'];
$userId = $_SESSION['id'];

$query = "SELECT * FROM movie_rating WHERE movie = '$movieId' AND user = '$userId'";

$result = mysqli_query($db, $query);

if (!mysqli_num_rows($result)) {
	$query = "INSERT INTO movie_rating VALUES ('$movieId', '$userId', '', '$rating')"
} else {
	$query = "UPDATE movie_rating SET ";
}
mysqli_close($db);
?>
<?php
	// 1. Create a database connection
	require_once("config.php");

	$firstName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstName']));
	$lastName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastName']));
	$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));
	
	// 2. Perform database query
	$query  = "INSERT INTO contacts (firstName, lastName, email) VALUES ('$firstName','$lastName','$email')";
	$result = mysqli_query($connection, $query);

	// 5. Close database connection
	mysqli_close($connection);

	header("Location: ../pledges.php");
?>
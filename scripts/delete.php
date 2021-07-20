<?php
	// 1. Create a database connection
	require_once("config.php");
	
	if (isset($_GET['counter']) && is_numeric($_GET['counter'])) {
		// get counter value
		$counter = $_GET['counter'];
	
		// delete the entry
		$result = mysqli_query($connection, "DELETE FROM contacts WHERE counter=$counter");
	
		// redirect back to the homepage to see the results
		header("Location: ../pledges.php");
	
	} else {
		// if counter isn't set, or isn't valid, redirect back to homepage
		header("Location: ../pledges.php");
	}
	
	// 4. Step 4 is unnecessary here because we didn't 
	//	  get data that needs to be released
	//mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>
<?php
	include('renderform.php');

	// 1. Create a database connection
	//    use external file *instead of* including db credentials here
	require_once("config.php");

// check if the form (from renderform.php) has been submitted. If it has, process the form and save it to the database
if (isset($_POST['submit'])) {
	// confirm that the 'counter' value is a valcounter integer before getting the form data
	if (is_numeric($_POST['counter'])) {
		// get form data, making sure it is valcounter
		$counter = $_POST['counter'];
		$firstName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['firstName']));
		$lastName = mysqli_real_escape_string($connection, htmlspecialchars($_POST['lastName']));
		$email = mysqli_real_escape_string($connection, htmlspecialchars($_POST['email']));

		// check that firstName/lastName fields are both filled in
		if ($firstName == '' || $lastName == '' || $email =='') {
			// generate error message
			$error = 'ERROR: Please fill in all required fields!';

			//error, display form
			renderForm($counter, $firstName, $lastName, $email, $error);

		} else {
			// save the data to the database
			$result = mysqli_query($connection, "UPDATE contacts SET firstName='$firstName', lastName='$lastName', email='$email'  WHERE counter='$counter'");

			if ($result) {
				echo "Success! - the query seemed to work! (At least it didn't error-out.)";
				echo "<br><br>MySQL affected rows: " . mysqli_affected_rows($connection);
			} else {
				die("Database query failed.");
			}

			// once saved, redirect back to the homepage page to view the results
			header("Location: ../pledges.php");
		}
	} else {
		// if the 'counter' isn't valcounter, display an error
		echo 'Error!';
	}
} else {
	// if the form (from renderform.php) hasn't been submitted yet, get the data from the db and display the form
	// get the 'counter' value from the URL (if it exists), making sure that it is valcounter (checing that it is numeric/larger than 0)
	if (isset($_GET['counter']) && is_numeric($_GET['counter']) && $_GET['counter'] > 0) {
		// query db
		$counter = $_GET['counter'];
		$result = mysqli_query($connection, "SELECT * FROM contacts WHERE counter=$counter");
		$data = mysqli_fetch_array( $result );

		// check that the 'counter' matches up with a row in the databse
		if($data) {
			// get data from db
			$firstName = $data['firstName'];
			$lastName = $data['lastName'];
			$email = $data['email'];

			// show form
			renderForm($counter, $firstName, $lastName, $email, '');
		} else {
			// if no match, display result
			echo "No results!";
		}
	} else {
		// if the 'counter' in the URL isn't valcounter, or if there is no 'counter' value, display an error
		echo 'Error!';
	}
}
?>
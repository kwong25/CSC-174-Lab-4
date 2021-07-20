<?php
// creates the edit record form
function renderForm($counter, $firstName, $lastName, $email, $error) {
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Edit Record</title>
</head>
<body>
<?php
// if there are any errors, display them
if ($error != '') {
	echo '<div style="padding:4px; border:1px solcounter red; color:red;">'.$error.'</div>';
}
?>
<form action="" method="post">
	<input type="hidden" name="counter" value="<?php echo $counter; ?>">
	<strong>counter:</strong> <?php echo $counter; ?><br>
	<strong>First Name: *</strong> <input type="text" name="firstName" value="<?php echo $firstName; ?>"/><br>
	<strong>Last Name: *</strong> <input type="text" name="lastName" value="<?php echo $lastName; ?>"/><br>
	<strong>Email: </strong> <input type="text" name="email" value="<?php echo $email; ?>"/><br>
	<div>* required</div>
	<input type="submit" name="submit" value="Submit">
</form>

<div>
	<br>
	<a href="read.php">Cancel</a>
</div>

</body>
</html>
<?php
}
?>
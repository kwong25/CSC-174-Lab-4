<?php
require_once("scripts/config.php");
$query  = "SELECT * FROM contacts";
$result = mysqli_query($connection, $query);
?>


<?php 
    $Title="Join the Movement!";
    $PageCSS="
    <link rel='stylesheet' href='css/article-page.css'>
    ";
    $PageCSS2="
    <link rel='stylesheet' href='css/form-page.css'>
    ";

    include "inc/top.php"; 
    include("scripts/config.php");

?>
        
        </div>
        <h2 class="form-header">Join the Movement!</h2>
        <div class="container">

            <p class="form-tag">See who's already made the pledge to never visit Phoenix:</p>
            <table>
                <tr>
                    <th>Pledger #</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                <?php
                    // 3. Use returned data (if any)
                    while($data = mysqli_fetch_assoc($result)) {
                ?>  
                <tr>
                    <td><?php echo $data["counter"]; ?></td>
                    <td><?php echo $data["firstName"]; ?></td>
                    <td><?php echo $data["lastName"]; ?></td>
                    <td><?php echo $data["email"]; ?></td>
                    <td><a href="scripts/update.php?counter=<?php echo $data['counter']; ?>">Edit</a></td>
                    <td><a onclick="return confirm('Are you sure you want to delete pledge number <?php echo $data["counter"]; ?>?')" href="scripts/delete.php?counter=<?php echo $data['counter']; ?>">Delete</a></td>
                </tr>
    <?php } ?>
            </table>
        </div>
<?php include "inc/bottom.php"; ?><?php

	// 4. Release returned data
	mysqli_free_result($result);

	// 5. Close database connection
	mysqli_close($connection);
?>


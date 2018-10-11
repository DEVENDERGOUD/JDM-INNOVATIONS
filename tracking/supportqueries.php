<?php session_start();
include("config.php");

 if(isset($_SESSION['UserName']))
 {
 $getsupportqueries = "SELECT * FROM supportqueries us left join users u on u.UserId = us.UserId";
 $supportqueries=$mysqli->query($getsupportqueries);
 include 'includes/header.php';?>
           <div class="container">
           <h1 class="form-heading"> Support Queries </h1> 
            <table class="table table-bordered table-striped">
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Query</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($supportqueries))
                {
                    echo "<tr>";
                    echo "<td>" . $row['FirstName'] . "</td>";
                    echo "<td>" . $row['LastName'] . "</td>";
                    echo "<td>" . $row['query'] . "</td>";
                    echo "</tr>";
                }
                ?>
          </table>
           </div>
		<?php

	 }
	else {
	 	echo 'You are not logged In <br>';
		echo'<a href="index.php">LOGIN</a>';

	 }
?>



</html>

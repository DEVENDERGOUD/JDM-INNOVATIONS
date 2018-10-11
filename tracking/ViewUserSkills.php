<?php session_start();
include("config.php");
 if(isset($_SESSION['UserName']))
 {
 $getuserskills = "SELECT * FROM userskills us inner join users u on u.UserId = us.UserId where u.CompanyId =".$_SESSION['CompanyId'];
 $skills=$mysqli->query($getuserskills);
 include 'includes/header.php';?>
 
           <div class="container">
					 <h1 class="form-heading"> User Skills </h1> 
            <table class="table table-bordered table-striped text-white">
                <tr>
                  <th>Firstname</th>
                  <th>Lastname</th>
                  <th>Academic</th>
                  <th>Technical</th>
                  <th>Organizational</th>
                  <th>Human Relations</th>
                  <th>Problem Solving</th>
                  <th>Accountability</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($skills))
                {
                    echo "<tr>";
                    echo "<td>" . $row['FirstName'] . "</td>";
                    echo "<td>" . $row['LastName'] . "</td>";
                    echo "<td>" . $row['academic'] . "</td>";
                    echo "<td>" . $row['technical'] . "</td>";
                    echo "<td>" . $row['Organizational'] . "</td>";
                    echo "<td>" . $row['HumanRelations'] . "</td>";
                    echo "<td>" . $row['ProblemSolving'] . "</td>";
                    echo "<td>" . $row['Accountability'] . "</td>";
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

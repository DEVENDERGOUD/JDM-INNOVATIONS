<?php session_start();
include("config.php");

 if(isset($_SESSION['UserName']))
 {
    $organizations = "SELECT * FROM organization where isActive=1 and organizationid not in(-1)";

 $orglist=$mysqli->query($organizations);
 include 'includes/header.php';?>
           <div class="container">
               
           <div class="title-container">
           <div class="row">
               <div class="col-10">
               <strong> Skill Areas </strong>
                </div> 
               <div class="col-2">
               <button class="btn btn-primary" data-toggle="modal" data-target="#CreateOrganization" type="button">Create</button>
               </div>
            </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                  <th>Organization Name</th>
                  <th>Actions</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($orglist))
                {
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td class='text-primary'><a href='editorg.php?id=".$row['OrganizationId']."'><i class='fa fa-pencil pl-2 pr-2'></i></a><a href='deleteorg.php?id=".$row['OrganizationId']."'>
                    <i class='fa fa-trash pr-2' id='deleteskillarea'></i></a></td>";
                    echo "</tr>";
                }
                ?>
          </table>
           </div>
           <div class="modal fade" id="CreateOrganization" tabindex="-1" role="dialog" aria-labelledby="CreateOrganization" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="CreateOrganization">Create Organization</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="adminlogin" action="createorg.php"  method="post" >

                    <div class="form-group">
                        <input type="text" class="form-control" id="organizationname"  name="organizationname"  placeholder="Enter Organization Name">
                    </div>
                    <button type="submit" class="btn btn-primary" id="organizationbutton" name="organizationbutton">Create</button>
                    </form>
				</div>
				</div>
			</div>
			</div>
		<?php

	 }
	else {
	 	echo 'You are not logged In <br>';
		echo'<a href="index.php">LOGIN</a>';

	 }
?>
</html>

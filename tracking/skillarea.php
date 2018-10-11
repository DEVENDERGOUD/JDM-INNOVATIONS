<?php session_start();
include("config.php");

 if(isset($_SESSION['UserName']))
 {
 if($_SESSION['UserName']=='admin@gmail.com')
 {
    $getskillareas = "SELECT * FROM skillarea where isActive=1";
 }
 
 $skillsreas=$mysqli->query($getskillareas);
 include 'includes/header.php';?>
           <div class="container">
               
           <div class="title-container">
           <div class="row">
               <div class="col-10">
               <strong> Skill Areas </strong>
                </div> 
               <div class="col-2">
               <button class="btn btn-primary" data-toggle="modal" data-target="#CreateSkillArea" type="button">Create</button>
               </div>
            </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                  <th>Skill Area</th>
                  <th>Actions</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($skillsreas))
                {
                    echo "<tr>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td class='text-primary'><a href='editskillarea.php?id=".$row['SkillAreaId']."'><i class='fa fa-pencil pl-2 pr-2'></i></a><a href='deleteskillarea.php?id=".$row['SkillAreaId']."'>
                    <i class='fa fa-trash pr-2' id='deleteskillarea'></i></a></td>";
                    echo "</tr>";
                }
                ?>
          </table>
           </div>
           <div class="modal fade" id="CreateSkillArea" tabindex="-1" role="dialog" aria-labelledby="CreateSkillArea" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="CreateSkillArea">Create Skill Area</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="adminlogin" action="createskillareadb.php"  method="post" >

                    <div class="form-group">
                        <input type="text" class="form-control" id="skillareaname"  name="skillareaname"  placeholder="Enter Skill Area">
                    </div>
                    <button type="submit" class="btn btn-primary" id="skillareabutton" name="skillareabutton">Create</button>
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

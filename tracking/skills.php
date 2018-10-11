<?php session_start();
include("config.php");

 if(isset($_SESSION['UserName']))
 {
    $getskill = "SELECT s.skillid as skillid,sa.name as skillarea,s.skillname as skill FROM skills s
    inner join skillarea sa on sa.skillareaid=s.skillareaid
    where s.isActive=1 and sa.isActive=1";
// echo ($getskill);
 $skills=$mysqli->query($getskill);
 $getskillareas = "SELECT * FROM skillarea where isActive=1";
 $skillsreas=$mysqli->query($getskillareas);
 include 'includes/header.php';?>
           <div class="container">
               
           <div class="title-container">
           <div class="row">
               <div class="col-10">
               <strong> Skills </strong>
                </div> 
               <div class="col-2">
               <button class="btn btn-primary" data-toggle="modal" data-target="#CreateSkill" type="button">Create</button>
               </div>
            </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                  <th>Skill</th>
                  <th>Skill Area</th>
                  <th>Actions</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($skills))
                {
                    echo "<tr>";
                    echo "<td>" . $row['skillarea'] . "</td>";
                    echo "<td>" . $row['skill'] . "</td>";
                    echo "<td class='text-primary'><a href='editskill.php?id=".$row['skillid']."'><i class='fa fa-pencil pl-2 pr-2'></i></a><a href='deleteskill.php?id=".$row['skillid']."'>
                    <i class='fa fa-trash pr-2' id='deleteskill'></i></a></td>";
                    echo "</tr>";
                }
                ?>
          </table>
           </div>
           <div class="modal fade" id="CreateSkill" tabindex="-1" role="dialog" aria-labelledby="CreateSkill" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="CreateSkill">Create Skill Area</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="adminlogin" action="createskill.php"  method="post" >
                    <div class="form-group">
							  <label for="selectskillarea">Skill Area </label>
								<select name="skillarea"  id="selectskillarea" class="form-control">
								<?php
								while ($row = $skillsreas->fetch_assoc()){
								echo "<option value=". $row['SkillAreaId'] .">" . $row['Name'] . "</option>";
								}?>
								</select>
					</div>
                    <div class="form-group">
                        <input type="text" class="form-control" id="skillname"  name="skillname"  placeholder="Enter Skill">
                    </div>

                    <button type="submit" class="btn btn-primary" id="skillbutton" name="skillbutton">Create</button>
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

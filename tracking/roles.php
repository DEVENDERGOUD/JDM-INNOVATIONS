<?php session_start();
include("config.php");

 if(isset($_SESSION['UserName']))
 {
    $getroles = "SELECT r.roleid as roleid,RoleName,Level,PositionCode,r.OrganizationId,org.Name as orgName,(SELECT GROUP_CONCAT(skillname) FROM roleandskills rs left join skills s on s.skillid=rs.skillid where RoleId=r.RoleId group by RoleId) as skills FROM roles r inner join organization org on org.organizationid=r.organizationid where r.isActive=1";
 $roles=$mysqli->query($getroles);
 $getskills = "SELECT * FROM skills where isActive=1";
 $skills=$mysqli->query($getskills);
 $getorganizations = "SELECT * FROM organization where isActive=1 and organizationid not in (-1)";
 $organizations=$mysqli->query($getorganizations);
 include 'includes/header.php';?>
           <div class="container">
               
           <div class="title-container">
           <div class="row">
               <div class="col-10">
               <strong> Roles </strong>
                </div> 
               <div class="col-2">
               <button class="btn btn-primary" data-toggle="modal" data-target="#CreateRole" type="button">Create</button>
               </div>
            </div>
            </div>
            <table class="table table-bordered table-striped">
                <tr>
                  <th>Role Name</th>
                  <th>Organisation</th>
                  <th>Skills</th>
                  <th>Level</th>
                  <th>Position Code</th>
                  <th>Actions</th>
                </tr>

                <?php
                while($row = mysqli_fetch_array($roles))
                {
                    echo "<tr>";
                    
                    echo "<td>" . $row['RoleName'] . "</td>";
                    echo "<td>" . $row['orgName'] . "</td>";
                    echo "<td>" . $row['skills'] . "</td>";
                    echo "<td>" . $row['Level'] . "</td>";
                    echo "<td>" . $row['PositionCode'] . "</td>";
                    echo "<td class='text-primary'><a href='editrole.php?id=".$row['roleid']."'><i class='fa fa-pencil pl-2 pr-2'></i></a><a href='deleterole.php?id=".$row['roleid']."'>
                    <i class='fa fa-trash pr-2' id='deleteskill'></i></a></td>";
                    echo "</tr>";
                }
                ?>
          </table>
           </div>
           <div class="modal fade" id="CreateRole" tabindex="-1" role="dialog" aria-labelledby="CreateRole" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="CreateRole">Create Role</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
                    <form id="adminlogin" action="createrole.php"  method="post" >
                    <div class="form-group">
							  <label for="selectskill">Skills</label>
								<select name="skills[]" multiple  id="selectskill" class="form-control">
								<?php
								while ($row = $skills->fetch_assoc()){
								echo "<option value=". $row['SkillId'] .">" . $row['SkillName'] . "</option>";
								}?>
								</select>
                    </div>
                    <div class="form-group">
							  <label for="organizations">Organization</label>
								<select name="organizations"  id="organizations" class="form-control">
								<?php
								while ($row = $organizations->fetch_assoc()){
								echo "<option value=". $row['OrganizationId'] .">" . $row['Name'] . "</option>";
								}?>
								</select>
                    </div>
                    
                    
                    <div class="form-group">
                        <input type="text" class="form-control" id="Role Name"  name="rolename"  placeholder="Enter Role Name">
                    </div>

                    <div class="form-group">
                        <input type="float" class="form-control" id="level"  name="rolelevel"  placeholder="Enter Level">
                    </div>

                    <button type="submit" class="btn btn-primary" id="rolebutton" name="rolebutton">Create</button>
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

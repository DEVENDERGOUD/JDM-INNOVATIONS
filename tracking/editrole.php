<?php
session_start();
require('config.php');
if(isset($_SESSION['UserName'])){
$id=$_REQUEST['id'];
$query = "SELECT * from roles where roleid=".$id.""; 
$result = $mysqli->query($query);
$rollrow = mysqli_fetch_assoc($result);
$orgid=$rollrow['OrganizationId'];
$getskills = "SELECT * FROM skills where isActive=1";
$skills=$mysqli->query($getskills);
$getorganizations = "SELECT * FROM organization where isActive=1 and organizationid not in (-1)";
$organizations=$mysqli->query($getorganizations);
$getselectedskills = "SELECT skillid FROM roleandskills rs inner join roles r on rs.roleid=r.roleid and r.isActive=1 and rs.roleid=".$rollrow['RoleId'];
$results=$mysqli->query($getselectedskills);
$selectedskills= mysqli_fetch_array($results,MYSQLI_NUM);
include 'includes/header.php';
?> 
<script>

</script>
      <div class="container">
               
               <div class="title-container">
             <div class="row">
               <div class="col-10">
               <strong> Update Role</strong>
                </div> 
               <div class="col-2">
               <a href="roles.php"> <button class="btn btn-primary">List</button></a>
               </div>
            </div>
</div>
<form id="adminlogin" action=""  method="post" >
                    <div class="form-group">
							  <label for="selectskill">Skills</label>
								<select name="skills[]" multiple  id="selectskill" class="form-control">
                                <?php
                                
								while ($row = $skills->fetch_assoc()){
                                    if(in_array($row['SkillId'],$selectedskills)){
                                        echo "<option value=". $row['SkillId'] ." selected>" . $row['SkillName'] ."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=". $row['SkillId'] .">" . $row['SkillName'] ."</option>";
                                    }
                                   
								}?>
								</select>
                    </div>
                    <div class="form-group">
							  <label for="organizations">Organization</label>
								<select name="organizations"  id="organizations" class="form-control">
								<?php
								while ($row = $organizations->fetch_assoc()){
                                    if($row['OrganizationId']==$orgid){
                                        echo "<option value=". $row['OrganizationId'] ." selected='selected'>" . $row['Name'] ."</option>";
                                    }
                                    else
                                    {
                                        echo "<option value=". $row['OrganizationId'] .">" . $row['Name'] ."</option>";
                                    }
                                   
								}?>
								</select>
                    </div>
                    <div class="form-group">
                    <input type="text" class="form-control" name="rolename" placeholder="Enter Name" 
                    required value="<?php echo $rollrow['RoleName'];?>" />
                    </div>
                    
                    <div class="form-group">
                    <input type="text" class="form-control" name="rolelevel" placeholder="Enter Role Level" 
                    required value="<?php echo $rollrow['Level'];?>" />
                    </div>
                    <button type="submit" class="btn btn-primary" id="rolebutton" name="updaterole">Update</button>
                    </form>
</div>
<?php 
if(isset($_POST['updaterole']))
{   
    $skills = $_POST['skills'];
    $organizations = $_POST['organizations'];
    $rolename = $_POST['rolename'];
    $rolelevel = $_POST['rolelevel'];
	$q = "Update roles set RoleName='".$rolename. "', organizationid=".$organizations.", Level='".$rolelevel."' where roleid=".$rollrow['RoleId'];
   
    if($mysqli->query($q) === TRUE)
    {  
        
        $lastinserid=$rollrow['RoleId'];
        $delete = "delete from roleandskills where roleid=".$rollrow['RoleId']; 
        $mysqli->query($delete);
        foreach ($skills as $skill)
          {
            $skillq = "INSERT INTO roleandskills(skillid,roleid) values($skill,$lastinserid)"; 
            $mysqli->query($skillq);    
          }
         echo "<script>window.location.href = 'http://localhost/tracking/roles.php'</script>";
		exit;
	}
	else
	{
		echo ('Error Occured While creating roles');
		exit;
	}
}

} ?>

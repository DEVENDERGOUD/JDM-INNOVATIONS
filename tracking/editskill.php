<?php
session_start();
require('config.php');
if(isset($_SESSION['UserName'])){
$id=$_REQUEST['id'];
$query = "SELECT * from skills where skillid=".$id.""; 
$result = $mysqli->query($query);
$skillrow = mysqli_fetch_assoc($result);
$skillareaid=$skillrow['SKillAreaId'];
$getskillareas = "SELECT * FROM skillarea where isActive=1";
 $skillsreas=$mysqli->query($getskillareas);
include 'includes/header.php';
?> 
<script>

</script>
      <div class="container">
               
               <div class="title-container">
             <div class="row">
               <div class="col-10">
               <strong> Update SKill</strong>
                </div> 
               <div class="col-2">
               <a href="skills.php"> <button class="btn btn-primary">List</button></a>
               </div>
            </div>
</div>
<form name="form" method="post" action="#" class="col-6"> 
<div class="form-group">
<input name="skillid" class="form-control" type="hidden" value="<?php echo $skillrow['SkillId'];?>" />
</div>
<div class="form-group">
    <label for="selectskillarea">Skill Area </label>
    <select name="skillarea"  id="selectskillarea" class="form-control">
    <?php
    while ($row = $skillsreas->fetch_assoc()){
        if($row['SkillAreaId']==$skillareaid){
            echo "<option value=". $row['SkillAreaId'] ." selected='selected'>" . $row['Name'] ."</option>";
        }
        else
        {
            echo "<option value=". $row['SkillAreaId'] .">" . $row['Name'] ."</option>";
        }
    }
    ?>
    </select>
</div>

<div class="form-group">
<input type="text" class="form-control" name="skillname" placeholder="Enter Name" 
required value="<?php echo $skillrow['SkillName'];?>" />
</div>
<div class="form-group">
<input name="updateskill" type="submit" class="btn btn-primary" value="Update" />
</div>
</form>
</div>
<?php 
if(isset($_POST['updateskill']))
{   
    $skillareaid=$_POST['skillarea'];
    $skillid=$_POST['skillid'];
    $Name=$_POST['skillname'];
	$q = "Update skills set SkillName='".$Name."',skillareaid=".$skillareaid." where skillid=".$skillid."";
    echo ($q);
    if($mysqli->query($q) === TRUE)
	{   
		header("Location:skills.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Updating');
		exit;
	}
}

} ?>

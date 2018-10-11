<?php
session_start();
require('config.php');
if(isset($_SESSION['UserName'])){
$id=$_REQUEST['id'];
$query = "SELECT * from skillarea where skillareaid=".$id.""; 
$result = $mysqli->query($query);
$row = mysqli_fetch_assoc($result);
include 'includes/header.php';
?>        
      <div class="container">
               
               <div class="title-container">
             <div class="row">
               <div class="col-10">
               <strong> Update SKill ARea </strong>
                </div> 
               <div class="col-2">
               <a href="skillarea.php"> <button class="btn btn-primary">List</button></a>
               </div>
            </div>
</div>
<form name="form" method="post" action="#" class="col-6"> 
<div class="form-group">
<input name="skillareaid" class="form-control" type="hidden" value="<?php echo $row['SkillAreaId'];?>" />
</div>
<div class="form-group">
<input type="text" class="form-control" name="skillareaname" placeholder="Enter Name" 
required value="<?php echo $row['Name'];?>" /></p>
</div>
<div class="form-group">
<input name="updateakillarea" type="submit" class="btn btn-primary" value="Update" />
</div>
</form>
</div>
<?php 
if(isset($_POST['updateakillarea']))
{   
    $skillareaid=$_POST['skillareaid'];
    $Name=$_POST['skillareaname'];
	$q = "Update skillarea set Name='".$Name."' where skillareaid=".$skillareaid."";
	if($mysqli->query($q) === TRUE)
	{   
		header("Location:skillarea.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Updating');
		exit;
	}
}

} ?>

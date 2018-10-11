<?php
session_start();
require('config.php');
if(isset($_SESSION['UserName'])){
$id=$_REQUEST['id'];
$query = "SELECT * from organization where organizationid=".$id.""; 
$result = $mysqli->query($query);
$row = mysqli_fetch_assoc($result);
include 'includes/header.php';
?>        
      <div class="container">
               
               <div class="title-container">
             <div class="row">
               <div class="col-10">
               <strong> Update Organization </strong>
                </div> 
               <div class="col-2">
               <a href="organizations.php"> <button class="btn btn-primary">List</button></a>
               </div>
            </div>
</div>
<form name="form" method="post" action="#" class="col-6"> 
<div class="form-group">
<input name="organizationid" class="form-control" type="hidden" value="<?php echo $row['OrganizationId'];?>" />
</div>
<div class="form-group">
<input type="text" class="form-control" name="organizationname" placeholder="Enter Name" 
required value="<?php echo $row['Name'];?>" /></p>
</div>
<div class="form-group">
<input name="updateorganization" type="submit" class="btn btn-primary" value="Update" />
</div>
</form>
</div>
<?php 
if(isset($_POST['updateorganization']))
{   
    $organizationid=$_POST['organizationid'];
    $Name=$_POST['organizationname'];
	$q = "Update organization set Name='".$Name."' where organizationid=".$organizationid."";
	if($mysqli->query($q) === TRUE)
	{   
		header("Location:organizations.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Updating');
		exit;
	}
}

} ?>

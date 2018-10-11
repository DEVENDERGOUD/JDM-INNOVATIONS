
<?php
require('config.php');
$orgid=$_REQUEST['id'];
$q = "Update organization set IsActive=0 where organizationid=".$orgid;
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
?>
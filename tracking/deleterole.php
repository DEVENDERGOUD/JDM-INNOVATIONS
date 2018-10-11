
<?php
require('config.php');
$orgid=$_REQUEST['id'];
$q = "Update roles set IsActive=0 where roleid=".$orgid;
	if($mysqli->query($q) === TRUE)
	{   
		header("Location:roles.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Updating');
		exit;
	}
?>
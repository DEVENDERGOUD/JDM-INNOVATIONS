
<?php
require('config.php');
$skillid=$_REQUEST['id'];
$q = "Update skills set IsActive=0 where skillid=".$skillid;
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
?>
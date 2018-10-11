
<?php
require('config.php');
$skillareaid=$_REQUEST['id'];
$q = "Update skillarea set IsActive=0 where skillareaid=".$skillareaid;
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
?>
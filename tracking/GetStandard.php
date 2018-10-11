<?php session_start();
include("config.php");
if($_GET['id'])
{
	$q = "SELECT  * FROM standards  WHERE CompanyRoleId=".$_GET['id']."";
 // echo ($q);
	$companyroles=$mysqli->query($q);
  	if(mysqli_num_rows($companyroles)>0)
	{
	echo (json_encode(mysqli_fetch_assoc($companyroles)));
  }
	exit;
}
?>

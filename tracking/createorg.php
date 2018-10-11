<?php session_start();
include("config.php");

if(isset($_POST['organizationbutton']))
{   
	$Name = $_POST['organizationname'];
	$q = "INSERT INTO Organization(Name) VALUES('$Name')";
    echo($q);
	if($mysqli->query($q) === TRUE)
	{   
		header("Location:organizations.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Creating Organization');
		exit;
	}
}
?>
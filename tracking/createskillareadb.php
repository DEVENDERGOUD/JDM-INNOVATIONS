<?php session_start();
include("config.php");

if(isset($_POST['skillareabutton']))
{   
	$Name = $_POST['skillareaname'];
	$q = "INSERT INTO skillarea(Name) VALUES('$Name')";

	if($mysqli->query($q) === TRUE)
	{   
		header("Location:skillarea.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Registration');
		exit;
	}
}
?>
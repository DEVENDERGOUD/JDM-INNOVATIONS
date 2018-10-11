<?php session_start();
include("config.php");

if(isset($_POST['skillbutton']))
{   
    $Name = $_POST['skillname'];
    print_r($_POST);
    $skillarea = $_POST['skillarea'];
	$q = "INSERT INTO skills(skillname,skillareaId) VALUES('$Name',$skillarea)";
    echo ($q);
	if($mysqli->query($q) === TRUE)
	{   
		header("Location:skills.php");
		exit;
	}
	else
	{
		echo ('Error Occured While creating skills');
		exit;
	}
}
?>
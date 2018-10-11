<?php session_start();
include("config.php");

if(isset($_POST['rolebutton']))
{   
    $skills = $_POST['skills'];
    $organizations = $_POST['organizations'];
    $rolename = $_POST['rolename'];
    $rolelevel = $_POST['rolelevel'];
    $positioncode=rand();
	$q = "INSERT INTO roles(RoleName,organizationid,level,positioncode) VALUES('$rolename',$organizations,'$rolelevel','$positioncode')";
	if($mysqli->query($q) === TRUE)
	{   $lastinserid=$mysqli->insert_id;
        foreach ($skills as $skill)
          {
            $skillq = "INSERT INTO roleandskills(skillid,roleid) values($skill,$lastinserid)"; 
            $mysqli->query($skillq);
          }

		header("Location:roles.php");
		exit;
	}
	else
	{
		echo ('Error Occured While creating roles');
		exit;
	}
}
?>
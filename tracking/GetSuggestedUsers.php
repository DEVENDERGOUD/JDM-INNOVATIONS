<?php session_start();
include("config.php");
if($_GET['id'])
{   
	$standard = "SELECT  * FROM standards  WHERE CompanyRoleId=".$_GET['id']."";
	$companyroles=$mysqli->query($standard);
	$standardrow=mysqli_fetch_assoc($companyroles);
	$q = "SELECT  * FROM users where userid in (SELECT  userid FROM userskills where academic=".$standardrow['Academic']." or technical=".$standardrow['Technical'].")";
	//echo($q);
	$companyroles=$mysqli->query($q);
  	if(mysqli_num_rows($companyroles)>0)
	{ 
		echo "<table class='table table-stripped'><th>User Name</th>";
		while ($row = $companyroles->fetch_assoc()){
			echo "<tr><td>".$row['UserName']."</td></tr>";
		}
		echo "</table>";
  }
	exit;
}
?>

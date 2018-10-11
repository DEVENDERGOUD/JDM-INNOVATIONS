<?php session_start();
include("config.php");
if(isset($_POST['adminlogin']))
{   
	$userName = $_POST['adminusername'];
	$pass = $_POST['adminpassword'];
	$q = "SELECT UserName, Password from admintable
    WHERE username = '".$userName."' AND password = '".$pass."'";
	$res=$mysqli->query($q);
	if(mysqli_num_rows ( $res)>0)
	{      
	        $userrow=mysqli_fetch_assoc ( $res );
			$_SESSION['UserName'] = $userrow['UserName'];
			$_SESSION['RoleUniqueName']='admin';
			header("location:admin.php");
			exit;
	}
	else
	{
		echo'<script>alert("invalid username or password");</script>';
		header("location:index.php");
		exit;
	}
}
?>
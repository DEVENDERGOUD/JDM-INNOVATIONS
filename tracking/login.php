<?php session_start();
include("config.php");
if(isset($_POST['login']))
{
	$userName = $_POST['username'];
	$pass = $_POST['password'];
	$q = "SELECT UserId,FirstName,LastName,u.UserName,c.CompanyId, c.Name as CompanyName,r.UniqueName as RoleUniqueName,r.Name as RoleName FROM users  u
	inner join companys c on c.CompanyId=u.CompanyId
	inner join roles r on r.RoleId=u.RoleId
	WHERE username = '$userName' AND password = '$pass'";
	$res=$mysqli->query($q);
	if(mysqli_num_rows ( $res)>0)
	{      
	        $userrow=mysqli_fetch_assoc ( $res );
			$_SESSION['UserName'] = $userrow['UserName'];
			$_SESSION['UserId'] = $userrow['UserId'];
			$_SESSION['FirstName'] = $userrow['FirstName'];
			$_SESSION['LastName'] = $userrow['LastName'];
			$_SESSION['CompanyId']=$userrow['CompanyId'];
			$_SESSION['CompanyName'] = $userrow['CompanyName'];
			$_SESSION['RoleUniqueName'] = $userrow['RoleUniqueName'];
			$_SESSION['RoleName'] = $userrow['RoleName'];
			header("location:welcome.php");
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
<?php session_start();
include("config.php");

if(isset($_POST['signup']))
{
	$userName = $_POST['usernamesignup'];
	$pass = $_POST['passwordsignup'];
	$role = $_POST['roles'];
	$company=$_POST['company'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$q = "INSERT INTO users(RoleId,UserName,Password,CompanyId,FirstName,LastName) VALUES($role ,'$userName','$pass',$company,'$firstname','$lastname')";
	if($mysqli->query($q) === TRUE)
	{
		header("Location:index.php");
		exit;
	}
	else
	{
		echo ('Error Occured While Registration');
		exit;
	}
}
?>
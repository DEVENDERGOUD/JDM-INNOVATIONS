<?php
    $db_username = 'root'; 
	$db_password = '';
	$db_name = 'trackingcompetencies';
	$db_host = 'localhost';
	$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);
	$getorgs = "SELECT * FROM organization where OrganizationId not in ('-1') Order by Name";
	$getcompanys = "SELECT * FROM companys   Order by Name";
	$orgs=$mysqli->query($getorgs);
	$companys=$mysqli->query($getcompanys);
?>
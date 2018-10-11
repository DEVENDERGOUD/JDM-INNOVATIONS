<?php session_start();
include("config.php");
if(isset($_SESSION['UserName']))
{
	$q = "SELECT  * FROM companyroles
	WHERE CompanyId=".$_SESSION['CompanyId']."";
	$companyroles=$mysqli->query($q);
	$academicquery = "SELECT  * FROM Academic";
	$academics=$mysqli->query($academicquery);
	$technical = "SELECT  * FROM Technical";
	$technicalroles=$mysqli->query($technical);

	$skillq = "SELECT  * FROM userskills
	WHERE UserId=".$_SESSION['UserId']."";

	$skillquery=$mysqli->query($skillq);
	$skillid=null;
	$acdemic= null;
	$technical= null;
	$organizational=null;
	$humanrelations= null;
	$problemsolving=null;
	$accountability= null;
	if(mysqli_num_rows($skillquery)>0)
	{
		$skillrow=mysqli_fetch_assoc($skillquery);
		$skillid=$skillrow['skillid'];
		$acdemic= $skillrow['academic'];
		$technical= $skillrow['technical'];
		$organizational=$skillrow['Organizational'];
		$humanrelations= $skillrow['HumanRelations'];
		$problemsolving=$skillrow['ProblemSolving'];
		$accountability= $skillrow['Accountability'];
	}

	include 'includes/header.php';?>

        <div class="container">

            <section>
                        <div id="createuserskill">
						   <h1 class="form-heading"> Update Employee Skills </h1>
                            <form  action="#" autocomplete="on" method="post" enctype="multipart/form-data">
								 <h4> Skills </h4>
								 <div class="form-group">
								<label for="academic">Academic </label>
								<select name="academic"  id="academic" class="form-control">
								<option value="-1">Select Academic</option>
								<?php

								while ($row = $academics->fetch_assoc()){
									if($row['AcademicId']==$acdemic){
										echo "<option value=". $row['AcademicId'] ." selected='selected'>" . $row['Name'] ."</option>";
									}
									else
									{
										echo "<option value=". $row['AcademicId'] .">" . $row['Name'] ."</option>";
									}
								}?>
								</select>
							  </div>
							    <div class="form-group">
								 <label for="technical">Technical </label>
								 <select name="technical"  id="technical" class="form-control">
								 <option value="-1">Select Technical</option>
								<?php
								while ($row = $technicalroles->fetch_assoc()){
									if($row['TechnicalId']==$acdemic){
										echo "<option value=". $row['TechnicalId'] ." selected='selected'>" . $row['Name'] ."</option>";
									}
									else
									{
										echo "<option value=". $row['TechnicalId'] .">" . $row['Name'] ."</option>";
									}
								}?>
								</select>
							  </div>
							    <div class="form-group">
								 <label for="organizational">Organizational </label>
                                  <textarea id="organizational" class="form-control"  name="organizational"><?php  echo ($organizational)?></textarea>
							  </div>
							    <div class="form-group">
								 <label for="humanrelations">Human Relations </label>
                                  <textarea id="humanrelations" class="form-control" name="humanrelations"><?php  echo ($humanrelations)?></textarea>
							  </div>
							    <div class="form-group">
								 <label for="problemsolving">Problem Solving </label>
                                  <textarea id="problemsolving" class="form-control" name="problemsolving"><?php  echo ($problemsolving)?></textarea>
							  </div>
							    <div class="form-group">
								 <label for="accountability">Accountability </label>
                                  <textarea id="accountability" class="form-control"  name="accountability"><?php  echo ($accountability)?></textarea>
							  </div>

									<input type="submit" name="createskill" class="btn btn-primary"  value="Save"/>
									<a  href="welcome.php" name="cancel" class="btn btn-danger" >Cancel</a>
                            </form>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </body>
	<?php
	if(isset($_POST['createskill']))
{
	$emprolename =$_SESSION['UserId'];
	$acdemic= $_POST['academic'];
	$technical= $_POST['technical'];
	$organizational= $_POST['organizational'];
	$humanrelations= $_POST['humanrelations'];
	$problemsolving= $_POST['problemsolving'];
	$accountability= $_POST['accountability'];
	if($skillid==null)
	{
	$q = "INSERT INTO userskills(userid,Academic,Technical,Organizational,HumanRelations,ProblemSolving,Accountability) VALUES($emprolename ,'$acdemic','$technical','$organizational','$humanrelations','$problemsolving','$accountability')";
  }
	else{
		$q="Update userskills set Academic='".$acdemic."', Technical='".$technical."',Organizational='".$organizational."',HumanRelations='".$humanrelations."',ProblemSolving='".$problemsolving."',Accountability='".$accountability."'where skillid=".$skillid;
	}
	if($mysqli->query($q) === TRUE)
	{
		echo '<script>alert(\'Saved SucessFully\')</script>';
    unset($_POST);
		echo "<script>window.location.href = 'http://localhost/tracking/welcome.php'</script>";
		exit;
	}
	else
	{
		echo '<script>alert(\'Error Occured  Creating Employee Role\')</script>';
		unset($_POST);
		exit;
	}
}
}
else {
	 	echo 'You are not logged In <br>';
		echo'<a href="index.php">LOGIN</a>';

	 }
?>
</html>

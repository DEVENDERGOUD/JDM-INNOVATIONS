<?php session_start();	
if(isset($_SESSION['UserName']))
{

	include 'includes/header.php';?>
        <div class="container">
           
            <section>
                        <div id="createroleform">
						   <h1 class="form-heading">Add Company</h1>
                            <form  action="#" autocomplete="on" method="post" enctype="multipart/form-data"> 
							   <div class="form-group">
								   <label for="name">Name</label>
                                    <input id="name" name="name" class="form-control" required="required" type="text" placeholder="Company Name"/>
							  </div>
							  <div class="form-group">
								 <label for="country">Country </label>
                                    <input id="country" name="country" class="form-control"  type="text" placeholder="Country"/>
							  </div>
						
									<input type="submit" name="addcompany" class="btn btn-primary"  value="Add"/> 
									<a  href="welcome.php" name="cancel" class="btn btn-danger" >Cancel</a> 
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
<?php
if(isset($_POST['addcompany']))
{  
	$cname = $_POST['name'];
	$country= $_POST['country'];
	$q = "INSERT INTO companys(name,country,uniquename) VALUES('$cname' ,'$country','$cname')";
    //echo($q);
    if($mysqli->query($q) === TRUE)
	{
        echo '<script>alert(\'Addedd SucessFully\')</script>';
        unset($_POST);
		echo "<script>window.location.href = 'http://localhost/tracking/welcome.php' script>";
		exit;
	}
	else
	{
		echo '<script>alert(\'Error Occured  Creating Employee Role\')</script>';
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
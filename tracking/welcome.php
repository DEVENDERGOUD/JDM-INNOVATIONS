<?php session_start();	
if(isset($_SESSION['UserName']))
{

						include 'includes/header.php';
						if( $_SESSION['RoleUniqueName']=='CompanyAdmin'){  ?>
					   <div class="jumbotron">
					  Welcome to Admin portal of the company. You can add Roles of different levels in your company and there standards
					  </div>
					 <?php } ?>
					  <?php if( $_SESSION['RoleUniqueName']=='CompanyHr'){  ?>
					   <div class="jumbotron">
					  Welcome to Hr portal of the company. You can update standards as well as compare those standards with user skills
					  </div>
					 <?php } ?>
					  <?php if( $_SESSION['RoleUniqueName']=='Employee'){  ?>
					   <div class="jumbotron">
					  Welcome to Emloyee portal of the company. You can add your skills and update them
					  </div>
					 <?php } ?>
					 <?php if( $_SESSION['RoleUniqueName']=='SiteAdmin'){  ?>
					   <div class="jumbotron">
					   Welcome
					  </div>
					 <?php } 
    }
		else {
				 echo 'You are not logged In <br>';
				echo'<a href="index.php">LOGIN</a>';
				
		 }
 ?>
		             

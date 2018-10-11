
<head>
        <meta charset="UTF-8" />
				<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
     
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

		<link rel="stylesheet" href="css/style.css">
 </head>
 <body>
              
			            <nav class="navbar navbar-expand-lg navbar-light bg-light">
									<?php
								  if( $_SESSION['RoleUniqueName']=='admin'){
								  ?>
			                   <a class="navbar-brand" href="admin.php">JDM INNOVATIONS</a>
												 <span>ADMIN</span>
									<?php } ?>
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						    <span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse" id="navbarSupportedContent">
						    <ul class="navbar-nav mr-auto">
							 <div class="form-inline">
							  <?php
								  if( $_SESSION['RoleUniqueName']=='admin'){
								  ?>
						      <li class="nav-item">
						        <a class="nav-link" href="skillarea.php ">SkillArea</a>
						      </li>
						      <li class="nav-item">
						        <a class="nav-link" href="skills.php ">Skills</a>
						      </li>
									<li class="nav-item">
						        <a class="nav-link" href="organizations.php ">Organizations</a>
						      </li>
									<li class="nav-item">
						        <a class="nav-link" href="roles.php ">Roles</a>
						      </li>
							    <?php
									}
								  ?>
						      <?php
  								  if( $_SESSION['RoleUniqueName']=='CompanyHr'){
  								  ?>
  						      <li class="nav-item">
  						        <a class="nav-link" href="CreateEmployeeStandards.php ">View Employee Role Standard</a>
  						      </li>
                    <li class="nav-item">
  						        <a class="nav-link" href="ViewUserSkills.php ">View User Skills</a>
  						      </li>
  							    <?php
  									}
  								  ?>
						      <?php
								  if( $_SESSION['RoleUniqueName']=='Employee'){
								  ?>
						      <li class="nav-item">
						        <a class="nav-link" href="adduserskills.php ">Add SKills</a>
						      </li>
							    <?php
									}
								  ?>
									 <?php
								  if( $_SESSION['RoleUniqueName']=='SiteAdmin'){
								  ?>
						      <li class="nav-item">
						        <a class="nav-link" href="addcompany.php ">Add Company</a>
						      </li>
									<li class="nav-item">
						        <a class="nav-link" href="supportqueries.php ">View Support Queries</a>
						      </li>

							    <?php
									}
								  ?>
							  <li class="nav-item"><a   class="nav-link" href="logout.php">Log Out</a></li>
						    </div>
								</ul>
						  </div>
						</nav>
   

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
<body  id="LoginForm" style="background-image: url('images/website-designer-in-snellville.jpg')">
<nav class="navbar navbar-expand-md  fixed-top ">
      <a class="navbar-brand" href="index.php">JDM INNOVATIONS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="http://example.com" id="organizations" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Organizations</a>
            <div class="dropdown-menu" aria-labelledby="organizations">
              
								<?php
								while ($org = $orgs->fetch_assoc()){
								echo "<a class='dropdown-item' href='viewdata.php?id=".$org['OrganizationId']."'>". $org['Name'] ."</a>";
								}?>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link" href="aboutus.php" id="aboutus">About Us</a>
            
          </li>
        </ul>
        
           
		</div>
			
   </nav>
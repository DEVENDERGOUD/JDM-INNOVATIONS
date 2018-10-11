<?php session_start(); 
include("config.php");
?>
    <head>
	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
     
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		 
		<link rel="stylesheet" href="css/style.css">
    </head>
    <body  id="LoginForm" style="background-image: url('images/website-designer-in-snellville.jpg')">
        <div class="container">
		<nav class="navbar navbar-light bg-light justify-content-between">
			<a class="navbar-brand">JDM INNOVATIONS</a>
		
		<div class="collapse navbar-collapse" id="navbarsExampleDefault">
			<ul class="navbar-nav mr-auto">
			<li class="nav-item active">
				<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="#">Link</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Disabled</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
				<div class="dropdown-menu" aria-labelledby="dropdown01">
				<a class="dropdown-item" href="#">Action</a>
				<a class="dropdown-item" href="#">Another action</a>
				<a class="dropdown-item" href="#">Something else here</a>
				</div>
			</li>
			</ul>
			<div class="form-inline">
					<button class="btn btn-primary my-2 my-sm-0"  data-toggle="modal" data-target="#SendModal" type="button">Send Query</button>
			</div>on class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
		</div>
			
		</nav>
		<div class="modal fade" id="SendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Send Query</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
					<label for="sendemailinput">Email</label>
					  <input  class="form-control" type="email" id="sendemailinput" name="sendemailinput">
					</div>
					<div class="form-group">
					<label for="sendemailtext">Query</label>
					  <textarea class="form-control" id="sendemailtext" name="sendemailtext"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="sendmail" name="sendmail" data-dismiss="modal">Send</button>
				</div>
				</div>
			</div>
			</div>
            <section>				
                
					<div class="login-form col-md-6 py-4" id="logindiv">
					  <div class="main-div">
					    <h1 class="form-heading">Login Form</h1>
						<form id="login" action="login.php" autocomplete="on" method="post" >

							<div class="form-group">
								<input type="email" class="form-control" id="inputname"  name="username"  placeholder="Enter Email">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="inputPassword" id=="password"  name="password"  placeholder="Password">

							</div>
							<button type="submit" class="btn btn-primary" id="loginbutton" name="login">Login</button>
							<button type="button" class="btn btn-primary" id="registerbutton" onclick="getregister()">Register</button>
						</form>
						</div>
					</div>

                        <div id="register" class='d-none  col-md-6 py-4'>
						   <h1 class="form-heading"> Sign up </h1> 
                            <form  action="register.php" autocomplete="on" method="post" enctype="multipart/form-data"> 
							   <div class="form-group">
								   <label for="firstname">First Name </label>
                                    <input id="firstname" name="firstname" class="form-control" required="required" type="text" placeholder="First Name"/>
							  </div>
							  <div class="form-group">
								 <label for="lastname">Last Name </label>
                                    <input id="lastname" name="lastname" class="form-control" required="required" type="text" placeholder="Last Name"/>
							  </div>
								<div class="form-group">
								    <label for="usernamesignup">Your email</label>
                                    <input id="usernamesignup" name="usernamesignup"  class="form-control"  required="required" type="email" placeholder="Enter Email" />
							  </div>
                              
							  <div class="form-group">
								   <label for="passwordsignup">Your password </label>
                                    <input id="passwordsignup" name="passwordsignup" class="form-control" required="required" type="password" placeholder="Password"/>
							  </div>
                              
							  <div class="form-group">
							  <label for="selectcompany">Company </label>
								<select name="company"  id="selectcompany" class="form-control">
								<?php
								while ($com = $companys->fetch_assoc()){
								echo "<option value=". $com['CompanyId'] .">" . $com['Name'] . "</option>";
								}?>
								</select>
								</div>
								 <div class="form-group">
							  <label for="selectroles">Role </label>
								<select name="roles"  id="selectroles" class="form-control">
								<?php
								while ($row = $roles->fetch_assoc()){
								echo "<option value=". $row['RoleId'] .">" . $row['Name'] . "</option>";
								}?>
								</select>
								</div>
									<input type="submit" name="signup" class="btn btn-primary"  value="Sign up"/> 
									Already a member ? <span  class="text-white" onclick="getregister()"> Go and log in </span>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
	<script>
	 var isLogin=true;
	  function getregister(){
		  if(isLogin){
			  jQuery('#logindiv').addClass('d-none');
		      jQuery('#register').removeClass('d-none');
			  isLogin=false;
		  }
		  else
		  {
		    jQuery('#logindiv').removeClass('d-none');
		    jQuery('#register').addClass('d-none');
			isLogin=true;
		  }
		  
	  }
	  $(document).ready(function(){
		$('#sendmail').on("click",function(e){
			var val = $(this).val();
			var email=$("#sendemailinput").val();
			var query=$("#sendemailtext").val();
					var requestUrl = "sendmail.php";
					$.ajax({
						type: "POST",
						url: requestUrl,
						data:{'email':email,'query':query},
						success: function (response) {
																			

						},
						error: function (error) {
																
													
						}
					});
				});    

	});
	</script>
</html>
<?php session_start(); 
include("config.php");
include 'includes/headerO.php';
if(isset($_SESSION['UserName'])){
    header('location:admin.php');
}
?>


     <div class="jumbotron">
        <div class="row">
           <div class="col-md-7">
              <p class="home-text">The JDM INNOVATIONS is the online destination for clients who are looking for industrial help.</p>
              <p  style="text-align:center"><a class="btn btn-primary btn-lg" href="aboutus.php" role="button">Learn more &raquo;</a></p>
           </div>
           <div class="login-div">
           <h2 class="login-header">Login</h2>
           <form id="login" action="adminlogin1.php"  method="post" >

            <div class="form-group">
                <input type="email" class="form-control" id="admininputname"  name="adminusername"  placeholder="Enter Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" id="admininputPassword" id="adminpassword"  name="adminpassword"  placeholder="Password">

            </div>
            <button type="submit" class="btn btn-primary" id="adminloginbutton" name="adminlogin">Login</button>
            </form>
           </div>
        </div>
      </div>
<?php 

include 'includes/FooterO.php'
?>    
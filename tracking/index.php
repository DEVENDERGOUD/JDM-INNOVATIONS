<?php session_start(); 
include("config.php");
include 'includes/headerO.php';
if(isset($_SESSION['UserName'])){
    header('location:admin.php');
}
?>
     <div class="jumbotron">
        <div class="row">
        <div class="col-md-2">
        </div>
           <div class="col-md-7">
              <p class="home-text">The JDM INNOVATIONS is the online destination for clients who are looking for industrial help.</p>
              <p  style="text-align:center"><a class="btn btn-primary btn-lg" href="aboutus.php" role="button">Learn more &raquo;</a></p>
           </div>
        </div>
      </div>
<?php 

include 'includes/FooterO.php'
?>    
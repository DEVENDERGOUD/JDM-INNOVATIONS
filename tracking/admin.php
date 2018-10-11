<?php
session_start();
if(isset($_SESSION['UserName']))
{
include('./includes/header.php');
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
}
else 
{
    header("location:index.php");
}
?>
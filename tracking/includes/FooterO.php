<div class="container">
        <div class="row">
        <div class="col-md-4 feedback">
            <h2 class="form-heading">Feed Back</h2> 
                  <div class="form-group">
                      <label for="sendemailinput">Email</label>
                        <input  class="form-control" type="email" id="sendemailinput" name="sendemailinput">
                      </div>
                      <div class="form-group">
                      <label for="sendemailtext">Feed Back</label>
                        <textarea class="form-control" id="sendemailtext" name="sendemailtext"></textarea>
                      </div>
                      <div class="form-group">
                      <button type="button" class="btn btn-primary" id="sendmail" name="sendmail" data-dismiss="modal">Send</button>
                      </div>
          </div>
      
          <div class="col-md-2">
           
          </div>
          <div class="col-md-4">
            <h2 class="form-heading">Contact Us</h2>
            <ul class="email-block text-white">
               <li><i class="fa fa-envelope"></i> jagjot181295@gmail.com</li>
               <li><i class="fa fa-envelope"></i> jasdeepdhillon101@gmail.com</li>
               <li><i class="fa fa-envelope"></i> devender.goud27@gmail.com</li>
               <li><i class="fa fa-envelope"></i> maninderjeetsingh61@gmail.com</li>
               <li><i class="fa fa-envelope"></i> jdminnovations7@gmail.com</li>
            </ul>
          </div>
       
          
        </div>

        <hr>

      </div> <!-- /container -->
   
      <div class="spinner d-none">
      <img src="./images/Spinner-1s-200px.gif">
     <div>
</body>
<script>
	  $(document).ready(function(){
		$('#sendmail').on("click",function(e){
      $(".spinner").removeClass('d-none');
			var val = $(this).val();
			var email=$("#sendemailinput").val();
			var query=$("#sendemailtext").val();
					var requestUrl = "sendmail.php";
					$.ajax({
						type: "POST",
						url: requestUrl,
						data:{'email':email,'query':query},
						success: function (response) {
              $("#sendemailinput").val("");
		        	$("#sendemailtext").val("");											
              alert("Feedback Sent Sucessfully");
              $(".spinner").addClass('d-none');
						},
						error: function (error) {
																
													
						}
					});
				});    

	});
	</script>
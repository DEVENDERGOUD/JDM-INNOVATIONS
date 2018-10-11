<?php session_start();
include("config.php");
if(isset($_POST['query']))
{
         // $to = "jasdeepdhillon101@gmail.com";
         // $subject = "Support Request";
         
         // $message = $_POST['query'];
         // $message .= "<h1>This is headline.</h1>";
         
         // $header = "From:jdminnovations7@gmail.com \r\n";
         // $header .= "MIME-Version: 1.0\r\n";
         // $header .= "Content-type: text/html\r\n";
         
         // $retval = mail ($to,$subject,$message,$header);
         
         // if( $retval == true ) {
            // echo "Message sent successfully...";
            // $email = $_POST['email'];
            // $query = $_POST['query'];
            // $userid;
            // $q = "INSERT INTO supportqueries (UserName,Query) VALUES('$email' ,'$query')";
            // if($mysqli->query($q) === TRUE)
            // {   
                // $last_id = $mysqli->insert_id;
                // $getquery="select userid from users where UserName='".$email."'";
                // //echo ($getquery);
                // $result=$mysqli->query($getquery);
                // //print_r($result);
                // if(mysqli_num_rows ($result)>0)
                // {      
                        // $userrow=mysqli_fetch_assoc ($result);
                        // $updatequery='Update supportqueries set UserId='.$userrow['userid'].' where supportid='.$last_id;
                        // //echo ($updatequery);
                        // $upresult=$mysqli->query($updatequery);
               // }        
                // exit;
            // }
            // else
            // {
                // echo ('Error Occured While Registration');
                // exit;
            // }
         // }else {
            // echo "Message could not be sent...";
         // } 
		 
		 
			require 'PHPMailerAutoload.php';

			$mail = new PHPMailer;

			$mail->SMTPDebug = 4;                               // Enable verbose debug output

			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'jdminnovations7@gmail.com';                 // SMTP username
			$mail->Password = 'jdm12345';                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;            
      $mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);                        // TCP port to connect to
			$mail->setFrom($_POST['email'], 'JDM INNOVATIONS');
			$mail->addAddress('jdminnovations7@gmail.com', 'JDM');    // Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');

			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Mail from JDM';
			$mail->Body    = $_POST['query'];
			$mail->AltBody = $_POST['query'];

			if(!$mail->send()) {
				echo 'Message could not be sent.';
				echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
				echo 'Message has been sent';
			}
}

?>
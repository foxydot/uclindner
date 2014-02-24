<?php
/**
 * Template Name:send email
 
 */


if(isset($_GET['email'])){
	
	$admin_email =  get_option( 'admin_email' );

	$email = $_GET['email'];
	$to = $admin_email;
	// subject
	$subject = 'Newsletter Subscription';

	// message
	$message = '
	<html>
	<head>
	  <title>'.$subject.'</title>
	</head>
	<body>
		<p>Hi Admin,</p>
		<p>We have received a request to subscribe new email address ('.$email.') to receive emails from our website.<br><br>Thank you. </p>		
	</body>
	</html>
	';

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
	$headers .= 'To:'.$admin_email.' \r\n';
	$headers .= 'From: <'.$email.'>' . "\r\n";

	// Mail it
	if(mail($to, $subject, $message, $headers)) {
		//print  '1';
	} else {
		//print  '0';
	}	
	
}


?>

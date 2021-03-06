<?php
if(isset($_POST["action"])) {
  $name = $_POST['name'];                 // Sender's name
  $email = $_POST['email'];     // Sender's email address
  $phone  = $_POST['phone'];     // Sender's email address
  $message = $_POST['message'];    // Sender's message  
  $headers = 'From: Demo Contact Form <demo@domain.com>' . "\r\n";    
    
  $to = 'gal.jeza@protonmail.com';     // Recipient's email address
  $subject = 'Sporočilo s spletne strani';

 $body = " Od: $name \n E-Mail: $email \n Telefonska številka: $phone \n Sporočilo : $message"  ;
	
	// init error message 
	$errmsg='';
  // Check if name has been entered
  if (!$_POST['name']) {
   $errmsg = 'Prosimo vnesite ime';
  }

  
  // Check if email has been entered and is valid
  if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
   $errmsg = 'Vnesite veljavni email naslov';
  }
  
  //Check if message has been entered
  if (!$_POST['message']) {
   $errmsg = 'Vnesite sporočilo';
  }
 
	$result='';
  // If there are no errors, send the email
  if (!$errmsg) {
		if (mail ($to, $subject, $body, $headers)) {
			$result='<div class="alert alert-success">Thank you for contacting us. Your message has been successfully sent. We will contact you very soon!</div>'; 
		} 
		else {
		  $result='<div class="alert alert-danger">Sorry there was an error sending your message. Please try again later.</div>';
		}
	}
	else{
		$result='<div class="alert alert-danger">'.$errmsg.'</div>';
	}
	echo $result;
 }
?>

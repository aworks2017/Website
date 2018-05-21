<?php
require_once('phpmailer/class.phpmailer.php');
require_once('phpmailer/config.php');
print"<pre>";
$mail = new PHPMailer;
//Enable SMTP debugging. 
$mail->SMTPDebug = 2;
$mail->do_debug = 0;                             
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = $email_config['host'];
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = $email_config['user_name'];                 
$mail->Password = $email_config['password'];                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = $email_config['smtp'];                           
//Set TCP port to connect to 
$mail->Port = $email_config['port'];                                   

$mail->From = $email_config['from_email'];
$mail->FromName = $email_config['from_name'];
$mail->Subject = "Centro Test Email";
$mail->isHTML(true);
$mail->Body = 'This is test email to confirm the configuration.';
$mail->AltBody = 'This is test email to confirm the configuration.';	
foreach($email_config['userEmail'] as $email){
	$mail->addAddress($email, $email_config['userName']);	
}
if($mail->send()){
	echo 'Email successfully sent!';
}else{
	echo 'Email couldnt sent! Something wrong!';
}
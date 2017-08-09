<?php

	/* Contact Form Setup Begin */

	$send_name      = "Mobile Brazil Conference";		// Replace your name
	$send_title     = "[Mobile Brazil Conference] Patrocínio";		// Replace email sent title
	$send_address   = "contato@mobilebrazilconference.com.br";	// Replace your email address
	
	$smtp_address   = "contato@mobilebrazilconference.com.br";		// Replace your email address
	$smtp_password	= "m@b1l3br4z1l";				// Replace your email password
	$smtp_server	= "mail.mobilebrazilconference.com.br";	// Replace your email server address
	
	/* Contact Form Setup End */

	date_default_timezone_set('Etc/UTC');

	require 'inc/phpmailer/PHPMailerAutoload.php';

	$mail = new PHPMailer();							// Create a new PHPMailer instance
	
	$mail->IsSMTP();									// Tell PHPMailer to use SMTP
	$mail->SMTPAuth = true;
	
	$mail->CharSet = "utf-8";							// Set CharSet
	$mail->Host = $smtp_server;							// Set the hostname of the mail server
	$mail->Port = 587;									// Set the SMTP port number - likely to be 25, 465 or 587
//	$mail->SMTPSecure = "tls";   						// If you use gmail address, active this line
	$mail->Username = $smtp_address;					// Username to use for SMTP authentication
	$mail->Password = $smtp_password;					// Password to use for SMTP authentication
	
	$mail->setFrom( $mail->Username, $send_title );	// Set who the message is to be sent from
	$mail->addAddress( $send_address, $send_name );		// Set who the message is to be sent to
	$mail->Subject = $send_title;						// Set the subject line
	
	//Read an HTML message body from an external file, convert referenced images to embedded,
	//convert HTML into a basic plain-text alternative body
	$mail->msgHTML("Nome ". $_POST["name"]."<br />Email ". $_POST["email"]."<br />Telefone ".$_POST["phone"]."<br /><br/>Mensagem ".$_POST["message"]);

	//send the message, check for errors
	if (!$mail->send()) { echo "ERROR"; } else { echo "SUCCESS"; }

?>
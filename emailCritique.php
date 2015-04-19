﻿<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Send Critique Email Utility</title>
</head>
<body>
   <h1>Sending your file... please wait....</h1>
   <p>
   
﻿<?php
set_include_path(dirname(__FILE__) . '/php-includes/');
/**
 * PHPMailer script
 */
$fromName = $_POST['nameInput'];      
$emailInput = $_POST['emailInput'];
$validFromemail = filter_var($emailInput, FILTER_VALIDATE_EMAIL);
if (!$validFromemail) {
        echo 'email address is invalid';
        echo 'Message not sent!';
 } else { 
  $msg = '';
  if (array_key_exists('upFile', $_FILES)) {
    // First handle the upload
    // Don't trust provided filename - same goes for MIME types
    $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['upFile']['name']));
    if (move_uploaded_file($_FILES['upFile']['tmp_name'], $uploadfile)) {
        // Upload handled successfully
        // Now create a message
        // This should be somewhere in your include_path
        require 'PHPMailerAutoload.php';
        $mail = new PHPMailer;
        $mail->setFrom($validFromemail, $fromName);
        $mail->addAddress('marymjansen@msn.com', 'Mary Jansen');
        $mail->Subject = 'Critique Request from ' . $fromName;
        $mail->msgHTML($_POST['comments']);
        // Attach the uploaded file
        $mail->addAttachment($uploadfile, $_FILES['upFile']['name']);
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
    } else {
        echo 'Failed to move file to ' . $uploadfile;
    }
  }
}

?>      
  </p>
  
  <p>Use back arrow on error, or return to <a href="index.php">Home</a></p>
</body>
</html>
	 
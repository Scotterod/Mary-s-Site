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

 $emailInput = $_POST['emailInput'];
 $validFromemail = filter_var($emailInput, FILTER_VALIDATE_EMAIL);
 
 if (!$validFromemail) {
        echo 'email address is invalid';
        echo 'Message not sent!';
   } else {
     $to = 'Mary Jansen <marymjansen@msn.com>'; 
     $fromName = $_POST['nameInput'];      
     $subject = 'Critique Request from ' . $fromName;
     $message =  $_POST['comments'];
   
//     $headers = "Reply-to: " . $validFromemail;
     $headers = "From: $validFromemail"; 
       
     // GET File Variables 
     $tmpName = $_FILES['upFile']['tmp_name']; 
     $fileType = $_FILES['upFile']['type']; 
     $fileName = $_FILES['upFile']['name']; 
     
     // Reading file ('rb' = read binary) 
     $file = fopen($tmpName,'rb'); 
     $data = fread($file,filesize($tmpName)); 
     fclose($file); 

     // a boundary string 
     $randomVal = md5(time()); 
     $mimeBoundary = "==Multipart_Boundary_x{$randomVal}x"; 
 

     // Header for File Attachment  
     $headers .= "nMIME-Version: 1.0n"; 
     $headers .= "Content-Type: multipart/mixed;n" ;     
     $headers .= " boundary="{$mimeBoundary}""; 
     
  }
  /*     
             
     
     
     // Multipart Boundary above message 
     $message = "This is a multi-part message in MIME format.nn" . 
        "--{$mimeBoundary}n" . 
        "Content-Type: text/plain; charset="iso-8859-1"n" . 
        "Content-Transfer-Encoding: 7bitnn" . 
     $message . "nn"; 
     
     // Encoding file data 
     $data = chunk_split(base64_encode($data)); 

     // Adding attchment-file to message
     $message .= "--{$mimeBoundary}n" . 
     "Content-Type: {$fileType};n" . 
     " name="{$fileName}"n" . 
     "Content-Transfer-Encoding: base64nn" . 
     $data . "nn" . 
     "--{$mimeBoundary}--n"; 
     echo 'all set to email....';
     
     
    $flgchk = mail("$to", "$subject", "$message", "$headers"); 

    if($flgchk) {
      echo "Your email has been sent";
     }
    else {
      echo "Error in sending Email ";
    }
    
    */


?>      
  </p>
  
  <p>Use back arrow on error, or return to <a href="index.php">Home</a></p>
</body>
</html>
	 
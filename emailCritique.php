
<?php
// This receives input from Critiques.html and sends an email off to Mary with the information.

$nameInput = $_POST['nameInput'];
$emailBody = $_POST['comments'];
$emailAttachment = $_POST['upFile'];
$emailSubject = 'Critique Request from ' . $nameInput;
$toEmail = 'Mary Jansen <marymjansen@msn.com>';
$fromServer = $_POST['emailInput'];
$headers = 'From: ' . $fromServer . '\r\n';
$headers .= "Content-Type: text/plain; charset=utf-8";
$validFromemail = filter_input(INPUT_POST, 'emailInput', FILTER_VALIDATE_EMAIL);
if ($validFromemail) {
   $headers .= "\r\nReply-to: $validFromemail";
   }

$etry = mail($toEmail, $emailSubject, $emailBody, $headers, '-f' . $fromServer);
           echo 'Your request has been submitted.';
   }

   //I still need to learn how to send an email from php. The tutorials did not cover that.

?>


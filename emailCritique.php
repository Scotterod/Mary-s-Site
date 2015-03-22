
<?php
// This receives input from Critiques.html and sends an email off to Mary with the information.

$nameInput = $_POST['nameInput'];
$fromEmail = $_POST['emailInput'];
$emailBody = $_POST['comments'];
$emailAttachment = $_POST['upFile'];
$emailSubject = 'Critique Request from ' . $nameInput;
$toEmail = 'marymjansen@msn.com';

$searchAt = strpos($fromEmail, '@');
if ($searchAt === false) {
   echo 'Please go back and enter a valid email address';
   } elseif {
       $emailParts = explode('@',$fromEmail);
       $searchDot = strpos($emailParts[1], '.');
       if ($searchDot === false) {
           echo 'Please go back and enter a valid email address';
       } else {
           echo 'Your request has been submitted.';
   }

   //I still need to learn how to send an email from php. The tutorials did not cover that.

?>


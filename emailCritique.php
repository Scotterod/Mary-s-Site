


$emailBody = $_POST['comments'];
$emailAttachment = $_POST['upFile'];

$etry = mail($toEmail, $emailSubject, $emailBody, $headers, '-f' . $fromServer);
           echo 'Your request has been submitted.';

<?php
/* Script name: mailGraphic file
 * Description: Sends a graphic file as an email attachment.
 */
 $nameInput = $_POST['nameInput']; 
 $filename = "inputfile.jpg";
 $fh = fopen($filename, "rb");
 $fileContent = fread($fh.filesize($filename));
 fclose($fh);
 $mess = chunk_split(base64_encode($fileContent));
 $toEmail = 'Mary Jansen <marymjansen@msn.com>';
 $emailSubject = 'Critique Request from ' . $nameInput;
 $headers = "Content-disposition: attachment; filename=inputfile.jpg\n";
 $headers .= "Content-type: image/jpg\n";
 $headers .="Content-Transfer-Encoding: base64\n";
 $validFromemail = filter_input(INPUT_POST, 'emailInput', FILTER_VALIDATE_EMAIL);
 if ($validFromemail) {
   $headers .= "Reply-to: $validFromemail\n";
   }
 if (!$mailsend = mail($toEmail, $emailSubject, $mess, $headers)) {
     echo "Mail not sent!\n";
}
else {
    echo "Mail sent\n";
}
?>
	 


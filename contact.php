<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <title>Mary Jansen: Contact Us</title>
</head>
<body>
    <header>
        <!--<hgroup>
            <h1>Mary Jansen</h1>
            <h2>Artist Extraordinaire</h2>
        </hgroup>-->
        <img class="banner" src="Images/fern head.jpg" alt="Fern Painting" />
        <nav>
            <ul>
               <li><a href="index.html">Home</a></li>
               <li><a href="galleries.php">Galleries</a></li>
               <li><a href="services.html">Services</a></li>
               <li><a href="biography.html">Biography</a></li>
               <li>Contact Us</li>
            </ul>
        </nav>
    </header>
    <hr>
    <section>
        <h1>Mary Jansen</h1>
        <p>Mary is always happy to "talk" shop. Please fill out all fields in the form below.</p>
        <form method="POST" action="contact.php" enctype="multipart/form-data">
            <p>Your Full Name</p>
            <p><label><input type="text" name="nameInput" required placeholder="Your full name"></label></p>
            <p>Your Email Address</p>
            <p><label><input type="email" name="emailInput" required placeholder="email address"></label></p>
            <p><label for="comments">Enter questions or comments (max 500 characters):</label></p>
            <textarea cols="103" rows="5" maxlength="500" name="comments"></textarea>
            <p> <input type="submit" value="Submit"></p>
            <p> <input type="reset" value="Reset Values"></p>
        </form>
    </section>
    <section><p>
  
<?php  
 $headers ='';
 if (isset($_POST['emailInput'])) {
   $emailBody = $_POST['comments'];
   $nameInput = $_POST['nameInput']; 
   $toEmail = 'Mary Jansen <marymjansen@msn.com>';
   $emailSubject = 'Web Mail from ' . $nameInput; 
   $validFromemail = filter_input(INPUT_POST, 'emailInput', FILTER_VALIDATE_EMAIL);
   if ($validFromemail) {
     $headers = "Reply-to: $validFromemail\n";
   }
   if (!$mailsend = mail($toEmail, $emailSubject, $emailBody, $headers)) {
     echo "Mail not sent!\n";
   }
   else {
     echo "Mail sent\n";
   }
  }  
  
?>
   </p></section> 
    
</body>
</html>
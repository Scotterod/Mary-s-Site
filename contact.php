<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>    
    <title>Mary Jansen: Contact Us</title>
</head>
<body>
    <header>

        <img class="banner" src="Images/fern head.jpg" alt="Fern Painting" />
        <nav>

                <div class="menubox"><a href="index.php">Home</a></div>
                <div class="menubox dropper"><a href="productDisplay.php?category=watercolors">Galleries</a>
                   <ul class="submenu">
<?php
// This php reads the mysql table to see what types of products are to be displayed on the gallery sub-menu.
	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
	$sql = "SELECT DISTINCT category FROM mj_typeMaster
	        WHERE displayOrder < 9990
	        ORDER BY displayOrder";

	$result = mysql_query($sql, $cxn);

	while($row = mysql_fetch_array($result)) {
		$category = $row['category'];
		$categoryURL= str_replace(" ", "+", $category);
		echo '                    <li><a href="productDisplay.php?category=' . $categoryURL . '">' . $category . '</a></li>' . "\r\n";
	}
?>    
                   </ul></div>                
                <div class="menubox dropper"><a href="services.php">Services</a>
                   <ul class="submenu">
                      <li><a href="register.php">Registration</a></li>
                      <li><a href="critiques.php">Critiques</a></li>
                      <li><a href="tutorials.php">Tutorials</a></li>
                   </ul></div>  
                <div class="menubox"><a href="biography.php">Biography</a></div>
                <div class="menubox">Contact Us</div>
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
     $headers = "Reply-to: " . $validFromemail . "\n";
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
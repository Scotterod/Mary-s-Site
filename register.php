<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetR.css" media="screen" />    
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/register.js"></script>          
    <title>Mary Jansen: Registration</title>
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
        <h1>Join the Friends of Mary Club</h1>
        <h2>Why Join?</h2>
          <ul>
             <li>Mary promises that your information will never be sold to anyone. Period.</li>
             <li>Mary will send you an email when a new painting, or other item, is completed.</li>
             <li>Registration will speed the process if you ever decide to purchase anything.</li>
             <li>Registration can be terminated at any time.</li>
          </ul>
          <br>   
        <p>Most fields are optional, but they will help you to better connect with Mary.</p>
        <form method="POST" >
            <p>First Name</p>
            <p><label><input id = "fnameInput" type="text" name="fnameInput" required placeholder="Your first name"></label>
                  <span id="fnameError" class="errorMessage">*</span></p>
            <p>Last Name</p>
            <p><label><input id="lnameInput" type="text" name="lnameInput" required placeholder="Your last name"></label>
                  <span id="lnameError" class="errorMessage">*</span></p>
            <p>Your Email Address (by entering your address, you agree to receive emails from Mary about latest product releases</p>
            <p><label><input type="email" name="emailInput" placeholder="email address"></label>
                  <span id="emailError" class="errorMessage"></span></p>
            <p>Telephone Number</p>
            <p><label><input type="tel" name="phoneInput" placeholder="Phone"></label>
                  <span id="phoneError" class="errorMessage"></span></p> 
            <p>Address Line 1 (Used to ship a purchase to you)</p>
            <p><label><input type="text" name="addr1Input" placeholder="Address 1"></label>
                  <span id="addr1Error" class="errorMessage"></span></p>        
            <p>Address Line 2</p>
            <p><label><input type="text" name="addr2Input" placeholder="Address 2"></label>
                  <span id="addr2Error" class="errorMessage"></span></p>
            <p>City</p>
            <p><label><input type="text" name="cityInput" placeholder="City"></label>
                  <span id="cityError" class="errorMessage"></span></p>                 
            <p>State/Province Code</p>
            <p><label><input type="text" name="stateInput" placeholder="State"></label>
                  <span id="stateError" class="errorMessage"></span></p>  
            <p>Zip Code</p>
            <p><label><input type="text" name="zipInput" placeholder="Zip Code"></label>
                  <span id="zipError" class="errorMessage"></span></p>   
            <p>Country</p>
            <p><label><input type="text" name="countryInput" value="USA"></label>
                  <span id="countryError" class="errorMessage"></span></p>                                               
            <p>Your User Name (we recommend you use an email address)</p>
            <p><label for="unameInput"><input id="unameInput" type="text" name="unameInput" placeholder="user name"></label>
                     <span id="userMessage" class="errorMessage"></span></p>
            <p>Your Password</p>
            <p><label><input type="password" name="passwordInput" placeholder="password"></label>
                     <span id="passwordMessage" class="errorMessage"></span></p>
            <p> <input id="button" type="submit" value="Submit"></p>
            <p> <input type="reset" value="Reset Values"></p>
        </form>
    </section>
    <section><p id="dbresult" class = "errorMessage">
<?php  

 if(isset($_POST['lnameInput'])) {
   $fname = $_POST['fnameInput'];
   $lname = $_POST['lnameInput'];
   $username = $_POST['unameInput'];
   $password = $_POST['passwordInput'];
   $createDate = date("Y-m-d");
   $addr1 = $_POST['addr1Input'];
   $addr2 = $_POST['addr2Input'];
   $city = $_POST['cityInput'];
   $state = $_POST['stateInput'];
   $country = $_POST['countryInput'];
   $zip = $_POST['zipInput'];
   $email = $_POST['emailInput'];
   $validemail = filter_input(INPUT_POST, 'emailInput', FILTER_VALIDATE_EMAIL);
   if ($validemail) {
         $email=$validemail;
         } else { $email='';}
   $phone = str_replace('\D', '', $_POST['phoneInput']);

   $sql = "SELECT * FROM mj_customers WHERE firstName = '" . $fname . "' AND lastName = '" . $lname . "';";
    
   $result = mysql_query($sql, $cxn);
   if($row = mysql_fetch_array($result)) {echo 'You are already registered.';}
   else {
  	$sql = "INSERT into mj_customers " .
	        "(firstName, lastName, userName, password, createDate, address1, address2, city, state, country, zipcode, email, phone, tutorials) ";
	          
 	$sql .= "VALUES ('" . $fname . "', '" . $lname . "', '" . $username . "', '" . $password . "', '" . $createDate . "', '" .
 	         $addr1 . "', '" . $addr2 . "', '" . $city . "', '" . $state . "', '" . $country . "', '" . $zip . "', '" . 
 	         $email . "', '" . $phone . "', 'N');";

        if (mysql_query($sql, $cxn)) {
               echo "Thank you for registering. \r\n";
               if ($email > ' ') {
                      echo "A verification email is being sent. ";
                      $nameInput = $fname . " " . $lname; 
                      $toEmail = $email;
                      $emailBody = 'Thanks for registering with MaryMJansen.com. Your are registered as ' . $nameInput;
                      $emailSubject = 'Registration Confirmation from Mary Jansen'; 
                      $headers = "Reply-to: marymjansen@msn.com\n";
                      if (!$mailsend = mail($toEmail, $emailSubject, $emailBody, $headers)) {
                           echo "Mail not sent!\n";
                           }
                      else {
                           echo "Registration Confirmation Sent";
                           }
                      }                        
                      
                } else {
                           echo "Error: Show Scott this........<br>" . $sql . "<br>";
                       }
      
         }
         mysql_close($cxn);

   }
?>
</p></section> 
    
</body>
</html>
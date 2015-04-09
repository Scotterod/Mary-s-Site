<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link type="text/css" rel="stylesheet" href="stylesheetT.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>
    <script type="text/javascript" src="/Scripts/logon.js"></script>        
    <title>Mary Jansen: Tutorials</title>
</head>
<?php
// This php receives input from Logon Form, validates, and branches user to new destination.
$badUser=false;
$badPassword=false;
$noPay=false;
if (isset($_POST['nameInput']) and isset($_POST['passwordInput'])) {
	$nameInput = $_POST['nameInput'];
	$passwordInput = $_POST['passwordInput'];

	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
	$sql = "SELECT * FROM mj_customers";

	$result = mysql_query($sql, $cxn);

	while($row = mysql_fetch_array($result)) {
		$username = $row['userName'];
		$pass = $row['password'];
		$access = $row['tutorials'];
		if ($username == $nameInput) {
			if ($pass != $passwordInput) {
				$badPassword=true;
			} else {
			   if ($access != "Y") {
			        $noPay = true;
			      } else {header("Location: tutsec2846.php");}
			   };   
		}
	}
$badUser = true;
}
?>

<body>
    <header>
        <img class="banner" src="Images/b_tiger head.jpg" alt="Tiger Miniature" />
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
                <div class="menubox"><a href="contact.php">Contact Us</a></div>
        </nav>
    </header>
    <hr>
    <section>
        <h1>Mary Jansen Tutorials</h1>
        <p>For paid subscribers only. Please <a href="contact.php">contact</a> Mary directly if you do not already have a username and password.</p>
        <form method="POST">
            <p>Your User Name</p>
            <p><label for="nameInput"><input id="nameInput" type="text" name="nameInput" required placeholder="user name"></label>
                     <span id="userMessage" class="errorMessage">       This username is invalid. Please contact Mary for new values to enter.</span></p>
            <p>Your Password (as supplied by Mary)</p>
            <p><label><input type="password" name="passwordInput" required placeholder="password"></label>
                     <span id="passwordMessage" class="errorMessage">        Wrong password for this user.</span></p>
            <p> <input id="button" type="submit" value="Submit"></p>
        </form>
    </section>
    <section>
        <h3 id="logonError"><?php if ($badPassword) {echo 'Bad password';} 
		      else if ($noPay) {echo 'Not paid';}
		           else if ($badUser) {echo 'Bad username';};
		    ?></h3>
    </section>
</body>
</html>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="stylesheetM.css" media="screen" />
    <link rel="shortcut icon" href="/Images/favicon.ico">
    <script type="text/javascript" src="/Scripts/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="/Scripts/main.js"></script>    
    <title>Mary Jansen: Tutorials</title>
</head>
<?php
// This php receives input from Logon Form, validates, and branches user to new destination.
$baduser=false;
$badpassword=false;
if (isset($_POST['nameInput']) and isset($_POST['passwordInput'])) {
	$nameInput = $_POST['nameInput'];
	$passwordInput = $_POST['passwordInput'];

	$host = "localhost";
	$user = "marymjan_root";
	$password = "brainHurts5294#";

	$cxn = mysql_connect($host,$user,$password) or die(mysql_error());
 
	mysql_select_db ("marymjan_maryart" , $cxn);
 
	$sql = "SELECT * FROM customers";

	$result = mysql_query($sql, $cxn);

	while($row = mysql_fetch_array($result)) {
		$username = $row['userName'];
		$pass = $row['password'];
		if ($username == $nameInput) {
			if ($pass != $passwordInput) {
				$badpassword=true;
			} else {header("Location: tutsec2846.php");}
		}
	}
$baduser = true;
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
		echo '                    <li><a href="productDisplay.php?category=' . $category . '">' . $category . '</a></li>' . "\r\n";
	}
?>    
                   </ul></div>                
                <div class="menubox dropper"><a href="services.php">Services</a>
                   <ul class="submenu">
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
        <p>For paid subscribers only. Please <a href="Contact.html">contact</a> Mary directly if you do not already have a username and password.</p>
        <form method="POST" action="Tutorials.php">
            <p>Your User Name (as supplied by Mary)</p>
            <p><label><input type="text" name="nameInput" required placeholder="user name"></label></p>
            <p>Your Password (as supplied by Mary)</p>
            <p><label><input type="password" name="passwordInput" required placeholder="password"></label></p>
            <p> <input type="submit" value="Submit"></p>
        </form>
    </section>
    <section>
        <h3 class="errorMessage"><?php if ($badpassword) {echo 'Wrong password for this user';} 
		      else if ($baduser) {echo 'This username is invalid. Please try again, or contact Mary for new values to enter.';}
		    ?></h3>
    </section>
</body>
</html>